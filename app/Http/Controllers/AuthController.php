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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        session()->flash('success', 'Успешно зарегистрирован');
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
                return redirect()->route('home');
            }
        }

            return redirect()->back()->with('errors', 'Неправильный Логин или Пароль');

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
