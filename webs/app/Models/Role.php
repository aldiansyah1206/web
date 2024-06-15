<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Role extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = ['name'];
    
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function pembina()
{
    return $this->hasMany(Pembina::class, 'role_id');
}
}
