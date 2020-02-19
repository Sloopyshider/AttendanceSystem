<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id';

    protected $table = 'users';

    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'middle_name',
        'birth_date',
        'username'
    ];

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
//    public static function updateData($id, $userData){
//        DB::table('users')
//            ->where('id', $userData)
//            ->update($userData);
//    }




}
