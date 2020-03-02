@include('layouts.navbar')

@if ($errors->any())
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <script>alert("{{ $error }}")</script>
            @endforeach
    </div>
@endif

    @if(session('success'))
        <div>
            <script>alert("Your Data is Updated")</script>
        </div>
    @endif

<div class='div1'>

<div class='border'> </div>
<form action="{{action('UsersController@update', $userData->id)}}" method="post" class='div1'>
    @method('POST')

    {{ csrf_field() }}

            <input type='hidden' placeholder='id' name='userId' id='id' value=''>
            <label style='padding-left: 247px' for="username">Username:</label>
            <input type='text' placeholder='Edit your Username' id='username'  name='username' pattern='[a-zA-Z][a-zA-Z0-9-_.]{1,20}'  style='width: 20%' value='{{$userData->username}}' disabled/>
            <label style='margin-left: 177px' for="email">E-mail:</label>
            <input type='email' placeholder='Put your Email'   name='email' id='email' style='width: 20%' value='{{ $userData->email}}' disabled/>
            <br><br>
            <label style='padding-left: 243px' for="first_name">First Name:</label>
            <input type='text' placeholder='Put your First Name' id='first_name'   name='first_name' style='width: 20%'  value='{{$userData->first_name}}' disabled/>
            <label style='margin-left: 152px' for="password">Password:</label>
            <input type='password' placeholder='Update your Password'  name='password' id='password' style='width: 20%' pattern='[a-zA-Z][a-zA-Z0-9-_.]{1,20}'  hidden='{{$userData->password}}' disabled />
            <br><br>
            <label style='margin-left: 230px' for="middle_name">Middle Name:</label>
            <input type='text' placeholder='Put your Middle Name' id='middle_name'  name='middle_name'   style='width: 20%' pattern='[a-zA-Z][a-zA-Z0-9-_.]{1,20}' value='{{$userData->middle_name}}' disabled/>
            <label style='margin-left: 87px' for="password_confirmation">Confirm Password:</label>
            <input type='password' placeholder='Re-type your New Password'  name='password_confirmation' id='password_confirmation' pattern='[a-zA-Z][a-zA-Z0-9-_.]{1,20}' style='width: 20%' value='{{$userData->password_confirmation}}' disabled/>
            <br><br>
            <label style='padding-left: 248px' for="last_name">Last Name:</label>
            <input type='text' placeholder='Edit your Last name' id='last_name'  name='last_name'  style='width: 20%' pattern='[a-zA-Z][a-zA-Z0-9-_.]{1,20}' value='{{$userData->last_name}}' disabled/>
            <label style='margin-left: 115px' for="mobile">Mobile Number:</label>
            <input type='tel' placeholder='Please put your number'  name='mobile' id='mobile' style='width: 20%' value='{{$userData->mobile}}' disabled/>
            <br><br>
            <label style='padding-left: 262px' for="birth_date">Birthday:</label>
            <input type='date' placeholder='Select Birthdate' id='birth_date'  name='birth_date' style='width:20%' value='{{$userData->birth_date}}' disabled/>
            <label style='margin-left: 155px' for="tel">Telephone:</label>
            <input type='tel' placeholder='Please put a Emergency Number'  name='tel' id='tel' style='width: 20%;' value='{{$userData->tel}}' disabled/>
            <br><br>
            <label style='padding-left: 263px' for="address">Address:</label>
            <input type='text' placeholder='Street/Block/Subdv No.' id='address'  name='address'   style='width: 20%' value='{{$userData->address}}' disabled/>
            <label style="margin-left: 173px" for='posit'> Position: </label>

    <select name="position" id="position" disabled>

        @foreach($positions as $position)
            <option value="{{ $position->id }}" {{ $position->id == $userData->position_id ? 'selected' : '' }}>{{ $position->name }}</option>
        @endforeach

    </select>

                <button class='edit' type="submit" onclick='return activateFields()' id='editButton' value='2'> EDIT </button>

                <button class='cncl' type='reset' value='CANCEL' id='cancel' onclick="window.location.reload()" hidden> Cancel </button>



                <script type='text/javascript'>
                    let editable = false;

                     let originalValues = {
                            username: '{{ $userData->username  }}',
                            first_name: '{{ $userData->first_name }}',
                            middle_name: '{{$userData->middle_name}}',
                            last_name: '{{$userData->last_name}}',
                            birth_date: '{{$userData->birth_date}}',
                            address: '{{$userData->address}}',
                            password: '{{$userData->password}}',
                             email: '{{ $userData->email}}',
                            mobile: '{{$userData->mobile}}',
                             password_confirmation: '{{$userData->password_confirmation}}',
                            tel: '{{$userData->tel}}',
                        };

                    function activateFields() {

                        let textFields = [
                            'username',
                            'first_name',
                            'middle_name',
                            'last_name',
                            'birth_date',
                            'address',
                            'password',
                            'email',
                            'mobile',
                            'tel',
                            'password_confirmation'
                        ];



                        if(editable) {
                            if(!confirm('Are you sure you want to update this data?')) {
                                {
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
                            document.getElementById('cancel').hidden = false;
                            document.getElementById('position').disabled = false;
                            document.getElementById('editButton').innerHTML = 'Save Update';
                            editable = true;
                            return false;
                        }
                    }
             </script>


</form>
</div>


