<?php

namespace App\Http\Controllers\Admin\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Assurez-vous que l'utilisateur est authentifié
    }
    public function index()
    {
        $user = auth()->user();
        dd($user);
        return view('admin.index',compact('user'));
    }
}
