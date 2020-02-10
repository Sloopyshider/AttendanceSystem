

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

<table class="tbl-qa">
    <tr>
        <th style="width: 150px;">
            Date</th>
        <th style="width: 150px; height: 40px">Day of the Week</th>
        <th style="width: 150px;">Time in</th>
        <th style="width: 150px;">Time out</th>
        <th style="width: 150px;">Total</th>
        <th style="width: 150px;">Status</th>

    </tr>
    <tr>
        <th style="width: 150px; height: 40px"></th>
        <th style="width: 150px;"></th>
        <th style="width: 150px;"></th>
        <th style="width: 150px;"></th>
        <th style="width: 150px;"></th>
        <th style="width: 150px;"></th>

    </tr>
</table>

