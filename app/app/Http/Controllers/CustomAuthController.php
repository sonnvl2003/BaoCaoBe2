<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

//Unknow
class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    
    public function dashboard()
    {
        $panigation = User::paginate(3);
        if (Auth::check()) {
            return view('dashboard',array(
                "panigation"=> $panigation
            ));
        }
        
        return view("login",array(
            "panigation"=> $panigation
        ));
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
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
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'image' => $data['image']
        ]);
    }

    public function signOut() {
        // Session::flush();
        Auth::logout();

        return Redirect('login');
    }

}
