<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIdValidity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   public function handle(Request $request, Closure $next)
    {
        // Periksa apakah jenis metode adalah POST
        if (!$request->isMethod('post')) {
            // Jika tidak, berikan respons yang sesuai
            return response()->json(['error' => 'Method not allowed.'], 405);
        }

        // Lanjutkan ke langkah selanjutnya jika jenis metode adalah POST
        return $next($request);
    }
}
