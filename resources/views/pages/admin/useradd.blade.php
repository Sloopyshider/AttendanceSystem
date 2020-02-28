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
<form method="post" class='div1'>


    {{ csrf_field() }}
<br>
    <br>    <h1><center> ADD USER</center> </h1>
    <br>
    <br>

    <input type='hidden' placeholder='id' name='userId' id='id' value=''>
    <label style='padding-left: 247px' for="username">Username:</label>
    <input type='text' placeholder='Username' id='username'  name='username' pattern='[a-z]{2,}'  style='width: 20%' value='' disabled/>
    <label style='margin-left: 177px' for="email_add">E-mail:</label>
    <input type='email' placeholder='Email'   name='email_add' id='email_add' style='width: 20%' value='' disabled/>
    <br><br>
    <label style='padding-left: 243px' for="fname">First Name:</label>
    <input type='text' placeholder='First Name' id='first_name'   name='first_name' style='width: 20%' value='' disabled/>
    <label style='margin-left: 152px' for="password">Password:</label>
    <input type='password' placeholder='Password'  name='password' id='password' style='width: 20%'  value='' disabled />
    <br><br>
    <label style='margin-left: 230px' for="mid_name">Middle Name:</label>
    <input type='text' placeholder='Middle Name' id='mid_name'  name='middle_name'   style='width: 20%' value='' disabled/>
    <label style='margin-left: 87px' for="con_pass">Confirm Password:</label>
    <input type='password' placeholder='Re-type your Password'  name='con_pass' id='con_pass' style='width: 20%' value='' disabled/>
    <br><br>
    <label style='padding-left: 248px' for="last_name">Last Name:</label>
    <input type='text' placeholder='Last name' id='last_name'  name='last_name'  style='width: 20%' value='' disabled/>
    <label style='margin-left: 105px' for="mobile">Contact Number:</label>
    <input type='tel' placeholder='Please put your number'  name='mobile' id='mobile' style='width: 20%' value='' maxlength='11' disabled/>
    <br><br>
    <label style='padding-left: 262px' for="birth_date">Birthday:</label>
    <input type='date' placeholder='Select Birthdate' id='birth_date'  name='birth_date' style='width:20%' value='' disabled/>
    <label style='margin-left: 82px' for="numb2">Emergency Number:</label>
    <input type='tel' placeholder='Please put a Emergency Number'  name='numb2' id='numb2' style='width: 20%;' value='' maxlength='11' disabled/>
    <br><br>
    <label style='padding-left: 268px' for="address">Address:</label>
    <input type='text' placeholder='Street/Block/Subdv No.' id='address'  name='address'   style='width: 20%' value='' disabled/>
    <label style="margin-left: 165px" for='posit'> Position: </label>


</form>
</div>


