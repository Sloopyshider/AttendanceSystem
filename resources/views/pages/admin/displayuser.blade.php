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


<div>
    <button id="myBtn">Open Modal</button>
    <div id="myModal" class="modal">

        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Add User</h2>
            </div>
            <div class="modal-body">
                <div class='div1'>
                    <form action="" method="post" class='div1'>
                        @method('POST')

                        {{ csrf_field() }}

                        <input type='hidden' placeholder='id' name='userId' id='id' value=''>
                        <label style='padding-left: 100px' for="username">Username:</label>
                        <input type='text' placeholder='Edit your Username' id='username'  name='username' pattern='[a-zA-Z][a-zA-Z0-9-_.]{1,20}'  style='width: 20%' value='' />
                        <label style='margin-left: 177px' for="email">E-mail:</label>
                        <input type='email' placeholder='Put your Email'   name='email' id='email' style='width: 20%' value='' />
                        <br><br>
                        <label style='padding-left: 95px' for="first_name">First Name:</label>
                        <input type='text' placeholder='Put your First Name' id='first_name'   name='first_name' style='width: 20%'  value='' />
                        <label style='margin-left: 152px' for="password">Password:</label>
                        <input type='password' placeholder='Update your Password'  name='password' id='password' style='width: 20%' pattern='[a-zA-Z][a-zA-Z0-9-_.]{1,20}'  hidden=''  />
                        <br><br>
                        <label style='margin-left: 80px' for="middle_name">Middle Name:</label>
                        <input type='text' placeholder='Put your Middle Name' id='middle_name'  name='middle_name'   style='width: 20%' pattern='[a-zA-Z][a-zA-Z0-9-_.]{1,20}' value='' />
                        <label style='margin-left: 87px' for="password_confirmation">Confirm Password:</label>
                        <input type='password' placeholder='Re-type your New Password'  name='password_confirmation' id='password_confirmation' pattern='[a-zA-Z][a-zA-Z0-9-_.]{1,20}' style='width: 20%' value='' />
                        <br><br>
                        <label style='padding-left: 98px' for="last_name">Last Name:</label>
                        <input type='text' placeholder='Edit your Last name' id='last_name'  name='last_name'  style='width: 20%' pattern='[a-zA-Z][a-zA-Z0-9-_.]{1,20}' value='' />
                        <label style='margin-left: 115px' for="mobile">Mobile Number:</label>
                        <input type='tel' placeholder='Please put your number'  name='mobile' id='mobile' style='width: 20%' value='' />
                        <br><br>
                        <label style='padding-left: 114px' for="birth_date">Birthday:</label>
                        <input type='date' placeholder='Select Birthdate' id='birth_date'  name='birth_date' style='width:20%' value='' />
                        <label style='margin-left: 152px' for="tel">Telephone:</label>
                        <input type='tel' placeholder='Please put a Emergency Number'  name='tel' id='tel' style='width: 20%;' value='' />
                        <br><br>
                        <label style='padding-left: 115px' for="address">Address:</label>
                        <input type='text' placeholder='Street/Block/Subdv No.' id='address'  name='address'   style='width: 20%' value='' />
                        <label style="margin-left: 173px" for='posit'> Position: </label>

{{--                        <select name="position" id="position" disabled>--}}

{{--                            @foreach($positions as $position)--}}
{{--                                <option value="" {{ $position->id == $userData->position_id ? 'selected' : '' }}>{{ $position->name }}</option>--}}
{{--                            @endforeach--}}

{{--                        </select>--}}
{{--                <a style="margin-left: 50%" href="{{route('displayuser.create')}}"><button>Add USER</button></a>--}}
            </div>

        </div>

    </div>
    </div>

    <table style="margin-left: 300px; height: 20%; margin-top: 100px; background: #5ff7ca">
        <tr>
            <th style="width: 5%">ID</th>
            <th style="width: 15%">Name</th>
            <th style="width: 15%">Position</th>
            <th style="width: 15%">Email</th>
            <th style="width: 15%">Birthday</th>
            <th style="width: 15%">Mobile</th>
            <th style="width: 15%">Actions</th>
            <th style="width: 15%">Actions</th>
        </tr>


        @foreach($userData as $data)
            <tr>
                <th>{{$data->id}}</th>
                <th>{{$data->first_name}} , {{$data->last_name}}</th>
                <th>{{$data->position->name}}</th>
                <th>{{$data->email}}</th>
                <th>{{$data->birth_date}}</th>
                <th>{{$data->mobile  }}</th>
                <th style="height: 90px"> <a href="{{url('eprofile')}}" class="btn btn-primary">Edit</a>
                </th>
                <th style="height: 90px">
                    <form action="{{ route('displayuser.destroy', $data->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </th>
            </tr>
        @endforeach
    </table>
</div>



<script>

    let modal = document.getElementById("myModal");
    let btn = document.getElementById("myBtn");
    let span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        modal.style.display = "block";
    };
    span.onclick = function() {
        modal.style.display = "none";
    };
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

</script>


