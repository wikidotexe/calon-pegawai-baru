<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $table = "alternatif";
    protected $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        "objek_id",
        "nama_kandidat",             // <- Tambahkan ini
        "posisi_lamar",        // <- Tambahkan ini
        "pendidikan_terakhir",     // <- Tambahkan ini
        "pengalaman_kerja",   // <- Tambahkan ini
    ];

    public function objek()
    {
        return $this->belongsTo(Objek::class);
    }
}
