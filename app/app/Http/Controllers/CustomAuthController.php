<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
    public function userDetail(Request $request){
        $user = User::find($request->id);
        return view('auth.userDetail',array(
            "user"=>$user
        ));
    }
}
