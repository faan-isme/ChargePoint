<?php

namespace App\Http\Middleware;

use App\Models\Admin as ModelsAdmin;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userId = auth()->id(); // Mendapatkan ID pengguna yang sedang login

        // Lakukan pengecekan pada tabel formulir
        if (ModelsAdmin::where('id', $userId)->where('role', 'admin')->exists()) {
            return $next($request);
            
        }
        return redirect()->route('home')->withErrors(['error' => 'Anda tidak memiliki akses!']);
    }
}
