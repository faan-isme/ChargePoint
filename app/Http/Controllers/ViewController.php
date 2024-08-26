<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use App\Models\Hasil;
use App\Models\Order;
use App\Models\Pesan;
use App\Models\ProgramMitra;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
            ->paginate(5);
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
    public function status()
    {
        $userId = Auth::id();
        $status = Formulir::where('id_user', $userId)->select('status')->first();
        if ($status->status == 'acc') {
            $data = Order::join('formulir', 'orders.id_formulir', '=', 'formulir.id')
                ->join('program_mitra', 'formulir.id_program', '=', 'program_mitra.id')
                ->select(
                    'program_mitra.harga',
                    'program_mitra.deskripsi',
                    'program_mitra.nama_program',
                    'orders.qty',
                    'orders.id',
                    'formulir.nama',
                    'formulir.no_telp',
                )->where('formulir.id_user', $userId)->get();
            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = config('midtrans.is_production');
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => $data->first()->id,
                    'gross_amount' => $data->first()->harga,
                ),
                'customer_details' => array(
                    'first_name' => $data->first()->nama,
                    'last_name' => '',
                    'phone' => $data->first()->no_telp,
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            return view('pages.Home.status', compact('status', 'data','snapToken'));
        } else {
            
            return view('pages.Home.status', compact('status'));
        }
    }

    public function profile()
    {
        $id = Auth::id();
        $data = User::select('username', 'email')->where('id', $id)->first();
        $formulir = Formulir::select('status', 'tgl_pengiriman', 'updated_at', 'id')->where('id_user', $id)->first();
        $order = Order::select('status', 'created_at', 'updated_at')->where('id_formulir', $formulir->id)->first();
        return view('pages.profile', compact('data', 'formulir', 'order'));
    }
}
