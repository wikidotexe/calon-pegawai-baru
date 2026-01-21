# Buku Panduan Pengguna (Manual Book)

## Sistem Pendukung Keputusan Penerimaan Calon Pegawai Baru

### PT Lizzie Parra Kreasi

---

## 1. Pendahuluan

Aplikasi ini adalah Sistem Pendukung Keputusan (SPK) yang dirancang untuk membantu tim rekrutmen di **PT Lizzie Parra Kreasi** dalam menyeleksi calon pegawai baru secara objektif. Sistem ini menggunakan metode **TOPSIS** (_Technique for Order Preference by Similarity to Ideal Solution_) untuk memberikan hasil pemeringkatan kandidat berdasarkan kriteria yang telah ditentukan.

### Fitur Utama:

- Manajemen Kriteria & Sub Kriteria.
- Manajemen Data Kandidat (Objek).
- Proses Penilaian Alternatif.
- Perhitungan TOPSIS Otomatis.
- Laporan Ranking & Status (PDF).

---

## 2. Persyaratan Sistem

Untuk menjalankan aplikasi ini, pastikan perangkat Anda memenuhi spesifikasi berikut:

- **Server/Hosting**: PHP >= 8.1, MySQL/MariaDB.
- **Tools**: Composer, Node.js & NPM.
- **Browser**: Google Chrome, Mozilla Firefox, atau Microsoft Edge versi terbaru.

---

## 3. Panduan Instalasi (Untuk Developer/Admin)

Langkah-langkah untuk menyiapkan aplikasi di lingkungan lokal:

1.  **Clone Repository**:
    ```bash
    git clone https://github.com/username/SPK-Topsis-Penerimaan-Pegawai.git
    cd SPK-Topsis-Penerimaan-Pegawai
    ```
2.  **Install Dependensi**:
    ```bash
    composer install
    npm install
    ```
3.  **Konfigurasi Environment**:
    Salin file `.env.example` menjadi `.env` dan sesuaikan pengaturan database.
4.  **Setup Database**:
    ```bash
    php artisan key:generate
    php artisan migrate --seed
    ```
5.  **Build Assets**:
    ```bash
    npm run build
    ```
6.  **Jalankan Server**:
    ```bash
    php artisan serve
    ```

---

## 4. Panduan Penggunaan (User Guide)

### 4.1. Login

Akses halaman utama dan masukkan kredensial Anda.

- **Default Admin**: `testuser@gmail.com`
- **Password**: `12345678`

### 4.2. Dashboard

Setelah login, Anda akan diarahkan ke Dashboard yang menampilkan ringkasan data kriteria, kandidat, dan status sistem.

### 4.3. Manajemen Kriteria & Sub Kriteria

- **Menu Kriteria**: Digunakan untuk menentukan aspek apa saja yang dinilai (misal: Pengalaman, Pendidikan). Setiap kriteria memiliki **Bobot** (0-1).
- **Menu Sub Kriteria**: Digunakan untuk menentukan nilai atau kategori di dalam kriteria (misal: S1 = 5, D3 = 3).

### 4.4. Manajemen Kandidat (Objek & Alternatif)

1.  **Input Objek**: Masukkan data lengkap calon pegawai di menu **Objek**. Anda juga bisa menggunakan fitur **Import Excel**.
2.  **Tambah Alternatif**: Pilih kandidat dari daftar Objek untuk dimasukkan ke dalam proses seleksi (Menu **Alternatif**).

### 4.5. Proses Penilaian

Pada menu **Penilaian**, berikan nilai untuk setiap alternatif berdasarkan kriteria yang telah ditentukan. Pilih sub kriteria yang paling sesuai dengan profil kandidat.

### 4.6. Perhitungan TOPSIS

Setelah semua penilaian lengkap:

1.  Buka menu **Perhitungan**.
2.  Klik tombol **Hitung TOPSIS**.
3.  Sistem akan menampilkan langkah-langkah perhitungan mulai dari Matriks Keputusan hingga Jarak Solusi Ideal.

### 4.7. Hasil Akhir & Ranking

Pada menu **Hasil Akhir**, Anda dapat melihat daftar kandidat yang telah diurutkan berdasarkan nilai preferensi tertinggi.

- **Status Diterima**: Diberikan kepada 50% kandidat teratas.
- **Status Ditolak**: Diberikan kepada 50% kandidat terbawah.

### 4.8. Export Laporan

Anda dapat mengunduh laporan dalam format PDF melalui:

- Tombol **Export PDF TOPSIS** di menu Perhitungan.
- Tombol **Export PDF** di menu Hasil Akhir.

---

## 5. Troubleshooting

- **Data Nilai Kosong**: Pastikan semua kriteria telah diisi nilainya pada menu Penilaian sebelum melakukan perhitungan.
- **Gagal Login**: Pastikan koneksi database sudah benar dan user sudah terdaftar di tabel `users`.

---

_Dokokumentasi ini dibuat untuk mendukung efisiensi proses rekrutmen PT Lizzie Parra Kreasi._
