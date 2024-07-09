<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
        /*if (!auth()->check() || !auth()->user()->is_admin){
            Log::warning('Accès refusé pour l\'utilisateur : ', ['user' => auth()->user()]);

            abort(403);
        }*/

        if(Auth()->user()->usertype == 'admin')
        {
            return $next($request);
        }
        abort(401);

    }
}
