<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProgramMitra extends Model
{
    use HasFactory;
    protected $table = 'ProgramMitra';
    protected $fillable = [
        'nama_program',
        'harga',
        'deskripsi'
    ];
    public function formulir(): HasOne
    {
        return $this->hasOne(Formulir::class);
    }
}
