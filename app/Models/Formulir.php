<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Formulir extends Model
{
    use HasFactory;
    protected $table = 'formulir';
    protected $fillable = [
        'tgl_pengiriman',
        'id_program',
        'id_pelangganPLN',
        'NIK',
        'id_user',
        'ktp_img',
        'tipe_charger ',
        'charger_img '
    ];
    protected $casts =[
        'tgl_pengiriman'=> 'datetime'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function hasil(): HasOne
    {
        return $this->hasOne(Hasil::class);
    }
}
