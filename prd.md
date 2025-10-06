# Product Requirements Document (PRD) Versi Final

Dokumen ini merinci kebutuhan fungsional dan teknis untuk pengembangan website _company profile_ dinamis **Laboratorium Jurusan TRPL** menggunakan Laravel dan Laravel Filament.

## 1. Pendahuluan

### 1.1 Tujuan dan Teknologi

-   **Tujuan**: Menyediakan platform informasi _up-to-date_ mengenai sumber daya manusia (dosen, laboran), aktivitas Lab, dan hasil proyek/riset.
-   **Backend**: Laravel (Eloquent ORM).
-   **Admin Panel**: Laravel Filament (v4) untuk semua manajemen data.
-   **Frontend**: Blade.

### 1.2 Role Pengguna

-   **Role Tunggal**: Admin (akses ke `/admin/*`).

## 2. Struktur Data dan Relasi (Skema Database)

Implementasi harus menggunakan **Model Eloquent** dan **Migrasi Laravel** sesuai skema di bawah. Kolom `slug` wajib ditambahkan ke Model/Tabel Dosen, Lab, Proyek, dan MahasiswaProyek untuk URL publik.

### 2.1 Entitas Utama

| Model               | Nama Tabel          | Field Kunci & Tipe Data                                                                                                                                                                                    | Relasi Penting                                | Keterangan                                                    |
| ------------------- | ------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------------------------- | ------------------------------------------------------------- |
| **User**            | `users`             | id (PK), name, email (unique), password                                                                                                                                                                    | -                                             | Hanya untuk Admin login ke Filament.                          |
| **Dosen**           | `dosens`            | id (PK), nip_nidn (string, unique), **slug (string, unique)**, nama, email, jabatan, foto (string/media), deskripsi_singkat (text), link_pribadi_web (string, nullable)                                    | 1:M Proyek, 1:M Mahasiswa, M:M BidangKeahlian | Staf Akademik.                                                |
| **BidangKeahlian**  | `bidang_keahlians`  | id (PK), nama_bidang (string, unique)                                                                                                                                                                      | M:M Dosen                                     | Kategori keahlian riset.                                      |
| **Lab**             | `labs`              | id (PK), nama_lab (string, unique), **slug (string, unique)**, deskripsi (text/RTE), lokasi (string)                                                                                                       | 1:M Laboran, 1:M Proyek                       | Entitas Lab (mis. Lab Jaringan, Lab Pemrograman).             |
| **Proyek**          | `proyeks`           | id (PK), judul, **slug (string, unique)**, deskripsi (text/RTE), dosen_id (FK), **lab_id (FK → labs.id)**, tahun (year), kategori (enum), link_web_proyek (string, nullable), link_repo (string, nullable) | M:1 Dosen, **M:1 Lab**                        | Riset/aplikasi yang bernaung di bawah Lab tertentu.           |
| **MahasiswaProyek** | `mahasiswa_proyeks` | id (PK), nama_mahasiswa, nim, **slug (string, unique)**, dosen_pembimbing_id (FK → dosens.id), judul_skripsi, tahun_lulus (year), link_proyek_web (string, nullable)                                       | M:1 Dosen                                     | Data Proyek Akhir/Skripsi Mahasiswa.                          |
| **Laboran**         | `laborans`          | id (PK), nip_nik (string, unique), nama, email, jabatan, foto (string/media), **lab_id (FK → labs.id)**                                                                                                    | **M:1 Lab**                                   | Staf Laboratorium Non-Akademik yang ditugaskan pada satu Lab. |

### 2.2 Tabel Pivot (Many-to-Many)

| Tabel Pivot             | Relasi                 | Field                        |
| ----------------------- | ---------------------- | ---------------------------- |
| `dosen_bidang_keahlian` | Dosen ↔ BidangKeahlian | dosen_id, bidang_keahlian_id |

## 3. Persyaratan Modul Admin (Laravel Filament)

### 3.1 DosenResource

-   **Form:** MultiSelect untuk `bidang_keahlian`.

### 3.2 LabResource

-   **Form:** Rich Editor untuk `deskripsi`.

### 3.3 ProyekResource

-   **Form:** Select Field untuk `dosen_id` dan `lab_id`.

### 3.4 MahasiswaProyekResource

-   **Form:** Select Field untuk `dosen_pembimbing_id`.

### 3.5 LaboranResource

-   **Form:** Select Field untuk `lab_id`.

## 4. Persyaratan Frontend (Public Pages)

### 4.1 Halaman Detail Dosen (`/dosen/{slug}`)

-   Controller harus me-load relasi: `bidangKeahlian`, `proyeks`, dan `mahasiswaProyeks`.

### 4.2 Halaman Detail Lab (`/lab/{slug}`)

-   Controller harus me-load relasi: `laborans` dan `proyeks`.
