<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusan';
    use HasFactory;

    protected $fillable = [
        "nama"
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
    
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}