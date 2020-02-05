@extends('layouts/header')

@section('content')
<form action="{{ url('/login') }}" method="POST">

    {{ csrf_field() }}
    <input type="submit" value="LOGIN">

    <div class="card">
        <div class="card-body">
            <div class="form-row">
                <div class="col-sm-4">Username:</div>
                <div class="col-sm-4">
                    <input type="text" name="username" id="username" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-4">Password:</div>
                <div class="col-sm-4">
                    <input type="text" name="password" id="password" class="form-control">
                </div>
            </div>
        </div>

        <div class="card-footer">
            <input type="submit" value="LOGIN" class="btn btn-block btn-outline-primary">
        </div>

    </div>

</form>

@endsection