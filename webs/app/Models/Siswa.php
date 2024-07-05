<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Siswa extends  Authenticatable
{
    use HasFactory, HasRoles;

    protected $table = 'siswa';
    
    use HasFactory;

    protected $fillable = [
    "name",
    "email",
    "password",
    "kegiatan_id",
    "jenis_kelamin",
    'kelas_id',
    'jurusan_id',
    'kelas_id',
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
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }

    public function presensi()
    {
        return $this->hasOne(Presensi::class, 'presensi_id');
    }
}
