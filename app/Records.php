<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Records extends Model
{
//    protected $table = 'records';

    const WEEK_DAYS = [
        '1' => 'Monday',
        '2' => 'Tuesday',
        '3' => 'Wednesday',
        '4' => 'Thursday',
        '5' => 'Friday',
        '6' => 'Saturday',
        '7' => 'Sunday',
    ];
    public function user() {
        return $this->belongsTo('\App\User', 'user_id', 'id');
    }
    //
}
