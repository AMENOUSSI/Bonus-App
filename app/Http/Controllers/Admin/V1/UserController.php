<?php

namespace App\Http\Controllers\Admin\V1;

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
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('admin.users.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $request->validated();
        try {
            User::create($request->all());

            return to_route('admin.users.index')->with('success', 'Ce distributeur est enregistre avec succes!.');

        }catch (Exception $e){
        return redirect()->back()->with('error', 'Error deleting user: ' . $e->getMessage());
}


    }

    /**
     * Display the specified resource.
     */
    public function show($userId)
    {

        $user = User::with('downlines', 'sales.product')->findOrFail($userId);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $users = User::all();
        return view('admin.users.edit', compact('user','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $user->update($request->validated());
            return to_route('admin.users.index')->with('success', 'Ce distributeur a ete modifie avec succes!.');;
        }catch (Exception $e){
        return redirect()->back()->with('error', 'Error deleting user: ' . $e->getMessage());
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('admin.users.index')->with('success', 'Ce distributeur a ete supprime.');
        } catch (Exception $e) {

            return redirect()->back()->with('error', 'Error deleting user: ' . $e->getMessage());
        }


    }
}
