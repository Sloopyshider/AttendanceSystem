<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id', 3);
            $table->string('last_name', '100');
            $table->string('first_name', 100);
            $table->string('middle_name')->nullable();
            $table->date('birth_date');
            $table->string('email')->nullable()->unique();
            $table->string('username');
            $table->string('password');
            $table->string('address')->default('');
            $table->string('mobile')->default('');
            $table->string('tel')->default('');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
