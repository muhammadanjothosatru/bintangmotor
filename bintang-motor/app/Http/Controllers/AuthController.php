<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->level == 'adminlamongan') {
                return redirect()->intended('adminLamongan'); // tergantung halaman
            } elseif ($user->level == 'adminbabat') {
                return redirect()->intended('adminBabat'); //tergantung halaman
            }
        }
        return view('auth.login'); // ke views login
    }

    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]);

        $kredensil = $request->only('username','password');

            if (Auth::attempt($kredensil)) {
                $user = Auth::user();
                if ($user->level == 'adminlamongan') {
                    return redirect()->intended('adminLamongan');
                } elseif ($user->level == 'adminbabat') {
                    return redirect()->intended('adminBabat');
                }
                return redirect()->intended('/');
            }

        return redirect('/login')
                                ->withInput()
                                ->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }

    public function logout(Request $request)
    {
       $request->session()->flush();
       Auth::logout();
       return Redirect('login');
    }
}
