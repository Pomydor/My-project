<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create()
    {
        return view('register');
    }
    public function info(){
        return view('politika');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
//            'avatar' => 'nullable|image',
        ]);

//        if ($request->hasFile('avatar')) {
//            $folder = date('Y-m-d');
//            $avatar = $request->file('avatar')->store("images/$folder");
//        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
//            'avatar'=>$avatar ?? null,
        ]);

        session()->flash('success', 'Register success');
        Auth::login($user);
        return redirect()->home();


    }


    public function loginForm()
    {
        return view('login');
    }


    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            if (Auth::user()->is_admin) {
                return redirect()->route('admin');
            } else {
                return redirect()->route('profile');
            }
        }

            return redirect()->back()->with('error', 'Incorrect login or password');

        }




            


    public function profile() {
        $users = User::all();
        $asd = auth()->user()->id;
        $posts = Post::where('user_id', $asd)->get();

        return view('profile', compact('users', 'posts', 'asd'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.create');
    }
  






}