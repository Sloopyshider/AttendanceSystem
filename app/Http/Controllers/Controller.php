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
use Illuminate\Support\Facades\DB;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function login()
    {

        $positionCode = 'STF';

        $position = Position::where('code', $positionCode)->first();


        if ($position) {
//            var_dump($position);
//            exit();
        } else {
//            var_dump('NO RECORD');
//            exit();
        }

        return view('login');
    }

    public function authenticate(Request $request)
    {


        $username = $request->username;
        $password = $request->password;


        $loginCredentials = [
            'username' => $username,
            'password' => $password,
        ];

        if (Auth::attempt($loginCredentials)) {
            return redirect('intime')->with('about', 'Login Successfully');
        } else {
            Auth::logout();
            return view('login')->withErrors('CREDENTIALS NOT FOUND');
        }

    }

//    public function about()
//    {
//
//
//        $user = Auth::user();
//
//        if (!$user) return redirect('/login')->withErrors('YOU MUST LOGIN FIRST');
//
//        $titlename = $user->email;
//
////        dd($user);
//
//        $title = 'Hello';
//        return view('pages.intime')->with('title', $title)->with('titlename', $titlename);
//    }


    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function navbar()
    {


        return view('welcome');
    }

    public function profile()
    {
        $user = Auth::user()->id;
        if (!$user) return redirect('/login')->withErrors('YOU MUST LOGIN FIRST');
        $query = DB::select('SELECT * FROM users where id='.$user);
        return view('EmployeeProfile.eprofile',['query' => $query]);


    }

    public function intime()
    {
        $user = Auth::user();
        if (!$user) return redirect('/login')->withErrors('YOU MUST LOGIN FIRST');
        return view('pages/intime');

    }

    public function record()
    {
        $user = Auth::user();
        if (!$user) return redirect('/login')->withErrors('YOU MUST LOGIN FIRST');
        return view('pages/record');

    }
    public function edit(Request $request)
    {
           /* $id = Auth::user();
            $useData = $request->username;

                $use = User::find($id);
                $use -> username = $useData;
                $use->save();*/

        /*$user = Auth::user()->id;
        if (!$user) return redirect('/login')->withErrors('YOU MUST LOGIN FIRST');
        $username = $request->username;
        $f_name = $request->first_name;
        $query1 = DB::update('UPDATE users SET username=?, first_name=? where id = ? ',[$username,$f_name,$user]);

        if ($query1){
            $query1 = $query1;
        }
        return redirect('eprofile');*/

    }


}
