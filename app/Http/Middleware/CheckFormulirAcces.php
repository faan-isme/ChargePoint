<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Formulir;

class CheckFormulirAcces
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $userId = auth()->id(); // Mendapatkan ID pengguna yang sedang login

        // Lakukan pengecekan pada tabel formulir
        if (Formulir::where('id_user', $userId)->exists()) {
            // Jika ada, kita tolak akses
            return redirect()->back()->with('info', 'Anda Sudah Mengirim Formulir!');
        }

        // Jika tidak, lanjutkan ke permintaan berikutnya
        return $next($request);
    }
}
