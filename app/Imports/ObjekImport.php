<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Objek;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ObjekImport implements ToModel, WithStartRow, WithHeadingRow
{
    public function startRow(): int
    {
        return 2;
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function model(array $row)
    {
        return new Objek([
            'nama_kandidat'         => $row['objek'],
            'posisi_lamar'          => $row['posisi_lamar'] ?? null,
            'pendidikan_terakhir'   => $row['pendidikan_terakhir'] ?? null,
            'pengalaman_kerja'      => $row['pengalaman_kerja'] ?? null,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);
    }
}