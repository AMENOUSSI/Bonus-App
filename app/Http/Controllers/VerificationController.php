<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify($code)
    {
        $user = User::where('verification_code', $code)->first();

        if (!$user) {
            return redirect('/login')->withErrors(['message' => 'Le code de vérification est invalide.']);
        }

        $user->email_verified_at = now();
        $user->verification_code = $code;
        $user->save();

        Session::flash('status', 'Nous vous avons envoyé un e-mail de vérification. Veuillez consulter votre boîte de réception pour activer votre compte.');


        return redirect('/home')->with('message', 'Votre adresse email a été vérifiée. Vous pouvez maintenant vous connecter.');
    }
}
