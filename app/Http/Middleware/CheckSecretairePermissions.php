<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSecretairePermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si l'utilisateur est connecté
        if (Auth::check()) {
            $user = Auth::user();

            // Vérifier si l'utilisateur est secrétaire
            if ($user->hasRole('secretaire')) {
                // Empêcher la suppression des ressources
                if ($request->isMethod('delete')) {
                    return response()->json(['message' => 'Vous n\'avez pas l\'autorisation de supprimer cette ressource.'], 403);
                }
            }
        }

        return $next($request);
    }
}
