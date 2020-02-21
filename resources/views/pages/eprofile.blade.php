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
<form action="{{action('UsersController@update', $userData->id)}}" method="post" class='div1'>
    @method('POST')

    {{ csrf_field() }}

            <input type='hidden' placeholder='id' name='userId' id='id' value=''>
            <label style='padding-left: 247px' for="username">Username:</label>
            <input type='text' placeholder='Edit your Username' id='username'  name='username' pattern='[a-z]{2,}'  style='width: 20%' value='{{$userData->username}}' disabled/>
            <label style='margin-left: 177px' for="email_add">E-mail:</label>
            <input type='email' placeholder='Put your Email'   name='email_add' id='email_add' style='width: 20%' value='{{ $userData->email_add}}' disabled/>
            <br><br>
            <label style='padding-left: 243px' for="fname">First Name:</label>
            <input type='text' placeholder='Put your First Name' id='first_name'   name='first_name' style='width: 20%' value='{{$userData->first_name}}' disabled/>
            <label style='margin-left: 152px' for="password">Password:</label>
            <input type='password' placeholder='Update your Password'  name='password' id='password' style='width: 20%'  value='{{$userData->password}}' disabled />
            <br><br>
            <label style='margin-left: 230px' for="mid_name">Middle Name:</label>
            <input type='text' placeholder='Put your Middle Name' id='mid_name'  name='middle_name'   style='width: 20%' value='{{$userData->middle_name}}' disabled/>
            <label style='margin-left: 87px' for="con_pass">Confirm Password:</label>
            <input type='password' placeholder='Re-type your New Password'  name='con_pass' id='con_pass' style='width: 20%' value='{{$userData->con_pass}}' disabled/>
            <br><br>
            <label style='padding-left: 248px' for="last_name">Last Name:</label>
            <input type='text' placeholder='Edit your Last name' id='last_name'  name='last_name'  style='width: 20%' value='{{$userData->last_name}}' disabled/>
            <label style='margin-left: 105px' for="mobile">Contact Number:</label>
            <input type='tel' placeholder='Please put your number'  name='mobile' id='mobile' style='width: 20%' value='{{$userData->mobile}}' maxlength='11' disabled/>
            <br><br>
            <label style='padding-left: 262px' for="birth_date">Birthday:</label>
            <input type='date' placeholder='Select Birthdate' id='birth_date'  name='birth_date' style='width:20%' value='{{$userData->birth_date}}' disabled/>
            <label style='margin-left: 82px' for="numb2">Emergency Number:</label>
            <input type='tel' placeholder='Please put a Emergency Number'  name='numb2' id='numb2' style='width: 20%;' value='{{$userData->numb2}}' maxlength='11' disabled/>
            <br><br>
            <label style='padding-left: 268px' for="address">Address:</label>
            <input type='text' placeholder='Street/Block/Subdv No.' id='address'  name='address'   style='width: 20%' value='{{$userData->address}}' disabled/>
            <label style="margin-left: 165px" for='posit'> Position: </label>

    <select name="position" id="position" disabled>

        @foreach($positions as $position)
            <option value="{{ $position->id }}" {{ $position->id == $userData->position_id ? 'selected' : '' }}>{{ $position->name }}</option>
        @endforeach

    </select>
                <button class='edit' type="submit" onclick='return activateFields()' id='editButton' value='2'> EDIT </button>

                <script type='text/javascript'>
                    let editable = false;

                     let originalValues = {
                            username: '{{ $userData->username  }}',
                            fname: '{{ $userData->first_name }}',
                            mid_name: '{{$userData->middle_name}}',
                            last_name: '{{$userData->last_name}}',
                            birth_date: '{{$userData->birth_date}}',
                            address: '{{$userData->address}}',
                            password: '{{$userData->password}}',
                            email_add: '{{ $userData->email_add}}',
                            mobile: '{{$userData->mobile}}',
                            con_pass: '{{$userData->con_pass}}',
                            numb2: '$numb2',
                        };

                    function activateFields() {

                        let textFields = [
                            'username',
                            'first_name',
                            'mid_name',
                            'last_name',
                            'birth_date',
                            'address',
                            'password',
                            'email_add',
                            'mobile',
                            'numb2',
                            'con_pass'

                        ];

                        if(editable) {
                            if(!confirm('Are you sure you want to update this data?')) {
                                let password = document.getElementById('password').value;
                                let confirmPassword = document.getElementById('con_pass').value;
                                if (password !== confirmPassword) {
                                    alert('password do not match');
                                    return originalValues;
                                }
                                textFields.forEach(textField => {
                                    document.getElementById(textField).value = originalValues[textField];
                                });
                                return false;
                            }
                            return true;
                        } else {
                                textFields.forEach(textField => {
                                    document.getElementById(textField).disabled= false;
                                });
                            document.getElementById('position').disabled = false;
                            document.getElementById('editButton').innerHTML = 'Update';
                            editable = true;
                            return false;
                        }
                    }
             </script>

    <button class='cncl' type='reset' value='CANCEL' id='cancel' onclick="window.location.reload()"> Cancel </button>



</form>
</div>


