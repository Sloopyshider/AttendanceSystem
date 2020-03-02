
@include('layouts.navbar')

<head>

    <meta charset="UTF-8">
    <script src="{{ asset('/bootstrap/js/main.js') }}"></script>
    <style>
        .timein {
            background-color:#34ce57;
            border-radius:3px;
            border:1px solid #003300;
            cursor:pointer;
            font-size: 16px;
            width: 10%;
            margin-left: 46%;

        }
        .timeout {
            background-color:#34ce57;
            border-radius:3px;
            border:1px solid #003300;
            cursor:pointer;
            font-size: 16px;
            width: 10%;
            margin-left: 46%;

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
<br>

<div class="indiBorder">
    <br>
<table class="table1">
    <label class="divtitle"> Weekly Time Sheet </label>
    <tr style="font-weight: bolder; color: white" >
        <th >Date</th>
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
</div>
<div class="indiright">
    <br>
    <label class="divtitle" style="top: 40%"> Summary Report Weekly </label>
    <br>
    <label class="labellates"> NUMBER OF LATES: </label>
    <br>
    <label class="labelpresent"> NUMBER OF PRESENTS: </label>
    <br>
    <label class="labelabsent"> NUMBER OF ABSENTS: </label>


</div>

<label class="clock">
    <span id="hr">00</span>
    <span> : </span>
    <span id="min">00</span>
    <span> : </span>
    <span id="sec">00</span>
</label>



@php $datetoday1 = date("M. d, Y"); @endphp
@php $tib = "<button class='timein' name=\"Timein\" type=\"submit\" onclick=\"btn()\"> Time In </button>";  @endphp
@php $tob = "<button class=\"timeout\" name=\"Timeout\" type=\"submit\" onclick=\"btn()\"> Time Out </button>";  @endphp
@php $date = $row ?? ''['Date1'] @endphp


<form action="{{action('TimeIn@store')}}" method="POST">
    @csrf
@if ($date == $datetoday1 )
        <p style="margin-left: 46%;"> You have TIME IN today</p>

    @elseif($date != null)
        <div style="font-size:1.5em">
           @php echo $tib @endphp
        </div>
        <br>
@else ()
        <p style="margin-left: 46%;> You have TIME IN today</p>
    @endif

</form>


<form action="submit" method="POST">
    @csrf

@if ($row ['Date1'] != $datetoday1)



    @elseif( $row ['Time_Out'] != null)
        <p style="margin-left: 45.5%;"> You have TIME OUT today</p>


    @elseif ($row['Time_In'] > null)
        @php echo $tob @endphp


            @endif

</form>


</body>
