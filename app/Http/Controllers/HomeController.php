<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function showLogin(Request $request)
    {
        return view('login');
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('view.login');
    }

    public function postLogin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($data)) {
            return view('test');
        } else {
            return redirect()->route('view.login');
        }
    }
}
