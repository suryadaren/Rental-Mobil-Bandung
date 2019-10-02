<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    // protected $redirectTo = '/home';

    public function __construct()
    {
    //     $this->middleware('guest')->except('logout');
    }

    // untuk menampilkan halaman login yang berada pada folder view
    public function login(){
        return view('login');
    }

    // untuk check apakah email dan password login benar
    public function cekLogin(Request $Request){

        // mengambil data data login yang di inputkan
        $data = [
            "email" => $Request->email,
            'password' => $Request->password,
        ];

        // check, apakah data yang di inputkan sesuai dengan data yang ada di database atau tidak
        // jika benar
        if(auth()->attempt($data)){

            // pergi ke halaman admin
            return redirect('/admin');
        }
        // jika tidak
        else{
            
            // kembali ke halaman login
            return redirect('/login');
        }
    }

    public function logout(){
        auth()->logout();
        return redirect( url('/login'));
    }
}
