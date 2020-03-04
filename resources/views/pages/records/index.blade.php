@extends('layouts/header')

@section('content')

    <div class="w-25"></div>
    <div class="w-75 float-right">

        <table class="table table-hover table-responsive table-bordered table table-full-width">
            <thead>



            <tr>
                <th class="wide-cell">Monday</th>
                <th class="wide-cell">Tuesday</th>
                <th class="wide-cell">Wednesday</th>
                <th class="wide-cell">Thursday</th>
                <th class="wide-cell">Friday</th>
            </tr>
            </thead>
            <tbody>
            @foreach($weeks as $week)
                <tr>
                    @foreach($week as $day)
                        <td class="wide-cell">{{ $day->format('d M Y') }}</td>
                    @endforeach
                </tr>
            @endforeach
            <tr>
                @foreach($rec as $days)
                    <td class="wide-cell">{{ $days }}</td>

                @endforeach
            </tr>
            </tbody>
        </table>
    </div>




@endsection
