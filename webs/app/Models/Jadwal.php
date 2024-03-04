<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';

    use HasFactory;

    protected $fillable = [
        "tanggal",
        "jam_mulai",
        "jam_selesai",
        "kegiatan_id",
        "pembina_id",
    ];

    public function pembina()
    {
        return $this->belongsTo(Pembina::class, 'pembina_id');
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }
}
