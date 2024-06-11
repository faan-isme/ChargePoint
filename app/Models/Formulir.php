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
        'nama',
        'id_program',
        'id_pelangganPLN',
        'NIK',
        'id_user',
        'no_telp',
        'alamat',
        'ktp_img',
        'tipe_charger',
        'charger_img',
        'status',
        'tgl_pengiriman',
    ];
    protected $casts =[
        'tgl_pengiriman'=> 'datetime',
       
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function programMitra()
    {
        return $this->belongsTo(ProgramMitra::class);
    }
    public function hasil(): HasOne
    {
        return $this->hasOne(Hasil::class);
    }
    public function pesan(): HasOne
    {
        return $this->hasOne(Pesan::class);
    }
}
