<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    use HasFactory;

    protected $fillable = [
    "nama",
    "nama_lengkap",
    "jurusan_id",
    "kelas_id",
    "email",
    "alamat",
    "jenis_kelamin",
    ];
    
    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
