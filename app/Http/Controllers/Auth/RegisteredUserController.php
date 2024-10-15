<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        $sponsors = User::all(); // Fetch all users to be potential sponsors
        return view('auth.register', compact('sponsors'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'identity_reference' => ['required', 'string', 'max:255', 'unique:users'],
            'registration_number' => ['required', 'string', 'max:255', 'unique:users'],
            'sponsor_id' => ['nullable', 'exists:users,id'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $verification_code = Str::random(6);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'identity_reference' => $request->identity_reference,
            'registration_number' => $request->registration_number,
            'sponsor_id' => $request->sponsor_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification_code' => $verification_code,
        ]);

        // Envoyer l'email de vérification
        $user->notify(new VerifyEmail($verification_code));

        Alert::success('Enregistrement réussi!', 'Veuillez vérifier votre email pour activer votre compte.');

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
