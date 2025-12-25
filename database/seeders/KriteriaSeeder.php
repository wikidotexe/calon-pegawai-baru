<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Kriteria untuk Penerimaan Calon Pegawai Baru
     * PT Lizzie Parra Kreasi
     */
    public function run(): void
    {
        $kriteria = [
            ['kode' => 'K1', 'nama' => 'Pengalaman Kerja', 'bobot' => 0.25],
            ['kode' => 'K2', 'nama' => 'Pendidikan', 'bobot' => 0.20],
            ['kode' => 'K3', 'nama' => 'Usia', 'bobot' => 0.10],
            ['kode' => 'K4', 'nama' => 'Hasil Tes Tertulis', 'bobot' => 0.20],
            ['kode' => 'K5', 'nama' => 'Sikap & Kepribadian', 'bobot' => 0.15],
            ['kode' => 'K6', 'nama' => 'Kesesuaian Kompetensi', 'bobot' => 0.10],
        ];

        foreach ($kriteria as $item) {
            Kriteria::create($item);
        }
    }
}
