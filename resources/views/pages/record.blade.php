

@include('layouts.navbar')

<head>

    <meta charset="UTF-8">
    <script src="{{ asset('/bootstrap/js/main.js') }}"></script>

    <style>


        .tbl-qa{width: 100%;font-size:0.9em;background-color: #f5f5f5;}
        .tbl-qa th.table-header {padding: 5px;text-align: left;padding:10px;}
        .tbl-qa .table-row td {padding:10px;background-color: #FDFDFD;vertical-align:top;}



    </style>
<body>
<hr>
<br>

<table class="tbl-qa" style="font-family: Courier;font-size: 30px;">
    <tr>
        <th style="width: 150px;">
            Date</th>
        <th style="width: 150px; height: 40px">Day of the Week</th>
        <th style="width: 150px;">Time in <br>(HH:MM:SS)</th>
        <th style="width: 150px;">Time out<br>(HH:MM:SS)</th>
        <th style="width: 150px;">Total</th>
        <th style="width: 150px;">Status</th>

    </tr>
    @foreach($Records as $disRecord)
    <tr>
        <th style="width: 150px; height: 40px">{{ $disRecord['Date1']}}</th>
        <th style="width: 150px;">{{ $disRecord['Day']}}</th>
        <th style="width: 150px;">{{ $disRecord['Time_In']}}</th>
        <th style="width: 150px;">{{ $disRecord['Time_Out']}}</th>
        <th style="width: 150px;">{{ $disRecord['Total']}}</th>
        <th style="width: 150px;">{{ $disRecord['Status']}}</th>
        @php $oa =  $disRecord['Total'] +   $disRecord['Total']; echo $oa @endphp
    @endforeach

        @php $oa =  $disRecord['Total'] +   $disRecord['Total']; echo $oa @endphp


    </tr>
</table>

