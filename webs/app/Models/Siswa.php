<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Siswa extends Model
{
    protected $table = 'siswa';
    
    use HasFactory;

    protected $fillable = [
    "name",
    "email",
    "password",
    "jenis_kelamin",
    'kelas_id',
    'jurusan_id',
    "no_hp",
    "alamat",
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

    public function presensi()
    {
        return $this->hasOne(Presensi::class, 'presensi_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
