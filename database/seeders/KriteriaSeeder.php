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
     */
    public function run(): void
    {
        $kode = ["P1", "P2", "P3", "P4"];
        $namaKriteria = ["Style", "Reliability", "Fuel-Economy", "Cost"];
        $bobot = [0.1, 0.4, 0.3, 0.2];

        foreach ($kode as $item => $value) {
            Kriteria::create([
                "kode" => $value,
                "nama" => $namaKriteria[$item],
                "bobot" => $bobot[$item],
            ]);
        }
    }
}
