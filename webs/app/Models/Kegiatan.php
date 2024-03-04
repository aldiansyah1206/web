<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';
    
    use HasFactory;
    
    protected $fillable = [
        'nama',
        'deskripsi',
        'siswa'
    ];

    public function siswa() {
        return $this->belongsToMany(Siswa::class, 'kegiatan_siswa');
    }
}
