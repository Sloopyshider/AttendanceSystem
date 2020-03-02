<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id';

    protected $table = 'users';

    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'password',
        'middle_name',
        'birth_date',
        'username',
        'address',
        'mobile',
        'tel',
        'con_pass'
    ];

    public function setPasswordAttribute($password){

        $this->attributes['password'] = Hash::make($password);

    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function position() {
        return $this->belongsTo('\App\Position', 'position_id', 'id');
    }

    public function records()
    {
        return $this->hasMany("\App\Records", "user_id", "id");
    }

}
