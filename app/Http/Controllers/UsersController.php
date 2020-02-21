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
            'email_add' => 'required',
            'password' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'birth_date' => 'required',
            'username' => 'required'
        ]);

        $userData = new User();  //new instance of User
        $userData->email = $request->email;
        $userData->password = Hash::make($request->password);
        $userData->first_name = $request->first_name;
        $userData->last_name = $request->last_name;
        $userData->middle_name = $request->middle_name;
        $userData->birth_date = $request->birth_date;
        $userData->username = $request->username;
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
        //view walang function return view  : view profile     $userData = User::find(1); //aarray
    }


    public function edit($id)
    {

        $userData = DB::select('select * from user where id=?,[$id]');
        return view('eprofile', ['users' => $userData]);
    }


    public function update(Request $request, $id)
    {
        $requestFields = [
            'email' => '',
            'first_name' => 'required',
            'last_name' => '',
            'birth_date' => '',
            'username' => 'required',
            'position' => 'integer'
        ];
        $requestFields['password'] = Hash::make($request->password) ? 'required' : '';
        $requestFields['middle_name'] = $request->middle_name ? 'required' : '';
        $validatedData  = $this->validate($request, $requestFields);
        $userData = User::find($id);
        $userData->fill($validatedData);

        $position = Position::find($request->position);

        $userData->position()->associate($position);
        $userData->save();

        return redirect('eprofile')->with('success' , 'good');


//        $userData->email = $request->input('email');
//        $userData->password = $request->input('password');
//        $userData->first_name = $request->input('first_name');
//        $userData->last_name = $request->input('last_name');
//        $userData->middle_name = $request->input('middle_name');
//        $userData->birth_date = $request->input('birth_date');
//        $userData->username = $request->input('username');
//        $userData->save();

//        $data = User::find(2);
//        $data->username = $request->get('username');
//        $data->first_name = $request->get('first_name');
//        $data->email = $request->get('email');
//        $data->save();
    }


    public function destroy($id)
    {
        return view('pages.eprofile', compact('data'));
    }
}
