<?php

namespace App\Http\Controllers;

use App\Records;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = [];

        $data = [];

        $period = CarbonPeriod::create(Carbon::now()->firstOfMonth(), Carbon::now()->lastOfMonth());

        $days = [];

        foreach ($period->toArray() as $day) {
            if(!$day->isWeekend()) $days[] = $day;
        }

//        $data['days'] = $days;

//        $dayOfWeeks =

        $weeks = [];
            $weekDays = [];
            foreach ($days as $day) {
                $weekDays[$day->dayOfWeek] = $day;
                if($day->dayOfWeek == 5) {
                    $weeks[] = $weekDays;
                    $weekDays = [];
                }
            }
        $data['weeks'] = $weeks;



        return view('pages/records/index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Records  $records
     * @return \Illuminate\Http\Response
     */
    public function show(Records $records)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Records  $records
     * @return \Illuminate\Http\Response
     */
    public function edit(Records $records)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Records  $records
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Records $records)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Records  $records
     * @return \Illuminate\Http\Response
     */
    public function destroy(Records $records)
    {
        //
    }
}
