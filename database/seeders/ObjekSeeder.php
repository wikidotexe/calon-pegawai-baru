<?php

namespace Database\Seeders;

use App\Models\Objek;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ObjekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * 100 Data Calon Pegawai untuk PT Lizzie Parra Kreasi
     */
    public function run(): void
    {
        $kandidat = [
            ['nama_kandidat' => 'Andi Prasetyo', 'posisi_lamar' => 'Software Engineer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '3 Tahun'],
            ['nama_kandidat' => 'Budi Santoso', 'posisi_lamar' => 'Data Analyst', 'pendidikan_terakhir' => 'S2', 'pengalaman_kerja' => '5 Tahun'],
            ['nama_kandidat' => 'Citra Dewi', 'posisi_lamar' => 'UI/UX Designer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '2 Tahun'],
            ['nama_kandidat' => 'Dimas Kurniawan', 'posisi_lamar' => 'Mobile Developer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '4 Tahun'],
            ['nama_kandidat' => 'Eka Putri', 'posisi_lamar' => 'Digital Marketing', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '1 Tahun'],
            ['nama_kandidat' => 'Fajar Hidayat', 'posisi_lamar' => 'Backend Developer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '3 Tahun'],
            ['nama_kandidat' => 'Gita Permata', 'posisi_lamar' => 'Product Manager', 'pendidikan_terakhir' => 'S2', 'pengalaman_kerja' => '6 Tahun'],
            ['nama_kandidat' => 'Hendra Wijaya', 'posisi_lamar' => 'DevOps Engineer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '4 Tahun'],
            ['nama_kandidat' => 'Indah Lestari', 'posisi_lamar' => 'Business Analyst', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '2 Tahun'],
            ['nama_kandidat' => 'Joko Susanto', 'posisi_lamar' => 'Frontend Developer', 'pendidikan_terakhir' => 'D3', 'pengalaman_kerja' => '3 Tahun'],
            ['nama_kandidat' => 'Kartika Sari', 'posisi_lamar' => 'HR Specialist', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '5 Tahun'],
            ['nama_kandidat' => 'Lukman Hakim', 'posisi_lamar' => 'Quality Assurance', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '2 Tahun'],
            ['nama_kandidat' => 'Maya Anggraini', 'posisi_lamar' => 'Content Writer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '1 Tahun'],
            ['nama_kandidat' => 'Nugroho Pratama', 'posisi_lamar' => 'System Analyst', 'pendidikan_terakhir' => 'S2', 'pengalaman_kerja' => '7 Tahun'],
            ['nama_kandidat' => 'Oktavia Rahayu', 'posisi_lamar' => 'Graphic Designer', 'pendidikan_terakhir' => 'D3', 'pengalaman_kerja' => '3 Tahun'],
            ['nama_kandidat' => 'Putra Aditya', 'posisi_lamar' => 'Network Engineer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '4 Tahun'],
            ['nama_kandidat' => 'Qori Amelia', 'posisi_lamar' => 'Finance Analyst', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '2 Tahun'],
            ['nama_kandidat' => 'Rizky Maulana', 'posisi_lamar' => 'Fullstack Developer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '5 Tahun'],
            ['nama_kandidat' => 'Sinta Maharani', 'posisi_lamar' => 'Customer Service', 'pendidikan_terakhir' => 'SMK', 'pengalaman_kerja' => '1 Tahun'],
            ['nama_kandidat' => 'Teguh Prasetya', 'posisi_lamar' => 'Project Manager', 'pendidikan_terakhir' => 'S2', 'pengalaman_kerja' => '8 Tahun'],
            ['nama_kandidat' => 'Utami Wulandari', 'posisi_lamar' => 'Social Media Specialist', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '2 Tahun'],
            ['nama_kandidat' => 'Vino Bastian', 'posisi_lamar' => 'Database Administrator', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '4 Tahun'],
            ['nama_kandidat' => 'Wulan Safitri', 'posisi_lamar' => 'Secretary', 'pendidikan_terakhir' => 'D3', 'pengalaman_kerja' => '3 Tahun'],
            ['nama_kandidat' => 'Xander Putra', 'posisi_lamar' => 'IT Support', 'pendidikan_terakhir' => 'SMK', 'pengalaman_kerja' => '2 Tahun'],
            ['nama_kandidat' => 'Yuni Astuti', 'posisi_lamar' => 'Accountant', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '5 Tahun'],
            ['nama_kandidat' => 'Zainal Abidin', 'posisi_lamar' => 'Security Analyst', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '3 Tahun'],
            ['nama_kandidat' => 'Ahmad Fauzi', 'posisi_lamar' => 'Software Engineer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '2 Tahun'],
            ['nama_kandidat' => 'Bella Christina', 'posisi_lamar' => 'Data Scientist', 'pendidikan_terakhir' => 'S2', 'pengalaman_kerja' => '4 Tahun'],
            ['nama_kandidat' => 'Cahyo Nugroho', 'posisi_lamar' => 'Mobile Developer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '3 Tahun'],
            ['nama_kandidat' => 'Dian Permatasari', 'posisi_lamar' => 'UI/UX Designer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '1 Tahun'],
            ['nama_kandidat' => 'Erwin Saputra', 'posisi_lamar' => 'Backend Developer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '5 Tahun'],
            ['nama_kandidat' => 'Fitria Handayani', 'posisi_lamar' => 'Digital Marketing', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '2 Tahun'],
            ['nama_kandidat' => 'Galih Pratama', 'posisi_lamar' => 'DevOps Engineer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '3 Tahun'],
            ['nama_kandidat' => 'Hani Puspita', 'posisi_lamar' => 'Product Manager', 'pendidikan_terakhir' => 'S2', 'pengalaman_kerja' => '5 Tahun'],
            ['nama_kandidat' => 'Irfan Hamdani', 'posisi_lamar' => 'Frontend Developer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '4 Tahun'],
            ['nama_kandidat' => 'Julia Ramadhani', 'posisi_lamar' => 'HR Specialist', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '2 Tahun'],
            ['nama_kandidat' => 'Kevin Anggara', 'posisi_lamar' => 'Quality Assurance', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '1 Tahun'],
            ['nama_kandidat' => 'Laras Setyowati', 'posisi_lamar' => 'Business Analyst', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '3 Tahun'],
            ['nama_kandidat' => 'Muhamad Rizal', 'posisi_lamar' => 'System Analyst', 'pendidikan_terakhir' => 'S2', 'pengalaman_kerja' => '6 Tahun'],
            ['nama_kandidat' => 'Nadia Putri', 'posisi_lamar' => 'Content Writer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '2 Tahun'],
            ['nama_kandidat' => 'Oscar Firmansyah', 'posisi_lamar' => 'Network Engineer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '4 Tahun'],
            ['nama_kandidat' => 'Putri Amalia', 'posisi_lamar' => 'Graphic Designer', 'pendidikan_terakhir' => 'D3', 'pengalaman_kerja' => '2 Tahun'],
            ['nama_kandidat' => 'Raka Aditya', 'posisi_lamar' => 'Fullstack Developer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '3 Tahun'],
            ['nama_kandidat' => 'Sari Melati', 'posisi_lamar' => 'Customer Service', 'pendidikan_terakhir' => 'D3', 'pengalaman_kerja' => '1 Tahun'],
            ['nama_kandidat' => 'Taufik Hidayat', 'posisi_lamar' => 'Project Manager', 'pendidikan_terakhir' => 'S2', 'pengalaman_kerja' => '7 Tahun'],
            ['nama_kandidat' => 'Umi Kalsum', 'posisi_lamar' => 'Finance Analyst', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '4 Tahun'],
            ['nama_kandidat' => 'Vicky Prasetyo', 'posisi_lamar' => 'Database Administrator', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '3 Tahun'],
            ['nama_kandidat' => 'Widya Kusuma', 'posisi_lamar' => 'Social Media Specialist', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '1 Tahun'],
            ['nama_kandidat' => 'Yoga Pratama', 'posisi_lamar' => 'IT Support', 'pendidikan_terakhir' => 'D3', 'pengalaman_kerja' => '2 Tahun'],
            ['nama_kandidat' => 'Zara Adelia', 'posisi_lamar' => 'Secretary', 'pendidikan_terakhir' => 'D3', 'pengalaman_kerja' => '3 Tahun'],
            ['nama_kandidat' => 'Arief Rahman', 'posisi_lamar' => 'Software Engineer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '4 Tahun'],
            ['nama_kandidat' => 'Bunga Citra', 'posisi_lamar' => 'Data Analyst', 'pendidikan_terakhir' => 'S2', 'pengalaman_kerja' => '3 Tahun'],
            ['nama_kandidat' => 'Chandra Wijaya', 'posisi_lamar' => 'Mobile Developer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '2 Tahun'],
            ['nama_kandidat' => 'Dewi Fortuna', 'posisi_lamar' => 'UI/UX Designer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '5 Tahun'],
            ['nama_kandidat' => 'Eko Budiono', 'posisi_lamar' => 'Backend Developer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '6 Tahun'],
            ['nama_kandidat' => 'Fani Oktaviani', 'posisi_lamar' => 'Digital Marketing', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '1 Tahun'],
            ['nama_kandidat' => 'Gilang Ramadhan', 'posisi_lamar' => 'DevOps Engineer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '3 Tahun'],
            ['nama_kandidat' => 'Hesti Purwanti', 'posisi_lamar' => 'Product Manager', 'pendidikan_terakhir' => 'S2', 'pengalaman_kerja' => '4 Tahun'],
            ['nama_kandidat' => 'Ivan Gunawan', 'posisi_lamar' => 'Frontend Developer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '2 Tahun'],
            ['nama_kandidat' => 'Jasmine Putri', 'posisi_lamar' => 'HR Specialist', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '3 Tahun'],
            ['nama_kandidat' => 'Krisna Murti', 'posisi_lamar' => 'Quality Assurance', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '4 Tahun'],
            ['nama_kandidat' => 'Lina Marlina', 'posisi_lamar' => 'Business Analyst', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '2 Tahun'],
            ['nama_kandidat' => 'Mario Teguh', 'posisi_lamar' => 'System Analyst', 'pendidikan_terakhir' => 'S2', 'pengalaman_kerja' => '5 Tahun'],
            ['nama_kandidat' => 'Nina Septiani', 'posisi_lamar' => 'Content Writer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '1 Tahun'],
            ['nama_kandidat' => 'Oki Setiana', 'posisi_lamar' => 'Network Engineer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '3 Tahun'],
            ['nama_kandidat' => 'Pandu Kusuma', 'posisi_lamar' => 'Graphic Designer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '2 Tahun'],
            ['nama_kandidat' => 'Rani Wulandari', 'posisi_lamar' => 'Fullstack Developer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '4 Tahun'],
            ['nama_kandidat' => 'Surya Darma', 'posisi_lamar' => 'Customer Service', 'pendidikan_terakhir' => 'SMK', 'pengalaman_kerja' => '2 Tahun'],
            ['nama_kandidat' => 'Tina Agustina', 'posisi_lamar' => 'Project Manager', 'pendidikan_terakhir' => 'S2', 'pengalaman_kerja' => '6 Tahun'],
            ['nama_kandidat' => 'Umar Said', 'posisi_lamar' => 'Finance Analyst', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '3 Tahun'],
            ['nama_kandidat' => 'Vera Anggraeni', 'posisi_lamar' => 'Database Administrator', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '2 Tahun'],
            ['nama_kandidat' => 'Wawan Setiawan', 'posisi_lamar' => 'Social Media Specialist', 'pendidikan_terakhir' => 'D3', 'pengalaman_kerja' => '1 Tahun'],
            ['nama_kandidat' => 'Yanto Sugianto', 'posisi_lamar' => 'IT Support', 'pendidikan_terakhir' => 'SMK', 'pengalaman_kerja' => '3 Tahun'],
            ['nama_kandidat' => 'Zulfikar Ali', 'posisi_lamar' => 'Security Analyst', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '4 Tahun'],
            ['nama_kandidat' => 'Andini Permata', 'posisi_lamar' => 'Software Engineer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '2 Tahun'],
            ['nama_kandidat' => 'Bagas Saputra', 'posisi_lamar' => 'Data Scientist', 'pendidikan_terakhir' => 'S2', 'pengalaman_kerja' => '3 Tahun'],
            ['nama_kandidat' => 'Cantika Dewi', 'posisi_lamar' => 'Mobile Developer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '1 Tahun'],
            ['nama_kandidat' => 'Denny Firmansyah', 'posisi_lamar' => 'UI/UX Designer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '4 Tahun'],
            ['nama_kandidat' => 'Elisa Rahmawati', 'posisi_lamar' => 'Backend Developer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '3 Tahun'],
            ['nama_kandidat' => 'Febri Kurniawan', 'posisi_lamar' => 'Digital Marketing', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '2 Tahun'],
            ['nama_kandidat' => 'Guntur Prasetyo', 'posisi_lamar' => 'DevOps Engineer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '5 Tahun'],
            ['nama_kandidat' => 'Helena Sari', 'posisi_lamar' => 'Product Manager', 'pendidikan_terakhir' => 'S2', 'pengalaman_kerja' => '4 Tahun'],
            ['nama_kandidat' => 'Ilham Akbar', 'posisi_lamar' => 'Frontend Developer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '3 Tahun'],
            ['nama_kandidat' => 'Jelita Amira', 'posisi_lamar' => 'HR Specialist', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '1 Tahun'],
            ['nama_kandidat' => 'Kiki Fatmala', 'posisi_lamar' => 'Quality Assurance', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '2 Tahun'],
            ['nama_kandidat' => 'Leo Pranata', 'posisi_lamar' => 'Business Analyst', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '4 Tahun'],
            ['nama_kandidat' => 'Mira Lestari', 'posisi_lamar' => 'System Analyst', 'pendidikan_terakhir' => 'S2', 'pengalaman_kerja' => '3 Tahun'],
            ['nama_kandidat' => 'Nando Saputra', 'posisi_lamar' => 'Content Writer', 'pendidikan_terakhir' => 'D3', 'pengalaman_kerja' => '1 Tahun'],
            ['nama_kandidat' => 'Olive Natasha', 'posisi_lamar' => 'Network Engineer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '2 Tahun'],
            ['nama_kandidat' => 'Panji Asmara', 'posisi_lamar' => 'Graphic Designer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '3 Tahun'],
            ['nama_kandidat' => 'Ratih Kumala', 'posisi_lamar' => 'Fullstack Developer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '5 Tahun'],
            ['nama_kandidat' => 'Sandy Permana', 'posisi_lamar' => 'Customer Service', 'pendidikan_terakhir' => 'D3', 'pengalaman_kerja' => '2 Tahun'],
            ['nama_kandidat' => 'Tiara Anindya', 'posisi_lamar' => 'Project Manager', 'pendidikan_terakhir' => 'S2', 'pengalaman_kerja' => '4 Tahun'],
            ['nama_kandidat' => 'Udin Sedunia', 'posisi_lamar' => 'Finance Analyst', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '3 Tahun'],
            ['nama_kandidat' => 'Vina Panduwinata', 'posisi_lamar' => 'Database Administrator', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '2 Tahun'],
            ['nama_kandidat' => 'Wahyu Hidayat', 'posisi_lamar' => 'Social Media Specialist', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '1 Tahun'],
            ['nama_kandidat' => 'Yolanda Safitri', 'posisi_lamar' => 'IT Support', 'pendidikan_terakhir' => 'D3', 'pengalaman_kerja' => '2 Tahun'],
            ['nama_kandidat' => 'Zaki Mubarak', 'posisi_lamar' => 'Security Analyst', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '3 Tahun'],
            ['nama_kandidat' => 'Ayu Lestari', 'posisi_lamar' => 'Accountant', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '4 Tahun'],
            ['nama_kandidat' => 'Bobby Nasution', 'posisi_lamar' => 'Software Engineer', 'pendidikan_terakhir' => 'S1', 'pengalaman_kerja' => '5 Tahun'],
        ];

        foreach ($kandidat as $item) {
            Objek::create($item);
        }
    }
}
