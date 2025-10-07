# Product Requirements Document (PRD)

Dokumen ini merinci kebutuhan fungsional dan teknis untuk pengembangan website company profile dinamis Laboratorium Jurusan TRPL menggunakan Laravel dan Laravel Filament.

## 1. Pendahuluan

### 1.1 Tujuan dan Teknologi

-   **Tujuan**: Menyediakan platform informasi up-to-date mengenai sumber daya manusia, Lab, dan hasil proyek/riset.
-   **Backend**: Laravel (Eloquent ORM).
-   **Admin Panel**: Laravel Filament (v4).
-   **Frontend**: Blade.

### 1.2 Role Pengguna

-   **Role Tunggal**: Admin (akses ke `/admin/*`).

## 2. Struktur Data dan Relasi (Skema Database)

Kolom `slug` wajib ditambahkan ke Model/Tabel Dosen, Lab, Proyek, dan MahasiswaProyek.

### 2.1 Entitas Utama

| Model               | Nama Tabel          | Field Kunci & Tipe Data                                                                                                                                                                      | Relasi Penting                                      | Keterangan                                                                                                              |
| ------------------- | ------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------- |
| **User**            | `users`             | id (PK), name, email (unique), password                                                                                                                                                      | -                                                   | Hanya untuk Admin login ke Filament.                                                                                    |
| **Dosen**           | `dosens`            | id (PK), nip (string, unique), slug, nama, email, jabatan, foto (string/media), deskripsi_singkat (text), link_pribadi_web (string, nullable)                                                | 1:M Proyek, 1:M MahasiswaProyek, M:M BidangKeahlian | Staf Akademik.                                                                                                          |
| **BidangKeahlian**  | `bidang_keahlians`  | id (PK), nama_bidang (string, unique)                                                                                                                                                        | M:M Dosen                                           | Kategori keahlian riset.                                                                                                |
| **Lab**             | `labs`              | id (PK), nama_lab (string, unique), slug, deskripsi (text/RTE), lokasi (string), foto (string/media)                                                                                         | 1:M Laboran, 1:M Proyek                             | Entitas Lab.                                                                                                            |
| **Proyek**          | `proyeks`           | id (PK), judul, slug, deskripsi (text/RTE), dosen_id (FK), lab_id (FK), tahun (year), kategori (enum), link_web_proyek (string, nullable), link_repo (string, nullable), foto (string/media) | M:1 Dosen, M:1 Lab, M:M MahasiswaProyek             | Riset/aplikasi yang melibatkan banyak MahasiswaProyek.                                                                  |
| **MahasiswaProyek** | `mahasiswa_proyeks` | id (PK), nama_mahasiswa, nim, slug, dosen_pembimbing_id (FK), foto_profil (string/media, nullable)                                                                                           | M:1 Dosen, M:M Proyek                               | Data Mahasiswa Bimbingan. Field judul, tahun lulus, link web dihapus karena dianggap terikat ke entitas Proyek/Skripsi. |
| **Laboran**         | `laborans`          | id (PK), nip (string, unique), nama, email, foto (string/media), lab_id (FK)                                                                                                                 | M:1 Lab                                             | Staf Laboratorium Non-Akademik. Field `jabatan` dihapus.                                                                |

### 2.2 Tabel Pivot (Many-to-Many)

| Tabel Pivot               | Relasi                   | Field                          | Keterangan                               |
| ------------------------- | ------------------------ | ------------------------------ | ---------------------------------------- |
| `dosen_bidang_keahlian`   | Dosen ↔ BidangKeahlian   | dosen_id, bidang_keahlian_id   | Relasi keahlian dosen.                   |
| `mahasiswa_proyek_proyek` | Proyek ↔ MahasiswaProyek | proyek_id, mahasiswa_proyek_id | BARU: Relasi anggota proyek (mahasiswa). |

## 3. Persyaratan Modul Admin (Laravel Filament)

### 3.1 DosenResource

-   **Form**: MultiSelect untuk `bidang_keahlian`.

### 3.2 LabResource

-   **Form**: Rich Editor untuk `deskripsi`, FileUpload untuk `foto`.

### 3.3 ProyekResource

-   **Form**: Select Field untuk `dosen_id` dan `lab_id`. MultiSelect Field untuk `mahasiswaProyeks` (anggota tim). FileUpload untuk `foto`.

### 3.4 MahasiswaProyekResource

-   **Form**: Select Field untuk `dosen_pembimbing_id`. FileUpload untuk `foto_profil`.

### 3.5 LaboranResource

-   **Form**: Select Field untuk `lab_id`.

## 4. Persyaratan Frontend (Public Pages)

### 4.1 Halaman Detail Dosen (`/dosen/{slug}`)

-   Controller me-load relasi: `bidangKeahlian`, `proyeks`, dan `mahasiswaProyeks`.

### 4.2 Halaman Detail Lab (`/lab/{slug}`)

-   Controller me-load relasi: `laborans` dan `proyeks`.
