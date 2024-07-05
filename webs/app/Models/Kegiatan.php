<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    
    protected $table = 'kegiatan';
    
    protected $fillable = [
        'nama',
        'deskripsi',
    ];

   
    public function pembina()
    {
        return $this->hasMany(Pembina::class, 'kegiatan_id');
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
