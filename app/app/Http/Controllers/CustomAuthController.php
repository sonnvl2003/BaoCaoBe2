<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Crypt;

//Unknow
class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }


    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required | numeric | digits:10',
            'image' => 'required'
        ]);

        $data = $request->all();
        $data['image'] = $this->createNewName($request);
        $check = $this->create($data);
        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function createNewName(Request $Request)
    {
        $newNameImg = "IMG" . time() . '.' . $Request->file('image')->guessExtension();
        $Request->image->move(base_path('./public/image'), $newNameImg);
        return $newNameImg;
    }


    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => FacadesHash::make($data['password']),
            'phone' => $data['phone'],
            'image' => $data['image']
        ]);
    }

}
