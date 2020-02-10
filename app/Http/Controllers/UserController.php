<?php

namespace App\Http\Controllers;

use App\Position;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function index() {

        $users = User::all();


        foreach ($users as $user) {


//
//            $position = Position::find(1);
//
//            $user->position()->associate($position);
//            $user->save();

            echo "$user->last_name, $user->first_name, $user->middle_name, " . $user->position->name;
        }


        dd($users);

    }




}
