<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use App\Models\ProgramMitra;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function home()
    {
        $data = ProgramMitra::select('nama_program', 'harga')->get();
        return view('home', compact('data'));
    }
    public function formulir()
    {
        $data = Formulir::join('users', 'formulir.id_user', '=', 'users.id')
            ->select('id','users.name', 'users.email')
            ->paginate(5);;
        return view('admin.data_pendaftaran', compact('data'));
    }

    public function cekFormulir($id_formulir)
    {
        $formulir = Formulir::with(['users:id,name,email'])->findOrFail($id_formulir);
        return view('admin.cek_data_pendaftaran', compact('formulir'));
    }

    public function hasil()
    {
        $data = Formulir::join('users', 'formulir.id_user', '=', 'users.id')
            ->select('id','users.name', 'users.email')
            ->paginate(5);;
        return view('admin.data_pendaftaran', compact('data'));
    }
}
