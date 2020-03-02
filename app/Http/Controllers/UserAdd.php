<?php

namespace App\Http\Controllers;

use App\Position;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAdd extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        $userdata = User::all();
        return view('pages/admin/displayuser')->with($data)->with('positions',$positions)->with('userData',$userdata);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pos = Position::all();

        return view('pages/admin/useradd')->with("pos",$pos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'email_add' => 'required',
            'password' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'birth_date' => 'required',
            'username' => 'required',
            'position' => 'required',
        ]);
        $userData = new User();   //new instance of User
        $userData->email = $request->email_add;
        $userData->password = Hash::make($request->password);
        $userData->first_name = $request->first_name;
        $userData->last_name = $request->last_name;
        $userData->middle_name = $request->middle_name;
        $userData->birth_date = $request->birth_date;
        $userData->username = $request->username;
        $userData->position_id = $request->position;
        $positions = Position::find($request->position);
        $userData->position()->associate($positions);
        $userData->save();
        return redirect('displayuser')->with('userData', $userData);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('displayuser')->with('success', 'Contact deleted!');
    }
}
