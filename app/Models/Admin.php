<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
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
}
