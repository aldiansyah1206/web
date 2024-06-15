<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    protected $table = 'presensi';
    protected $fillable = [
        'siswa_id', 
        'jam_masuk', 
        'jam_keluar', 
        'keterangan'
    ];
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
