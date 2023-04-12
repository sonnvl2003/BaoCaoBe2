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
            $users = User::all();
            $panigation = User::paginate(10);
            dd($panigation);die;
            return view('dashboard',array(
                "users"=>$users,
                "panigation"=>$panigation
            ));
        //}
    }
}
