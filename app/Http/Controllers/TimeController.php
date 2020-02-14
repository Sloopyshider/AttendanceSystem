<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;
use App\Records;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class TimeController extends Controller
{
    public function index()
    {
        /*Make a non value var*/
        $display = [];
        $colin = "";
        $colout = "";
        $status = "";

//        $sta = Records::all();

        $users = Auth::user()->id;
        $user1 = Records::all()->where('user_id',$users);


            /*Get all columns*/
        foreach ($user1 as $user) {
            $coldate = $user->Date;
            $colin = $user->Time_In;
            $colout = $user->Time_Out;


            /*Get Date*/
            $date = date('M. d, Y', strtotime($coldate));
            $dates = \Carbon\Carbon::parse($coldate)->format('M. d, Y');
            $dayOfTheWeek = date('l', strtotime($date));



            //** /*Get Time Difference*/ /*Can be added to Record Module*/
//        $start  = new Carbon($colin);
//        $end    = new Carbon($colout);
//        $total = $start->diff($end)->format('%H hrs');
            /*Null Total if no Time Out have no Value*/
            //        if($colout == null)
            //        {
            //            $total= null;
            //        }
            //        else{
            //            $total = $total;
            //        } **//

            /*Status*/
            $pres = "Present";
            $late1 = "Late";

            $late = strtotime('9:15:01 am');
            $sta = strtotime($colin);

            if ($late <= $sta) {
                $status = $late1;
            } else {
                $status = $pres;
            }



            /*Convert it to array*/
            $display[] = [
                'Date1' => $dates,
                'Day' => $dayOfTheWeek,
                'Time_In' => $colin,
                'Time_Out' => $colout,
                'Status' => $status
            ];
        }
//        dd($display->Day);

        return view('pages\intime',["Display" => $display]);

    }

//    public function intimes(Request $request){
//        date_default_timezone_set('Asia/Manila');
//        $time = date("H:i:s");
//        $time1 = date("Y-m-d");
//        $id = Auth::user()->id;
//        $timeout = null;
//
//        $posts = DB::UPDATE ('INSERT INTO records(user_id,Time_In,Time_Out,Date) VALUE(?,?,?,?)',[$id,$time,$timeout, $time1]);
//        return view('pages\intime');
//
//    }

    public function timeout(Request $request){
        date_default_timezone_set('Asia/Manila');
        $timeout = date("H:i:s");
        $time1 = date("Y-m-d");
        $id = Auth::user()->id;


        $posts = DB::UPDATE('UPDATE records SET Time_Out = current_time where Date = current_date and Time_Out is null');

//        $users = Auth::user()->id;
//        $user1 = DB::select('Select * from records where user_id ='.$users);

        return redirect('intime');
    }
}
