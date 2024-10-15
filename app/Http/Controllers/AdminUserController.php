<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class AdminUserController extends Controller
{
    public function index()
    {
        $users =User::latest()->paginate(5);
        return view('admin.users.index',compact('users'));
    }
    /*public function __construct()
    {
        $this->middleware('role:admin'); // Assurez-vous que seul les admins peuvent accéder à ces routes
    }*/


    public function create()
    {
        $roles = Role::all();
        $hospitals = Hospital::all();
        $etatCiviles = EtatCivile::all();

        return view('admin.users.create', compact('roles','hospitals','etatCiviles'));
    }

    public function store(UserRegisterRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'adresse' => $request->adresse,
        ]);

        $user->assignRole($request->role);

        if ($request->role === 'sage-femme' && $request->filled('hospital_id')) {
            $hospital = Hospital::find($request->hospital_id);
            if ($hospital) {
                $hospital->user_id = $user->id;
                $hospital->save();
            }
        } elseif ($request->role === 'agent' && $request->filled('etat_civile_id')) {
            $etatCivil = EtatCivile::find($request->etat_civile_id);
            if ($etatCivil) {
                $etatCivil->user_id = $user->id;
                $etatCivil->save();
            }
        }

        // Envoyer la notification de réinitialisation de mot de passe
        $token = Password::createToken($user);
        //$user->notify(new CustomResetPasswordNotification($token));
        //session()->flash('success', 'Utilisateur créé avec succès!');

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès');
    }


    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::orderBy('name','ASC')->get();

        $hasRoles = $user->roles->pluck('id');


        return view('admin.users.edit',compact('user','roles','hasRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,'.$id.',id'
        ]);

        if ($validator->fails()){
            return redirect()->route('users.edit',$id)->withInput()->withErrors($validator);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $user->syncRoles($request->role);

        // Envoyer la notification de réinitialisation de mot de passe
        $token = Password::createToken($user);
        return redirect()->route('users.index')->with('success','Utilisateur mis a jour avec succes!.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('users.index')->with('success','L\'utilisateur est supprime avec sucsess');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Une erreur s\'est produite lors de la suppression.'], 500);
        }
    }
}
