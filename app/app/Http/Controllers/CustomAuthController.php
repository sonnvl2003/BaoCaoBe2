<?php

namespace App\Http\Controllers;			
use Illuminate\Support\Facades\Auth;		
use Illuminate\Http\Request;
use App\Models\User;

class CustomAuthController extends Controller
{
    public function dashboard()
    {
        //if (Auth::check()) {
            $panigation = User::paginate(3);
            return view('dashboard',array(
                "panigation"=>$panigation
            ));
        //}
    }
}
