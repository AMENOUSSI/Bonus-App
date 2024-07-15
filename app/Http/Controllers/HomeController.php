<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $userType = Auth::user()->usertype;

            if ($userType === 'secretaire') {
                return view('dashboard');
            } else if ($userType === 'admin') {
                return view('layouts.admin.main');
            }
        }


    }


    public function homepage()
    {
        return view('welcome');
    }

    public function post()
    {
        return "Post";
    }

}
