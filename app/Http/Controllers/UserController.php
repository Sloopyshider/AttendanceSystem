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



//        $users = Auth::user()->id;
//        $user = User::find($users);
//        $hello = $user->records;
//        dd($hello);
//        exit();

//
//        foreach ($hello1 as $hi){
//            $rowdates = $hello1->Date;
//        }

//        $display = [];
//        $users = Auth::user()->id;
//
//        $user1 = Records::all()->where('user_id',$users);
//
//
//        /*Get all columns*/
//        foreach ($user1 as $user) {
//            $coldate = $user->Date;
//            $colin = $user->Time_In;
//            $colout = $user->Time_Out;
//
//
//            /*Get Date*/
//            $date = date('M. d, Y', strtotime($coldate));
//            $dates = \Carbon\Carbon::parse($coldate)->format('Y-m-d');
//            $dayOfTheWeek = date('l', strtotime($date));
//
//
//
//            //** /*Get Time Difference*/ /*Can be added to Record Module*/
////        $start  = new Carbon($colin);
////        $end    = new Carbon($colout);
////        $total = $start->diff($end)->format('%H hrs');
//
//            $pres = "Present";
//            $late1 = "Late";
//
//            $late = strtotime('9:15:01 am');
//            $sta = strtotime($colin);
//
//            if ($late <= $sta) {
//                $status = $late1;
//            } else {
//                $status = $pres;
//            }
//
//
//
//            /*Convert it to array*/
//            $display[] = [
//                'Date1' => $dates,
//                'Day' => $dayOfTheWeek,
//                'Time_In' => $colin,
//                'Time_Out' => $colout,
//                'Status' => $status
//            ];
//        }

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

        $data['weeks'] = $weeks;


        return view('trial')->with($data);
    }
}
