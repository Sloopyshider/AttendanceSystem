

@include('layouts.navbar')

<head>

    <meta charset="UTF-8">
    <script src="{{ asset('/bootstrap/js/main.js') }}"></script>

    <style>


        .tbl-qa{width: 100%;background-color: #f5f5f5;}
        .tbl-qa th.table-header {padding: 5px;text-align: left;padding:10px;}
        .tbl-qa .table-row td {padding:5px;background-color: #48BF91;vertical-align:top;}



    </style>
<body>
<hr>
<br>

<table class="tbl-qa" style="font-family: Open Sans, Raleway, sans-serif;font-size: 16px;">
    <tr>
        <th style="width: 50px;">
            Date</th>
        <th style="width: 50px; height: 40px">Day of the Week</th>
        <th style="width: 50px;">Time in <br>(HH:MM:SS)</th>
        <th style="width: 50px;">Time out<br>(HH:MM:SS)</th>
        <th style="width: 50px;">Total</th>
        <th style="width: 50px;">Status</th>

    </tr>
    @foreach($Records as $disRecord)
    <tr>
        <th style="width: 50px; height: 50px">{{ $disRecord['Date1']}}</th>
        <th style="width: 50px;">{{ $disRecord['Day']}}</th>
        <th style="width: 50px;">{{ $disRecord['Time_In']}}</th>
        <th style="width: 50px;">{{ $disRecord['Time_Out']}}</th>
        <th style="width: 50px;">{{ $disRecord['Total']}}</th>
        <th style="width: 50px;">{{ $disRecord['Status']}}</th>
        @php $oa =  $disRecord['Total'] +   $disRecord['Total']; echo $oa @endphp
    @endforeach

        @php $oa =  $disRecord['Total'] +   $disRecord['Total']; echo $oa @endphp


    </tr>
</table>

