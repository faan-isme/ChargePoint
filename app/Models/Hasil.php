<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $table = 'hasil';
    protected $fillable = [
        'id_formulir',
        'id_admin',
        'status'
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
