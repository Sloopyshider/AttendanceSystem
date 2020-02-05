@extends('layouts/header')

@section('content')
    <link rel="stylesheet" href="{{ asset('/bootstrap/login_design.css') }}">
    <form action="{{ url('/login') }}" method="POST">

    {{ csrf_field() }}

        <div class="login-form">
            <div class="form-header">
                <div class="user-logo">
                    <img src="https://www.pngrepo.com/download/213506/boss-man.png" alt="User"/>
                </div>
                <div class="title">Login</div>
            </div>
                <div class="form-container">
                    <div class="form-element">
                        <label class="fa fa-user" for="login-username"></label>
                        <input  id="name" placeholder="Username" type="text" name="username" required minlength="3" maxlength="15" size="10">
                    </div>
                    <div class="form-element">
                        <label class="fa fa-key" for="login-password"></label>
                        <input  id="password" placeholder="Password" type="password" name="password" required>
                    </div>
                    <div class="form-element">
                        <input type="submit" value="LOGIN" class="login">
                    </div>
                </div>
               </div>


</form>



@endsection