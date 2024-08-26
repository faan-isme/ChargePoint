<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function keranjang()
    {
        $userId = Auth::id();

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
    }

    
    public function callback(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture' or $request->transaction_status == 'settlement'){
                $order = Order::find($request->order_id);
                $order->update(['status' => 'Paid']);
            }
        }
    }
}
