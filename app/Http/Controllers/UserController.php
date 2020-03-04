<?php

namespace App\Http\Controllers;

use App\Position;
use App\Records;
use App\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Redirect,Response;


class UserController extends Controller {

    public function index() {

        $user = Auth::user()->id;
        $rec = Records::WEEK_DAYS;

        $period = CarbonPeriod::create(Carbon::now()->firstOfMonth(), Carbon::now()->lastOfMonth());

        $days = [];

        foreach ($period->toArray() as $day) {
            if(!$day->isWeekend()) $days[] = $day;
        }
        $weeks = [];
        $weekDays = [];

        foreach ($days as $day) {
            $weekDays[$day->dayOfWeek] = $day;
            if($day->dayOfWeek == 5) {
                $weeks[] = $weekDays ;
                $weekDays = [];

            }
        }

        $try =  Records::all("Date");

//        $h = [];
//
//
//
//
//
//            foreach ($try as $try1) {
//                $h[] = $try1->Date;
//            }
//
//
//        $g = $day->dayOfWeek;
        $data['weeks'] = $weeks;
//        dd($day->format('d M Y') , $weeks  );

        if ($rec[2] == $day->format('l') ){
            echo "TRUE";
        }

        else
        {
            echo "false";
        }
//        dd($try,$day->format('l'),$rec['2']);



//        return view('pages.records.index')->with($data)->with('rec',$rec)->with('h',$h);
          return view('pages.records.index')->with('rec',$rec)->with($data);
    }

}
