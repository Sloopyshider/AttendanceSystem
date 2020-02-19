
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

        @foreach($Display as $row)
        <tr>
        <th width="50px">{{ $row['Date1']}}</th>
        <th width="50px">{{$row['Day']}}</th>
        <th width="50px">{{$row['Time_In']}}</th>
        <th width="50px">{{$row['Time_Out']}}</th>
        <th width="50px">{{$row['Status']}}</th>
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
@php $datetoday1 = date("M. d, Y"); @endphp
@php $tib = "<button class='timein' name=\"Timein\" type=\"submit\" onclick=\"btn()\"> Time In </button>";  @endphp
@php $tob = "<button class=\"timeout\" name=\"Timeout\" type=\"submit\" onclick=\"btn()\"> Time Out </button>";  @endphp
@php $date = $row['Date1'] @endphp


<form action="{{action('TimeIn@store' )}}" method="POST">
    @csrf
@if ($date == $datetoday1 )
        <p> You have TIME IN today</p>

    @elseif($date != null)
        <div style="font-size:1.5em">
           @php echo $tib @endphp
        </div>
        <br>
@else ()
        <p> You have TIME IN today</p>
    @endif

</form>


<form action="submit" method="POST">
    @csrf

@if ($row['Date1'] != $datetoday1)



    @elseif( $row['Time_Out'] != null)
        <p> You have TIME OUT today</p>


    @elseif ($row['Time_In'] > null)
        @php echo $tob @endphp


            @endif
</form>


</body>
