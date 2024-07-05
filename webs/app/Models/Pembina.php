<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Pembina extends Model
{
    use HasRoles,HasFactory;

    protected $table = 'pembina';
    protected $guard_name = 'pembina';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'no_hp',
        'kegiatan_id',
        'jenis_kelamin',
        'image',
        'alamat',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }
}
