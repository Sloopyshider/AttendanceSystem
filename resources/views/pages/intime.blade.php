
@include('layouts.navbar')

<head>

    <meta charset="UTF-8">
    <script src="{{ asset('/bootstrap/js/main.js') }}"></script>

<body>
<hr>



<table class="table1">
    <tr>
        <th>Date</th>
        <th width="50px">Day of the Week</th>
        <th width="50px">Time in</th>
        <th width="50px">Time out</th>
        <th width="50px">Total Hours</th>
        <th width="50px">Status</th>

    </tr>
</table>

<div style="margin-top: 300px;margin-left: -80px">
<label class="clock">
    <span id="hr">00</span>
    <span> : </span>
    <span id="min">00</span>
    <span> : </span>
    <span id="sec">00</span>
</label>
</div>