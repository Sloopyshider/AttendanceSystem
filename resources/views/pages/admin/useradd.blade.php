@include('layouts.navbar')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<hr>
<div class='div1'>

    <div class='border'> </div>
    <a href="{{url('displayuser')}}"><button class='edit' style="margin-left: 470px"> Go back to view  </button> </a>
<form method="post" class='div1' action="{{ route('displayuser.store') }}">


    {{ csrf_field() }}
<br>
    <br>    <h1><center> ADD USER</center> </h1>
    <br>
    <br>

    <input type='hidden' placeholder='id' name='userId' id='id' value=''>
    <label style='padding-left: 247px' for="username">Username:</label>
    <input type='text' placeholder='Username' id='username'  name='username' pattern='[a-z]{2,}'  style='width: 20%' value='' />
    <label style='margin-left: 177px' for="email_add">E-mail:</label>
    <input type='email' placeholder='Email'   name='email_add' id='email_add' style='width: 20%' value='' />
    <br><br>
    <label style='padding-left: 243px' for="fname">First Name:</label>
    <input type='text' placeholder='First Name' id='first_name'   name='first_name' style='width: 20%' value='' />
 <br><br>

    <label style='margin-left: 230px' for="mid_name">Middle Name:</label>
    <input type='text' placeholder='Middle Name' id='mid_name'  name='middle_name'   style='width: 20%' value='' /><br><br>
    <label style='padding-left: 248px' for="last_name">Last Name:</label>
    <input type='text' placeholder='Last name' id='last_name'  name='last_name'  style='width: 20%' value='' />
  <br><br>
    <label style='padding-left: 262px' for="birth_date">Birthday:</label>
    <input type='date' placeholder='Select Birthdate' id='birth_date'  name='birth_date' style='width:20%' value='' />
  <br><br>
    <label style='margin-left: 250px' for="password">Password:</label>
    <input type='password' placeholder='Create Password'  name='password' id='password' style='width: 20%' pattern='[a-zA-Z][a-zA-Z0-9-_.]{1,20}' />
    <label style="margin-left: 173px" for='posit'> Position: </label>

    <button class='edit' type="submit" id='editButton' value='2'> ADD </button>

    <select name="position" id="position" >
    @foreach($pos as $hello)
           <option value="{{ $hello->id }}"> <p>{{$hello->name}}</p></option>
    @endforeach

</form>
</div>


