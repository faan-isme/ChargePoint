<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function login(Request $request) {
        Session::flash('email', $request->input('email'));
        $request->validate(
        [
            'email'=>'required|email',
            'password'=>'required'
        ],
        [
            'email.required'=>'email wajib diisi',
            'email.email'=>'Format email salah atau tidak valid',
            'password.required'=>'password wajib diisi'
        ]
        );

        // Cek login sebagai Admin
        
        try {
            $admin = Admin::where('email', $request->email)->first();
        }catch (QueryException $e) {
            // Menangani kesalahan query database
            Log::error('Query Exception: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan pada database. Silakan coba lagi.']);
        } catch (ModelNotFoundException $e) {
            // Menangani kesalahan model tidak ditemukan
            Log::error('Model Not Found Exception: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Data yang dicari tidak ditemukan.']);
        } catch (Exception $e) {
            // Menangani kesalahan umum lainnya
            Log::error('General Exception: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan. Silakan coba lagi.']);
        }

        if ($admin && Hash::check($request->password, $admin->password) && $admin->role =='admin') {
            Auth::login($admin);
            return redirect()->route('DataPendaftaran');
        }

        // Cek login sebagai User
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password) && $user->role =='user') {
            Auth::login($user);
            return redirect()->route('home');
        }
        
         // Jika gagal login
         return back()->withErrors([
            'error' => 'User tidak dapat ditemukan',
        ]);
    }

    function register(Request $request) {
        Session::flash('username', $request->input('username'));
        Session::flash('email', $request->input('email'));
        $request->validate(
            [
                'username'=>'required',
                'email'=>'required|email|unique:users',
                // 'no_telp'=>'required|numeric|max:15',
                // 'alamat'=>'required|max:255',
                'password'=>'required|min_digits:8|confirmed'
            ],[
                'username.required'=>'Nama wajib diisi',
                'email.required'=>'Email wajib diisi',
                'email.email'=>'Format email salah atau tidak valid',
                'email.unique'=>'Email sudah digunakan, silahkan masukkan email yang lain',
                // 'no_telp.required'=>'Nomor telepon wajib diisi',
                // 'no_telp.numeric'=>'Nomer telepon harus berupa angka',
                // 'no_telp.max'=>'Nomer telepon maximum 15 angka',
                // 'alamat.required'=>'Alamat wajib diisi',
                // 'alamat.max'=>'Alamat maximal 255 karakter',
                'password.required'=>'Password wajib diisi',
                'password.min_digits'=>'Minimum password 8 karakter',
                'password.confirmed'=>'Password Konfirmasi Tidak cocok'

            ]
        );
        
        
        $data = [
                'username'=>$request->username,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
        ];
        $user = User::create($data);

        event(new Registered($user));
        
        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        Auth::attempt($infologin);
        return redirect()->route('verification.notice')->with('succes', 'Akun telah berhasil dibuat, silahkan verifikasi melalui email yang dikirim!');


    }
    function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
