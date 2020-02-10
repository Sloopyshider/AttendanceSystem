<?php

namespace App\Http\Controllers;

use App\Position;
use App\User;
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

        $positionCode = 'STF';

        $position = Position::where('code', $positionCode)->first();



        if($position) {
//            var_dump($position);
//            exit();
        } else {
//            var_dump('NO RECORD');
//            exit();
        }

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
            return view('welcome');
        } else {
            Auth::logout();
            return view('login')->withErrors('CREDENTIALS NOT FOUND');
        }

    }

    public function about(){


        $user = Auth::user();

        if(!$user) return redirect('/login')->withErrors('YOU MUST LOGIN FIRST');

        $titlename = $user->email;

//        dd($user);





        $title = 'Hello';
        return view('about')->with('title', $title)->with('titlename', $titlename);
    }



    public function logout(){
        Auth::logout();
        return redirect('login');
    }

}
