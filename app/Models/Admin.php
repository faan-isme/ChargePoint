<?php

namespace App\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Admin extends Model implements AuthenticatableContract
{
    use Authenticatable;
    protected $table = 'admin';
    protected $fillable = [
        'username',
        'email',
        'role',
        'password',
    ];
    protected $casts = [
        'password' => 'hashed'
    ];
    public function hasil()
    {
        return $this->hasMany(Hasil::class);
    }
    public function pesan()
    {
        return $this->hasMany(Pesan::class);
    }
}

