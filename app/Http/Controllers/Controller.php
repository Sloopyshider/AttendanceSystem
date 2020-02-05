<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function login() {
        return view('login');
    }

    public function authenticate(Request $request) {


        $username = $request->username;
        $password= $request->password;
        $loginCredentials = [
            'username' => $username,
            'password' => $password,
        ];

        if(Auth::attempt($loginCredentials)) {
            dd('pasok');
        } else {
            dd('hindi');
        }

    }

}
