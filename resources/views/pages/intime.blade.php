
@include('layouts.navbar')

<head>

    <meta charset="UTF-8">
    <script src="{{ asset('/bootstrap/js/main.js') }}"></script>
    <style>
        .timein {
            background-color:#34ce57;
            border-radius:28px;
            border:1px solid #003300;
            display:inline-block;
            cursor:pointer;
            color:black;
            font-family:SansSerif;
            font-size:25px;
            padding:16px 31px;
            text-decoration:none;
            text-shadow:0px 1px 0px #2f6627;
        }
        .timeout {
            background-color:#ff0000;
            border-radius:28px;
            border:1px solid #000000;
            display:inline-block;
            cursor:pointer;
            color:#ffffff;
            font-family:SansSerif;
            font-size:23px;
            padding:16px 31px;
            text-decoration:none;
            text-shadow:0px 1px 0px #2f6627;
        }
    </style>
    <script>
        function inbtn() {
            var retVal = confirm("Do you want to TIME IN ?");
            if( retVal == true ) {

                return true;
            } else {
                return false;
            }
        }

        function outbtn() {
            var retVal = confirm("Do you want to TIME OUT ?");
            if( retVal == true ) {

                return true;
            } else {
                return false;
            }
        }
    </script>


<body>
<hr>

<h1> </h1>

<table class="table1">
    <tr>
        <th>Date</th>
        <th width="50px">Day of the Week</th>
        <th width="50px">Time in</th>
        <th width="50px">Time out</th>
        <th width="50px">Status</th>

    </tr>

        @foreach($Display as $errors)
        <tr>
        <th width="50px">{{ $errors['Date1']}}</th>
        <th width="50px">{{$errors['Day']}}</th>
        <th width="50px">{{$errors['Time_In']}}</th>
        <th width="50px">{{$errors['Time_Out']}}</th>
        <th width="50px">{{$errors['Status']}}</th>
        </tr>
    @endforeach




</table>

<div style="margin-top: 200px;margin-left: -80px">
<label class="clock">
    <span id="hr">00</span>
    <span> : </span>
    <span id="min">00</span>
    <span> : </span>
    <span id="sec">00</span>
</label>
</div>


<BR>
@php $datetoday1 = date("Y-m-d"); @endphp




@if ($errors['Time_Out'] != null )
    <form action="{{action('TimeIn@store' )}}" method="POST">
        @csrf

        <div style="font-size:1.5em">
             <button href="" class="timein" name="timein" style="margin-left: 73px" type="submit" onclick="return inbtn()">TIME IN</button>

        </div>
        <br>

@else ()



            <form action="submit" method="POST">

                @csrf

                <button href="" class="timeout" style="margin-left: 75px" onclick="return outbtn()">TIME OUT</button>
            </form>
            @endif


</form>


</body>
