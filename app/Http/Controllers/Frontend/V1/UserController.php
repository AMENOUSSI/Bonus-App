<?php

namespace App\Http\Controllers\Frontend\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*$users = User::with('sponsor')->paginate(10);


        return view('admin.users.index',compact('users'));*/
        $users = User::with('downlines', 'sales')->paginate(10);
        return view('frontend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('frontend.users.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $request->validated();
        User::create($request->all());

        return to_route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($userId)
    {
        $user = User::with('downlines', 'sales.product')->findOrFail($userId);
        return view('frontend.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $users = User::all();
        return view('frontend.users.edit', compact('user','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $user->update($request->validated());
            return to_route('users.index')->with('success', 'Distributeur updated successfully.');
        }catch (Exception $e){
        return redirect()->back()->with('error', 'Une erreur est survenue lors de la modification: ' . $e->getMessage());
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'Distributeur supprime avec succes.');
        } catch (Exception $e) {

            return redirect()->back()->with('error', 'Error deleting user: ' . $e->getMessage());
        }


    }
}
