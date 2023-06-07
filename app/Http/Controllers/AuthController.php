<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function response(Request $request)
    {
        if ($request->nik==null) {
            alert()->warning('Warning','nik must be filled in');
            return redirect()->back();
        }elseif ($request->password==null) {
            alert()->warning('Warning','nik must be filled in');
            return redirect()->back();
        }else{

            $credentials = $request->validate([
                'nik' => ['required'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {

                if (Auth::user()->status==1) {
                    $request->session()->regenerate();
                    toast('user found successfully','success');
                    return redirect()->intended('dashboard');

                }elseif (Auth::user()->status==0) {
                    toast('account is no longer active, please contact admin','warning');
                    return redirect('/');
                }

            }
            toast('user not found','error');
            return redirect('/');
        }
    }


    public function logout()
    {
        Auth::logout();
        toast('Success','success');
        return redirect('/');
    }
}
