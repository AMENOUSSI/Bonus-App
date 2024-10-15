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

           if ($userType === 'admin') {
                return view('admin.index');
           }

           return view('dashboard');
        }


    }


    public function homepage()
    {
        return view('welcome');
    }



}
