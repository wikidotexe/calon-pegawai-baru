# 🧑‍💼 Sistem Pendukung Keputusan Penerimaan Calon Pegawai Baru

### Menggunakan Metode TOPSIS (Technique for Order Preference by Similarity to Ideal Solution)

_PT Lizzie Parra Kreasi -- Jakarta Selatan_

## 📘 Deskripsi Proyek

Aplikasi web ini dibuat untuk membantu proses seleksi dan penilaian
calon pegawai baru di **PT Lizzie Parra Kreasi**. Sistem ini menerapkan
metode **TOPSIS**, sebuah metode pengambilan keputusan multikriteria
yang mampu memberikan hasil pemeringkatan kandidat secara objektif dan
terstruktur. Dengan sistem ini, proses rekrutmen menjadi lebih efektif,
efisien, serta mengurangi subjektivitas dalam penilaian.

## 🎯 Tujuan

-   Menyediakan sistem penilaian calon pegawai baru yang objektif,
    terukur, dan cepat.
-   Membantu manajemen dalam menentukan kandidat terbaik berdasarkan
    perhitungan data yang akurat.
-   Mengurangi subjektivitas dalam proses seleksi dan meningkatkan
    kualitas keputusan rekrutmen.

## 🛠️ Teknologi yang Digunakan

-   Framework: Laravel 12 + Laravel Breeze
-   Frontend: Blade, TailwindCSS / Bootstrap
-   Database: MySQL / MariaDB
-   Metode: TOPSIS
-   Fitur Tambahan: Autentikasi, Role Management, Dashboard Interaktif,
    UI Responsif

## 🧮 Contoh Kriteria Penilaian Calon Pegawai

-   Pengalaman Kerja
-   Pendidikan
-   Usia
-   Hasil Tes Tertulis / Tes Teknis
-   Sikap & Kepribadian
-   Kesesuaian Kompetensi

## 🚀 Instalasi

```bash
git clone https://github.com/username/SPK-Topsis-Penerimaan-Pegawai.git
cd SPK-Topsis-Penerimaan-Pegawai
composer install
npm install && npm run dev
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run build
php artisan serve
```

## 🔐 Akun Demo

Role Email Password

---

Admin testuser@gmail.com 12345678

## 🖥️ Fitur Aplikasi

-   Login & Manajemen User
-   Input Data Calon Pegawai
-   Manajemen Kriteria & Bobot
-   Perhitungan TOPSIS Otomatis
-   Hasil Ranking Kandidat
-   Dashboard Interaktif
-   Tampilan Responsif

## 📂 Struktur Folder

    /app
    /routes
    /resources/views
    /database
    /public

## 🧠 Ringkasan Metode TOPSIS

1.  Menyusun Matriks Keputusan\
2.  Normalisasi Matriks\
3.  Mengalikan Normalisasi dengan Bobot\
4.  Menentukan Solusi Ideal Positif & Negatif\
5.  Menghitung Jarak ke Solusi Ideal\
6.  Menghitung Nilai Preferensi & Ranking

## 📃 Lisensi

Proyek ini dikembangkan untuk kebutuhan penelitian akademik dan
implementasi internal di PT Lizzie Parra Kreasi.
