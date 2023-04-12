<?php

namespace App\Http\Controllers;			
use Illuminate\Support\Facades\Auth;		
use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
    public function dashboard()
    {
        //if (Auth::check()) {
            return view('dashboard');
        //}
    }
}
