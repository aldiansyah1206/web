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
    ];

    public function pembina()
    {
        return $this->belongsTo(Pembina::class, 'pembina_id');
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
