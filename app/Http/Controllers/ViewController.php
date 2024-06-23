<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use App\Models\Hasil;
use App\Models\Pesan;
use App\Models\ProgramMitra;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

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
            ->select('formulir.id', 'users.username', 'users.email')
            ->where('formulir.status', 'new')
            ->paginate(5);;
        return view('pages.Dashboard.DataPendaftaran', compact('data'));
    }

    public function cekFormulir($id_formulir)
    {
        $data = Formulir::join('users', 'formulir.id_user', '=', 'users.id')
            ->join('program_mitra', 'formulir.id_program', '=', 'program_mitra.id')
            ->select(
                'formulir.id as formulir_id',
                'users.id as id_user',
                'nama_program',
                'email',
                'nama',
                'id_pelangganPLN',
                'NIK',
                'no_telp',
                'alamat',
                'ktp_img',
                'tipe_charger',
                'charger_img',
                'tgl_pengiriman',
            )
            ->where('formulir.id', $id_formulir)
            ->first();
        return view('pages.Dashboard.CheckPendaftaran', compact('data'));
    }

    public function revisi()
    {
        $data = Formulir::join('users', 'formulir.id_user', '=', 'users.id')
            ->select('formulir.id', 'users.username', 'users.email')
            ->where('formulir.status', 'revisi')
            ->paginate(5);;
        return view('pages.Dashboard.RevisiPendaftaran', compact('data'));
    }
    public function pesan($id)
    {
        return view('pages.Dashboard.Pesan', compact('id'));
    }
    public function hasil()
    {
        $data = Hasil::join('formulir', 'hasil.id_formulir', '=', 'formulir.id')
            ->join('users', 'formulir.id_user', '=', 'users.id')
            ->join('admin', 'hasil.id_admin', '=', 'admin.id')
            ->select(
                'users.username as username',
                'users.email as email',
                'admin.username as admin',
                'hasil.created_at as tanggal'
            )
            ->paginate(5);
        return view('pages.Dashboard.AccPendaftaran', compact('data'));
    }

    public function revisiFormulir($encryptedId)
    {
        try {
            $id = Crypt::decryptString($encryptedId);
        } catch (DecryptException $e) {
            abort(404); // Jika dekripsi gagal, kembalikan 404
        }
        $intID = intval($id);
        // $data = Pesan::join('formulir', 'pesan.id_formulir', '=', 'formulir.id')
        //     ->join('admin', 'pesan.id_formulir', '=', 'admin.id')
        //     ->where('formulir.id', $intID)
        //     ->where('formulir.status', 'revisi')
        //     ->first();
        $data = DB::table('pesan')
            ->join('formulir', 'pesan.id_formulir', '=', 'formulir.id')
            ->join('admin', 'pesan.id_admin', '=', 'admin.id')
            ->select(
                'admin.username',
                'pesan.pesan',
                'pesan.updated_at as pesan_updated_at',
                'formulir.id',
                'formulir.id_program',
                'formulir.nama',
                'formulir.id_pelangganPLN',
                'formulir.NIK',
                'formulir.id_user',
                'formulir.no_telp',
                'formulir.alamat',
                'formulir.ktp_img',
                'formulir.tipe_charger',
                'formulir.charger_img',
                'formulir.status',
                'formulir.tgl_pengiriman'
            )
            ->where('formulir.id', $intID)
            ->where('formulir.status', 'revisi')
            ->first();
        return view('pages.Home.editPendaftaran', compact('data'));
    }
    public function status($status)
    {
        return view('pages.Home.status', ['status'=>$status]);
    }
}
