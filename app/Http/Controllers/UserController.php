<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'avatar' => 'nullable|image'
        ]);

        if ($request->hasFile('avatar')) {
            $folder = date('Y-m-d');
            $avatar = $request->file('avatar')->store("images/{$folder}", /*'public'*/);
        }
//        $avatar = $request->file('avatar')->store('images', /*'public'*/);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $avatar ?? null
        ]);

        if ($user) {
            session()->flash('success', 'Вы успешно зарегистрированы и авторизованы');
            Auth::login($user);

            return redirect()->home();
        }

        return redirect()->route('user.create');
    }


    public function loginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt([ // attempt сам расхеширует пароль и сравнит его с паролем в бд
                'email' => $request->email,
                'password' => $request->password,
            ])) {

            return redirect()->home();
        }

        return redirect()->back()->with('error', 'Неправильный логин или пароль'); // Вернёт пользователя на предыдущую страницу
    }



    public function logout()
    {
        Auth::logout(); // Удаляем авторизацию
        return redirect()->home();
    }
}
