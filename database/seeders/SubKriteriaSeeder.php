<?php

namespace Database\Seeders;

use App\Models\SubKriteria;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Sub Kriteria untuk Penerimaan Calon Pegawai Baru
     */
    public function run(): void
    {
        $subKriteria = [
            // K1 - Pengalaman Kerja
            ['kode' => 'K1-1', 'nama' => '> 5 Tahun', 'nilai' => 5, 'kriteria_id' => 1],
            ['kode' => 'K1-2', 'nama' => '3-5 Tahun', 'nilai' => 4, 'kriteria_id' => 1],
            ['kode' => 'K1-3', 'nama' => '1-3 Tahun', 'nilai' => 3, 'kriteria_id' => 1],
            ['kode' => 'K1-4', 'nama' => '< 1 Tahun', 'nilai' => 2, 'kriteria_id' => 1],
            ['kode' => 'K1-5', 'nama' => 'Fresh Graduate', 'nilai' => 1, 'kriteria_id' => 1],

            // K2 - Pendidikan
            ['kode' => 'K2-1', 'nama' => 'S3', 'nilai' => 5, 'kriteria_id' => 2],
            ['kode' => 'K2-2', 'nama' => 'S2', 'nilai' => 4, 'kriteria_id' => 2],
            ['kode' => 'K2-3', 'nama' => 'S1', 'nilai' => 3, 'kriteria_id' => 2],
            ['kode' => 'K2-4', 'nama' => 'D3', 'nilai' => 2, 'kriteria_id' => 2],
            ['kode' => 'K2-5', 'nama' => 'SMA/SMK', 'nilai' => 1, 'kriteria_id' => 2],

            // K3 - Usia
            ['kode' => 'K3-1', 'nama' => '21-25 Tahun', 'nilai' => 5, 'kriteria_id' => 3],
            ['kode' => 'K3-2', 'nama' => '26-30 Tahun', 'nilai' => 4, 'kriteria_id' => 3],
            ['kode' => 'K3-3', 'nama' => '31-35 Tahun', 'nilai' => 3, 'kriteria_id' => 3],
            ['kode' => 'K3-4', 'nama' => '36-40 Tahun', 'nilai' => 2, 'kriteria_id' => 3],
            ['kode' => 'K3-5', 'nama' => '> 40 Tahun', 'nilai' => 1, 'kriteria_id' => 3],

            // K4 - Hasil Tes Tertulis
            ['kode' => 'K4-1', 'nama' => 'Sangat Baik (90-100)', 'nilai' => 5, 'kriteria_id' => 4],
            ['kode' => 'K4-2', 'nama' => 'Baik (80-89)', 'nilai' => 4, 'kriteria_id' => 4],
            ['kode' => 'K4-3', 'nama' => 'Cukup (70-79)', 'nilai' => 3, 'kriteria_id' => 4],
            ['kode' => 'K4-4', 'nama' => 'Kurang (60-69)', 'nilai' => 2, 'kriteria_id' => 4],
            ['kode' => 'K4-5', 'nama' => 'Sangat Kurang (< 60)', 'nilai' => 1, 'kriteria_id' => 4],

            // K5 - Sikap & Kepribadian
            ['kode' => 'K5-1', 'nama' => 'Sangat Baik', 'nilai' => 5, 'kriteria_id' => 5],
            ['kode' => 'K5-2', 'nama' => 'Baik', 'nilai' => 4, 'kriteria_id' => 5],
            ['kode' => 'K5-3', 'nama' => 'Cukup', 'nilai' => 3, 'kriteria_id' => 5],
            ['kode' => 'K5-4', 'nama' => 'Kurang', 'nilai' => 2, 'kriteria_id' => 5],
            ['kode' => 'K5-5', 'nama' => 'Sangat Kurang', 'nilai' => 1, 'kriteria_id' => 5],

            // K6 - Kesesuaian Kompetensi
            ['kode' => 'K6-1', 'nama' => 'Sangat Sesuai', 'nilai' => 5, 'kriteria_id' => 6],
            ['kode' => 'K6-2', 'nama' => 'Sesuai', 'nilai' => 4, 'kriteria_id' => 6],
            ['kode' => 'K6-3', 'nama' => 'Cukup Sesuai', 'nilai' => 3, 'kriteria_id' => 6],
            ['kode' => 'K6-4', 'nama' => 'Kurang Sesuai', 'nilai' => 2, 'kriteria_id' => 6],
            ['kode' => 'K6-5', 'nama' => 'Tidak Sesuai', 'nilai' => 1, 'kriteria_id' => 6],
        ];

        foreach ($subKriteria as $item) {
            SubKriteria::create($item);
        }
    }
}
