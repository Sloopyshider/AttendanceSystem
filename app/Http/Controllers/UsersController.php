<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
/*use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;*/

use App\User;

class UsersController extends Controller
{

    public function index()
    {
        $data = [];
//
//        $userData = User::all(); //collection  aarray
//        $userData = User::find(2); //aarray
//        return response()->json($userData,200);
        $userId = Auth::user()->id;
        $user = User::where('id', $userId)
            ->with('position')->first();
        $positions = Position::all();
        $data['userData'] = $user;
        $data['positions'] = $positions;
        return view('pages.eprofile')->with($data);
    }


    public function create()
    {
        return view('pages.eprofile');
    }


    //store
    public function store(Request $request)
    {
        $this->validate($request, [
            'email_add' => 'required | email',
            'password' => 'required | confirmed | max: 10 | string',
            'first_name' => 'required | string | max: 10',
            'last_name' => 'required | string | max: 10',
            'middle_name' => 'required | string | max: 10',
            'birth_date' => 'required | date',
            'username' => 'required | string | max: 10',
            'address' => 'required | string',
            'mobile' => 'required | integer',
            'tel' => 'required | string',
            'password_confirmation' => 'required | confirmed | max: 10 | string'
        ]);

        $userData = new User();  //new instance of User
        $userData->email = $request->email;
        $userData->password = $request->password;
        $userData->first_name = $request->first_name;
        $userData->last_name = $request->last_name;
        $userData->middle_name = $request->middle_name;
        $userData->birth_date = $request->birth_date;
        $userData->username = $request->username;
        $userData->address = $request->address;
        $userData->mobile = $request->mobile;
        $userData->tel = $request->tel;
        $userData->save();



        return view('pages.eprofile')->with('userData', $userData);

//        $userData->name = $request->name; //fetch the data from URL / POST / GET
//
//        $userData->email = $request->email; //fetch the data from URL / POST / GET
//
//        $userData->password = Hash::make($request->password); //fetch the data from URL / POST / GET
//
//        $userData->save(); //store the new instance of object
//
//        return view('pages.eprofile')->with('userData',$userData);
    }


    public function show()
    {
        return view('pages.eprofile');
        //view walang function return view  : view profile    $userData = User::find(1); //aarray
    }


    public function edit($id)
    {

        $userData = DB::select('select * from user where id=?,[$id]');
        return view('eprofile', ['users' => $userData]);
    }


    public function update(Request $request, $id)
    {
        $requestFields = [
            'email' => 'required | email',
            'first_name' => 'required | string | max: 20 ',
            'last_name' => 'required | string | max: 20',
            'birth_date' => 'required | date',
            'username' => 'required | string | max: 20',
            'position' => 'integer',
            'address' => 'required | string',
            'mobile' => ' required | numeric | min: 11',
            'tel' => 'required | string  | min: 11',
        ];
        $requestFields['password'] = $request->password ? 'required | confirmed | max: 10 | string' : '';
        $requestFields['middle_name'] = $request->middle_name ? 'required | string | max: 10 | regex:/^[a-zA-Z]+$/u' : '';
        $validatedData  = $this->validate($request, $requestFields);
        $userData = User::find($id);
        $userData->fill($validatedData);

        $position = Position::find($request->position);

        $userData->position()->associate($position);
        $userData->save();

        return redirect('eprofile')->with('success' , 'good');
    }


    public function destroy($id)
    {
        return view('pages.eprofile', compact('data'));
    }
}
