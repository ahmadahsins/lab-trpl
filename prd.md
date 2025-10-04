# Product Requirements Document (PRD)

## 1. Pendahuluan

### 1.1 Tujuan dan Teknologi

-   **Tujuan**: Mengembangkan company profile dinamis untuk **Lab TRPL**.
-   **Backend**: Laravel (dengan Eloquent ORM).
-   **Admin Panel**: Laravel Filament (v4).
-   **Frontend**: Blade

### 1.2 Role Pengguna

-   **Role Tunggal**: Admin (akses ke `/admin/*`).

---

## 2. Struktur Data dan Relasi (Skema Database)

Implementasi harus menggunakan **Model Eloquent** dan **Migrasi Laravel** sesuai skema di bawah.

### 2.1 Entitas Utama

| Model               | Nama Tabel        | Field Kunci & Tipe Data                                                                                                                                                                                                  | Relasi Penting                                                                                      | Keterangan                                     |
| ------------------- | ----------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | --------------------------------------------------------------------------------------------------- | ---------------------------------------------- |
| **User**            | users             | id (PK), name (string), email (string, unique), password (string)                                                                                                                                                        | 1:1 ke Dosen atau Laboran (optional)                                                                | Hanya digunakan untuk Admin login ke Filament. |
| **Dosen**           | dosens            | id (PK), nip_nidn (string, unique), nama (string), email (string), jabatan (string), foto (string/media), deskripsi_singkat (text), link_pribadi_web (string, nullable)                                                  | 1:M dengan Proyek, 1:M dengan Mahasiswa (sebagai Pembimbing), M:M dengan BidangKeahlian (via pivot) | Staf Akademik.                                 |
| **BidangKeahlian**  | bidang_keahlians  | id (PK), nama_bidang (string, unique)                                                                                                                                                                                    | M:M dengan Dosen (via dosen_bidang_keahlians)                                                       | Kategori keahlian riset.                       |
| **Proyek**          | proyeks           | id (PK), judul (string), deskripsi (text/RTE), dosen_id (FK → dosens.id), tahun (year), kategori (enum: 'Riset Dosen', 'Publikasi', 'Proyek Internal'), link_web_proyek (string, nullable), link_repo (string, nullable) | M:1 ke Dosen                                                                                        | Riset/aplikasi yang dipimpin dosen.            |
| **MahasiswaProyek** | mahasiswa_proyeks | id (PK), nama_mahasiswa (string), nim (string), dosen_pembimbing_id (FK → dosens.id), judul_skripsi (string), tahun_lulus (year), link_proyek_web (string, nullable)                                                     | M:1 ke Dosen                                                                                        | Data Proyek Akhir/Skripsi Mahasiswa.           |
| **Laboran**         | laborans          | id (PK), nip_nik (string, unique), nama (string), email (string), jabatan (string), foto (string/media)                                                                                                                  | -                                                                                                   | Staf Laboratorium Non-Akademik.                |

### 2.2 Tabel Pivot (Many-to-Many)

| Tabel Pivot               | Relasi                 | Field                        |
| ------------------------- | ---------------------- | ---------------------------- |
| **dosen_bidang_keahlian** | Dosen ↔ BidangKeahlian | dosen_id, bidang_keahlian_id |

---

## 3. Persyaratan Modul Admin (Laravel Filament)

Semua modul harus dibuat sebagai **Filament Resources** dan dihubungkan dengan **Model Eloquent**.

### 3.1 DosenResource

**Form:**

-   Input Text: nama, nip_nidn, email, jabatan, link_pribadi_web
-   Rich Editor: deskripsi_singkat
-   FileUpload: foto (Media Library / Spatie Media)
-   Select/MultiSelect: bidang_keahlian (relasi belongsToMany ke BidangKeahlian)

**Table:**

-   Kolom ditampilkan: foto (Avatar), nama, nip_nidn, jabatan

### 3.2 ProyekResource

**Form:**

-   Select: dosen_id (relasi belongsTo ke Dosen)
-   Input Text: judul, tahun, link_web_proyek, link_repo
-   Select/Radio: kategori (Enum: 'Riset Dosen', 'Publikasi', 'Proyek Internal')
-   Rich Editor: deskripsi

### 3.3 MahasiswaProyekResource

**Form:**

-   Input Text: nama_mahasiswa, nim, judul_skripsi, tahun_lulus, link_proyek_web
-   Select: dosen_pembimbing_id (relasi belongsTo ke Dosen)

### 3.4 BidangKeahlianResource & LaboranResource

**Form CRUD sederhana**:

-   BidangKeahlian: nama_bidang
-   Laboran: nip_nik, nama, email, jabatan, foto

---

## 4. Persyaratan Frontend (Public Pages)

Frontend harus mengambil data dari database yang dikelola oleh **Filament**.

### 4.1 Halaman Detail Dosen (`/dosen/{slug}`)

Menampilkan:

-   Profil Utama: Foto, Nama, Jabatan, NIP/NIDN, Deskripsi Singkat, Link Pribadi
-   Bidang Keahlian: Daftar tag/badge dari relasi BidangKeahlian
-   Daftar Proyek Dosen: Semua Proyek dengan `dosen_id` terkait
-   Daftar Mahasiswa Bimbingan: Semua MahasiswaProyek dengan `dosen_pembimbing_id` terkait

### 4.2 Halaman Daftar Proyek (`/proyek`)

-   Tabel atau card view
-   Filter berdasarkan: Tahun, Kategori, Dosen Penanggung Jawab

---

## 5. Kebutuhan Non-Fungsional (Teknis)

### 5.1 Slug Generation

-   Semua entitas dengan URL publik (Dosen, Proyek, MahasiswaProyek) harus memiliki **slug otomatis** dari `nama` atau `judul`.
-   Rekomendasi paket: `spatie/laravel-sluggable`.

### 5.2 Pengujian

-   **Unit Test**: Memastikan relasi model bekerja (contoh: `Dosen::with('proyeks')->find($id)`).
-   **Feature Test**: Memastikan Admin Login dan akses halaman Filament berfungsi.
