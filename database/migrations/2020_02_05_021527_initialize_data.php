<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InitializeData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        $position = new \App\Position();
        $position->code = 'SFTADM';
        $position->name = 'Software Administrator';
        $position->save();


        $staff = new \App\Position();
        $staff->code = 'STF';
        $staff->name = 'Staff';
        $staff->save();

        $user = new \App\User();
        $user->last_name = 'Ramirez';
        $user->first_name = 'John Jose';
        $user->middle_name = 'Dacalio';
        $user->birth_date = '1999-08-18';
        $user->email = 'ramirezjohn@gmail.com';
        $user->username = 'john';
        $user->password = \Illuminate\Support\Facades\Hash::make('john');
        $user->position_id = $position->id;
        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
