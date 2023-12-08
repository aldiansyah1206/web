<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    use HasFactory;

    protected $fillable = [
        "nama",
        "jurusan_id",
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
