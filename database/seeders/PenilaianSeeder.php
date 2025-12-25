<?php

namespace Database\Seeders;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\SubKriteria;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Penilaian 100 Calon Pegawai berdasarkan 6 Kriteria
     * Total: 600 penilaian
     * Nilai: 1-5 (sesuai sub kriteria)
     * 
     * Kriteria:
     * K1: Pengalaman Kerja
     * K2: Pendidikan
     * K3: Usia
     * K4: Hasil Tes Tertulis
     * K5: Sikap & Kepribadian
     * K6: Kesesuaian Kompetensi
     */
    public function run(): void
    {
        $alternatif = Alternatif::orderBy('id', 'asc')->get();
        $kriteria = Kriteria::orderBy('id', 'asc')->get();
        
        // Generate penilaian untuk setiap alternatif
        foreach ($alternatif as $item) {
            foreach ($kriteria as $value) {
                // Generate nilai random 1-5 dengan distribusi yang realistis
                // Lebih banyak nilai 3-4 (normal distribution)
                $nilai = $this->generateRealisticScore();
                
                $subKriteria = SubKriteria::where('kriteria_id', $value->id)
                    ->where('nilai', $nilai)
                    ->first();
                
                if ($subKriteria) {
                    Penilaian::create([
                        "alternatif_id" => $item->id,
                        "kriteria_id" => $value->id,
                        "sub_kriteria_id" => $subKriteria->id,
                    ]);
                }
            }
        }
    }

    /**
     * Generate nilai dengan distribusi realistis
     * Distribusi: 1(5%), 2(15%), 3(30%), 4(35%), 5(15%)
     */
    private function generateRealisticScore(): int
    {
        $random = rand(1, 100);
        
        if ($random <= 5) {
            return 1;  // 5% - Sangat Kurang
        } elseif ($random <= 20) {
            return 2;  // 15% - Kurang
        } elseif ($random <= 50) {
            return 3;  // 30% - Cukup
        } elseif ($random <= 85) {
            return 4;  // 35% - Baik
        } else {
            return 5;  // 15% - Sangat Baik
        }
    }
}
