<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $admin = Admin::where('email', $request->email)->first();
        if ($admin && Hash::check($request->password, $admin->password) && $admin->role =='admin') {
            Auth::login($admin);
            return redirect()->route('admin.dashboard');
        }

        // Cek login sebagai User
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password) && $user->role =='user') {
            Auth::login($user);
            return redirect()->route('home');
        }
        
         // Jika gagal login
         return back()->withErrors([
            'email' => 'User tidak dapat ditemukan',
        ]);
    }

    function register(Request $request) {
        Session::flash('username', $request->input('username'));
        Session::flash('email', $request->input('email'));
        $request->validate(
            [
                'username'=>'required',
                'email'=>'required|email|unique:users',
                'no_telp'=>'required|numeric|max:15',
                'alamat'=>'required|max:255',
                'password'=>'required|min:8|confirmed'
            ],[
                'username.required'=>'Nama wajib diisi',
                'email.required'=>'Email wajib diisi',
                'email.email'=>'Format email salah atau tidak valid',
                'email.unique'=>'Email sudah digunakan, silahkan masukkan email yang lain',
                'no_telp.required'=>'Nomor telepon wajib diisi',
                'no_telp.numeric'=>'Nomer telepon harus berupa angka',
                'no_telp.max'=>'Nomer telepon maximum 15 angka',
                'alamat.required'=>'Alamat wajib diisi',
                'alamat.max'=>'Alamat maximal 255 karakter',
                'password.required'=>'Password wajib diisi',
                'password.min'=>'Minimum password 8 karakter',
                'password.confirmed'=>'Password Konfirmasi Tidak cocok'

            ]
        );
        
        
        $data = [
                'username'=>$request->username,
                'email'=>$request->email,
                'alamat'=>$request->alamat,
                'status'=>0,
                'role'=>'user',
                'no_telp'=>$request->no_telp,
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
        return redirect()->route('index');
    }
}
