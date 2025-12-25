# Flow Use Case - Sistem Pendukung Keputusan Penerimaan Calon Pegawai Baru

## Metode: TOPSIS (Technique for Order Preference by Similarity to Ideal Solution)

---

## 📋 Daftar Aktor

| Aktor     | Deskripsi                                                                                                                             |
| --------- | ------------------------------------------------------------------------------------------------------------------------------------- |
| **Admin** | Pengguna yang memiliki akses penuh ke sistem untuk mengelola data kriteria, kandidat, penilaian, dan melihat hasil perhitungan TOPSIS |

---

## 🔄 Use Case Diagram

```
                    ┌─────────────────────────────────────────────────────────────┐
                    │              SISTEM SPK PENERIMAAN PEGAWAI                  │
                    │                                                             │
                    │  ┌─────────────┐     ┌──────────────────┐                  │
                    │  │   Login     │     │  Kelola Profile  │                  │
                    │  └─────────────┘     └──────────────────┘                  │
                    │                                                             │
                    │  ┌─────────────────┐  ┌──────────────────┐                 │
                    │  │ Kelola Kriteria │  │ Kelola Sub       │                 │
   ┌───────┐        │  │                 │  │ Kriteria         │                 │
   │       │        │  └─────────────────┘  └──────────────────┘                 │
   │ Admin │────────│                                                             │
   │       │        │  ┌─────────────────┐  ┌──────────────────┐                 │
   └───────┘        │  │ Kelola Kandidat │  │ Kelola Alternatif│                 │
                    │  │ (Objek)         │  │                  │                 │
                    │  └─────────────────┘  └──────────────────┘                 │
                    │                                                             │
                    │  ┌─────────────────┐  ┌──────────────────┐                 │
                    │  │ Kelola          │  │ Hitung TOPSIS    │                 │
                    │  │ Penilaian       │  │                  │                 │
                    │  └─────────────────┘  └──────────────────┘                 │
                    │                                                             │
                    │  ┌─────────────────┐  ┌──────────────────┐                 │
                    │  │ Lihat Hasil     │  │ Export PDF       │                 │
                    │  │ Akhir           │  │                  │                 │
                    │  └─────────────────┘  └──────────────────┘                 │
                    │                                                             │
                    └─────────────────────────────────────────────────────────────┘
```

---

## 📝 Deskripsi Use Case

### UC-01: Login

| Komponen           | Deskripsi                                       |
| ------------------ | ----------------------------------------------- |
| **Aktor**          | Admin                                           |
| **Deskripsi**      | Admin melakukan autentikasi ke sistem           |
| **Pre-condition**  | Admin memiliki akun terdaftar                   |
| **Post-condition** | Admin berhasil masuk dan diarahkan ke Dashboard |

**Flow Utama:**

1. Admin membuka halaman login
2. Admin memasukkan email dan password
3. Sistem memvalidasi kredensial
4. Sistem mengarahkan ke Dashboard

**Flow Alternatif:**

-   3a. Kredensial tidak valid → Sistem menampilkan pesan error

---

### UC-02: Kelola Profile

| Komponen           | Deskripsi                               |
| ------------------ | --------------------------------------- |
| **Aktor**          | Admin                                   |
| **Deskripsi**      | Admin mengelola informasi profil akun   |
| **Pre-condition**  | Admin sudah login                       |
| **Post-condition** | Data profil berhasil diperbarui/dihapus |

**Flow Utama:**

1. Admin mengakses menu Profile
2. Admin memilih aksi (Update/Delete)
3. Admin mengisi/mengubah data
4. Sistem menyimpan perubahan

---

### UC-03: Kelola Kriteria

| Komponen           | Deskripsi                                      |
| ------------------ | ---------------------------------------------- |
| **Aktor**          | Admin                                          |
| **Deskripsi**      | Admin mengelola data kriteria penilaian (CRUD) |
| **Pre-condition**  | Admin sudah login                              |
| **Post-condition** | Data kriteria berhasil ditambah/diubah/dihapus |

**Atribut Kriteria:**

-   `kode` - Kode kriteria (misal: C1, C2, C3)
-   `nama` - Nama kriteria (misal: Pengalaman Kerja, Pendidikan)
-   `bobot` - Bobot kriteria (0-1)

**Flow Utama - Tambah Kriteria:**

1. Admin mengakses menu Kriteria
2. Admin klik tombol "Tambah Kriteria"
3. Admin mengisi form (kode, nama, bobot)
4. Admin klik "Simpan"
5. Sistem menyimpan data kriteria baru

**Flow Utama - Ubah Kriteria:**

1. Admin mengakses menu Kriteria
2. Admin klik tombol "Edit" pada kriteria yang dipilih
3. Admin mengubah data pada form
4. Admin klik "Perbarui"
5. Sistem menyimpan perubahan

**Flow Utama - Hapus Kriteria:**

1. Admin mengakses menu Kriteria
2. Admin klik tombol "Hapus" pada kriteria yang dipilih
3. Sistem menampilkan konfirmasi
4. Admin mengkonfirmasi penghapusan
5. Sistem menghapus data kriteria

---

### UC-04: Kelola Sub Kriteria

| Komponen           | Deskripsi                                          |
| ------------------ | -------------------------------------------------- |
| **Aktor**          | Admin                                              |
| **Deskripsi**      | Admin mengelola data sub kriteria (CRUD)           |
| **Pre-condition**  | Admin sudah login, minimal ada 1 kriteria          |
| **Post-condition** | Data sub kriteria berhasil ditambah/diubah/dihapus |

**Atribut Sub Kriteria:**

-   `kode` - Kode sub kriteria
-   `nama` - Nama sub kriteria
-   `nilai` - Nilai numerik sub kriteria
-   `kriteria_id` - Relasi ke kriteria induk

**Flow Utama - Tambah Sub Kriteria:**

1. Admin mengakses menu Sub Kriteria
2. Admin klik tombol "Tambah Sub Kriteria"
3. Admin memilih kriteria induk
4. Admin mengisi form (kode, nama, nilai)
5. Admin klik "Simpan"
6. Sistem menyimpan data sub kriteria baru

---

### UC-05: Kelola Kandidat (Objek)

| Komponen           | Deskripsi                                               |
| ------------------ | ------------------------------------------------------- |
| **Aktor**          | Admin                                                   |
| **Deskripsi**      | Admin mengelola data calon pegawai/kandidat             |
| **Pre-condition**  | Admin sudah login                                       |
| **Post-condition** | Data kandidat berhasil ditambah/diubah/dihapus/diimport |

**Atribut Kandidat:**

-   `nama_kandidat` - Nama lengkap kandidat
-   `posisi_lamar` - Posisi yang dilamar
-   `pendidikan_terakhir` - Pendidikan terakhir
-   `pengalaman_kerja` - Pengalaman kerja

**Flow Utama - Tambah Kandidat:**

1. Admin mengakses menu Objek (Kandidat)
2. Admin klik tombol "Tambah Kandidat"
3. Admin mengisi form data kandidat
4. Admin klik "Simpan"
5. Sistem menyimpan data kandidat baru

**Flow Utama - Import Kandidat:**

1. Admin mengakses menu Objek (Kandidat)
2. Admin klik tombol "Import"
3. Admin memilih file Excel/CSV
4. Sistem memproses dan menyimpan data kandidat dari file

---

### UC-06: Kelola Alternatif

| Komponen           | Deskripsi                                                |
| ------------------ | -------------------------------------------------------- |
| **Aktor**          | Admin                                                    |
| **Deskripsi**      | Admin mengelola data alternatif untuk perhitungan TOPSIS |
| **Pre-condition**  | Admin sudah login, data kandidat tersedia                |
| **Post-condition** | Data alternatif berhasil ditambah/dihapus                |

**Atribut Alternatif:**

-   `objek_id` - Relasi ke data kandidat
-   `nama_kandidat` - Nama kandidat
-   `posisi_lamar` - Posisi yang dilamar
-   `pendidikan_terakhir` - Pendidikan terakhir
-   `pengalaman_kerja` - Pengalaman kerja

**Flow Utama - Tambah Alternatif:**

1. Admin mengakses menu Alternatif
2. Admin memilih kandidat dari daftar objek
3. Admin klik "Simpan"
4. Sistem menyimpan alternatif baru

---

### UC-07: Kelola Penilaian

| Komponen           | Deskripsi                                                           |
| ------------------ | ------------------------------------------------------------------- |
| **Aktor**          | Admin                                                               |
| **Deskripsi**      | Admin memberikan penilaian terhadap alternatif berdasarkan kriteria |
| **Pre-condition**  | Admin sudah login, ada alternatif dan kriteria                      |
| **Post-condition** | Data penilaian berhasil disimpan                                    |

**Atribut Penilaian:**

-   `alternatif_id` - Relasi ke alternatif
-   `kriteria_id` - Relasi ke kriteria
-   `sub_kriteria_id` - Nilai yang dipilih (relasi ke sub kriteria)

**Flow Utama - Input Penilaian:**

1. Admin mengakses menu Penilaian
2. Admin memilih alternatif yang akan dinilai
3. Admin memilih nilai sub kriteria untuk setiap kriteria
4. Admin klik "Simpan"
5. Sistem menyimpan penilaian

**Flow Utama - Ubah Penilaian:**

1. Admin mengakses menu Penilaian
2. Admin klik "Edit" pada alternatif yang sudah dinilai
3. Admin mengubah nilai penilaian
4. Admin klik "Perbarui"
5. Sistem menyimpan perubahan

**Flow Utama - Export PDF Penilaian:**

1. Admin mengakses menu Penilaian
2. Admin klik tombol "Export PDF"
3. Sistem generate dan download file PDF

---

### UC-08: Hitung TOPSIS

| Komponen           | Deskripsi                                                               |
| ------------------ | ----------------------------------------------------------------------- |
| **Aktor**          | Admin                                                                   |
| **Deskripsi**      | Admin menjalankan perhitungan TOPSIS untuk mendapatkan ranking kandidat |
| **Pre-condition**  | Semua alternatif sudah memiliki penilaian lengkap                       |
| **Post-condition** | Hasil perhitungan TOPSIS tersimpan dan ditampilkan                      |

**Flow Utama:**

1. Admin mengakses menu Perhitungan
2. Admin klik tombol "Hitung TOPSIS"
3. Sistem menjalankan perhitungan:
    - **Step 1:** Menyusun Matriks Keputusan
    - **Step 2:** Normalisasi Matriks (R)
    - **Step 3:** Matriks Terbobot (Y = R × Bobot)
    - **Step 4:** Menentukan Solusi Ideal Positif (A+) dan Negatif (A-)
    - **Step 5:** Menghitung Jarak ke Solusi Ideal (D+ dan D-)
    - **Step 6:** Menghitung Nilai Preferensi (V = D- / (D+ + D-))
4. Sistem menampilkan hasil perhitungan
5. Sistem menampilkan pesan "Perhitungan TOPSIS Selesai!"

**Flow Alternatif:**

-   3a. Data penilaian tidak lengkap → Sistem menampilkan pesan error

---

### UC-09: Lihat Hasil Akhir

| Komponen           | Deskripsi                                                          |
| ------------------ | ------------------------------------------------------------------ |
| **Aktor**          | Admin                                                              |
| **Deskripsi**      | Admin melihat hasil ranking dan status kandidat (Diterima/Ditolak) |
| **Pre-condition**  | Perhitungan TOPSIS sudah dijalankan                                |
| **Post-condition** | Admin dapat melihat ranking kandidat                               |

**Flow Utama:**

1. Admin mengakses menu Hasil Akhir
2. Sistem menampilkan tabel hasil dengan kolom:
    - Ranking
    - Nama Kandidat
    - Nilai Preferensi
    - Status (Diterima/Ditolak)
3. Sistem menentukan status berdasarkan 50% teratas = Diterima

---

### UC-10: Export PDF

| Komponen           | Deskripsi                                 |
| ------------------ | ----------------------------------------- |
| **Aktor**          | Admin                                     |
| **Deskripsi**      | Admin mengekspor laporan dalam format PDF |
| **Pre-condition**  | Perhitungan TOPSIS sudah dijalankan       |
| **Post-condition** | File PDF berhasil diunduh                 |

**Flow Utama - Export PDF Perhitungan TOPSIS:**

1. Admin mengakses menu Perhitungan
2. Admin klik tombol "Export PDF TOPSIS"
3. Sistem generate PDF dengan detail:
    - Matriks Keputusan
    - Matriks Normalisasi
    - Matriks Terbobot
    - Solusi Ideal Positif & Negatif
    - Hasil TOPSIS
4. Browser mendownload file PDF

**Flow Utama - Export PDF Hasil Akhir:**

1. Admin mengakses menu Hasil Akhir
2. Admin klik tombol "Export PDF"
3. Sistem generate PDF dengan ranking dan status kandidat
4. Browser mendownload file PDF

---

## 🔀 Activity Diagram - Proses Utama

### Flow Lengkap Penerimaan Calon Pegawai

```
┌─────────────────────────────────────────────────────────────────────────────────┐
│                                                                                 │
│  ┌───────┐                                                                      │
│  │ START │                                                                      │
│  └───┬───┘                                                                      │
│      │                                                                          │
│      ▼                                                                          │
│  ┌───────────────┐                                                              │
│  │    LOGIN      │                                                              │
│  └───────┬───────┘                                                              │
│          │                                                                      │
│          ▼                                                                      │
│  ┌───────────────────────────────────────────────────────────────┐              │
│  │                    SETUP DATA MASTER                          │              │
│  │  ┌─────────────┐    ┌─────────────────┐    ┌──────────────┐   │              │
│  │  │   Input     │───▶│  Input Sub      │───▶│   Input      │   │              │
│  │  │  Kriteria   │    │  Kriteria       │    │  Kandidat    │   │              │
│  │  └─────────────┘    └─────────────────┘    └──────────────┘   │              │
│  └───────────────────────────────────────────────────────────────┘              │
│          │                                                                      │
│          ▼                                                                      │
│  ┌───────────────────────────────────────────────────────────────┐              │
│  │                    PROSES PENILAIAN                           │              │
│  │  ┌─────────────┐    ┌─────────────────┐                       │              │
│  │  │   Tambah    │───▶│    Input        │                       │              │
│  │  │  Alternatif │    │   Penilaian     │                       │              │
│  │  └─────────────┘    └─────────────────┘                       │              │
│  └───────────────────────────────────────────────────────────────┘              │
│          │                                                                      │
│          ▼                                                                      │
│  ┌───────────────────────────────────────────────────────────────┐              │
│  │                    PERHITUNGAN TOPSIS                         │              │
│  │  ┌──────────────┐   ┌──────────────┐   ┌──────────────┐       │              │
│  │  │ Matriks      │──▶│ Normalisasi  │──▶│ Matriks Y    │       │              │
│  │  │ Keputusan    │   │              │   │ (Terbobot)   │       │              │
│  │  └──────────────┘   └──────────────┘   └──────────────┘       │              │
│  │         │                                                     │              │
│  │         ▼                                                     │              │
│  │  ┌──────────────┐   ┌──────────────┐   ┌──────────────┐       │              │
│  │  │ Ideal (+/-)  │──▶│ Jarak Solusi │──▶│ Nilai        │       │              │
│  │  │              │   │ Ideal        │   │ Preferensi   │       │              │
│  │  └──────────────┘   └──────────────┘   └──────────────┘       │              │
│  └───────────────────────────────────────────────────────────────┘              │
│          │                                                                      │
│          ▼                                                                      │
│  ┌───────────────────────────────────────────────────────────────┐              │
│  │                    HASIL & LAPORAN                            │              │
│  │  ┌─────────────┐    ┌─────────────────┐                       │              │
│  │  │   Lihat     │───▶│    Export       │                       │              │
│  │  │   Ranking   │    │    PDF          │                       │              │
│  │  └─────────────┘    └─────────────────┘                       │              │
│  └───────────────────────────────────────────────────────────────┘              │
│          │                                                                      │
│          ▼                                                                      │
│     ┌─────────┐                                                                 │
│     │   END   │                                                                 │
│     └─────────┘                                                                 │
│                                                                                 │
└─────────────────────────────────────────────────────────────────────────────────┘
```

---

## 📊 Sequence Diagram - Perhitungan TOPSIS

```
Admin           UI              TopsisController        TopsisService          Database
  │              │                     │                      │                    │
  │──[1] Klik    │                     │                      │                    │
  │    Hitung    │                     │                      │                    │
  │    TOPSIS    │                     │                      │                    │
  │              │                     │                      │                    │
  │              │──[2] POST ─────────▶│                      │                    │
  │              │    /hitung_topsis   │                      │                    │
  │              │                     │                      │                    │
  │              │                     │──[3] hitungMatriks──▶│                    │
  │              │                     │    Keputusan()       │                    │
  │              │                     │                      │──[4] simpan───────▶│
  │              │                     │                      │                    │
  │              │                     │──[5] hitungMatriks──▶│                    │
  │              │                     │    Normalisasi()     │                    │
  │              │                     │                      │──[6] simpan───────▶│
  │              │                     │                      │                    │
  │              │                     │──[7] hitungMatriksY()│                    │
  │              │                     │                      │──[8] simpan───────▶│
  │              │                     │                      │                    │
  │              │                     │──[9] hitungIdeal()──▶│                    │
  │              │                     │                      │──[10] simpan──────▶│
  │              │                     │                      │                    │
  │              │                     │──[11] hitungSolusi──▶│                    │
  │              │                     │     Ideal()          │                    │
  │              │                     │                      │──[12] simpan──────▶│
  │              │                     │                      │                    │
  │              │                     │──[13] hitungHasil()─▶│                    │
  │              │                     │                      │──[14] simpan──────▶│
  │              │                     │                      │                    │
  │              │◀─[15] redirect──────│                      │                    │
  │              │    + success msg    │                      │                    │
  │              │                     │                      │                    │
  │◀─[16] View───│                     │                      │                    │
  │   Hasil      │                     │                      │                    │
  │              │                     │                      │                    │
```

---

## 📈 ERD (Entity Relationship Diagram)

```
┌─────────────────┐       ┌─────────────────┐       ┌─────────────────┐
│     USER        │       │    KRITERIA     │       │  SUB_KRITERIA   │
├─────────────────┤       ├─────────────────┤       ├─────────────────┤
│ id (PK)         │       │ id (PK)         │◀──┐   │ id (PK)         │
│ name            │       │ kode            │   │   │ kode            │
│ email           │       │ nama            │   │   │ nama            │
│ password        │       │ bobot           │   └───│ kriteria_id(FK) │
└─────────────────┘       └─────────────────┘       │ nilai           │
                                 │                  └─────────────────┘
                                 │                          │
                                 │                          │
                                 ▼                          │
┌─────────────────┐       ┌─────────────────┐              │
│     OBJEK       │       │   PENILAIAN     │◀─────────────┘
├─────────────────┤       ├─────────────────┤
│ id (PK)         │       │ id (PK)         │
│ nama_kandidat   │       │ alternatif_id   │───┐
│ posisi_lamar    │       │ kriteria_id     │   │
│ pendidikan      │       │ sub_kriteria_id │   │
│ pengalaman_kerja│       └─────────────────┘   │
└─────────────────┘                             │
        │                                       │
        │                                       │
        ▼                                       │
┌─────────────────┐                             │
│   ALTERNATIF    │◀────────────────────────────┘
├─────────────────┤
│ id (PK)         │
│ objek_id (FK)   │
│ nama_kandidat   │
│ posisi_lamar    │
│ pendidikan      │
│ pengalaman_kerja│
└─────────────────┘
```

---

## 📌 Catatan Penting

1. **Urutan Proses Wajib:**

    - Setup Kriteria → Setup Sub Kriteria → Input Kandidat → Tambah Alternatif → Input Penilaian → Hitung TOPSIS

2. **Penentuan Status Kandidat:**

    - 50% kandidat teratas berdasarkan nilai preferensi = **Diterima**
    - 50% kandidat terbawah = **Ditolak**

3. **Formula TOPSIS:**
    - Nilai Preferensi (V) = D⁻ / (D⁺ + D⁻)
    - Semakin tinggi nilai V, semakin baik ranking kandidat

---

_Dokumen ini dibuat untuk keperluan dokumentasi Tugas Akhir_
_Sistem Pendukung Keputusan Penerimaan Calon Pegawai Baru - PT Lizzie Parra Kreasi_
