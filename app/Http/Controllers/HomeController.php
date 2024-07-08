<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            $user = Auth::user();

            if ($user->is_admin)
            {
                return view('layouts.admin');
            }
            else
            {
                return view('layouts.user');
            }
        }
        else
        {
            return redirect()->back();
        }

    }

    public function homepage()
    {
        return view('welcome');
    }
}
