<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Records extends Model
{
//    protected $table = 'records';

    public function user() {
        return $this->belongsTo('\App\User', 'user_id', 'id');
    }
    //
}
