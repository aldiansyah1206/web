<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'users';
    use HasFactory;

    protected $fillable = [
    "name",
    "email",
    "jenis_kelamin",
    "password",
    'kelas_id',
    'jurusan_id',
    "alamat",
    "no_hp",
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function kegiatan()
    {
        return $this->belongsToMany(Kegiatan::class, 'kegiatan_siswa');
    }
}
