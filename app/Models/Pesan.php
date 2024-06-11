<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;
    protected $table = 'pesan';
    protected $fillable = [
        'id_formulir',
        'id_admin',
        'pesan'
    ];
    public function formulir()
    {
        return $this->belongsTo(Formulir::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
