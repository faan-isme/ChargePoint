<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
