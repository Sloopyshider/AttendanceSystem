@include('layouts/navbar')


<div class='div1'>
    <div class='border'></div>
    <form action='eprofile.php' method='post' class='div1'>



        <input type='hidden' placeholder='id' name='id' id='id' value='$userId'>

        <label style='padding-left: 250px'>Username:</label><input type='text' placeholder='Edit your Username' id='username' readonly name='username' pattern='[a-z]{2,}'  style='width: 20%' value='$userName'/>
        <label style='margin-left: 170px'>E-mail:</label><input type='email' placeholder='Put your Email'  readonly name='email_add' id='email_add' style='width: 20%' value='$email_add'/>
        <br><br>
        <label style='padding-left: 243px'>First Name:</label><input type='text' placeholder='Put your First Name' id='fname'  readonly name='fname' style='width: 20%' value='$firstname'/>
        <label style='margin-left: 152px'>Password:</label><input type='password' placeholder='Update your Password' readonly name='pass' id='pass' style='width: 20%'/>
        <br><br>
        <label style='margin-left: 230px'>Middle Name:</label><input type='text' placeholder='Put your Middle Name' id='mid_name' readonly name='mid_name'   style='width: 20%' value='$mid_name'/>
        <label style='margin-left: 90px'>Confirm Password:</label><input type='password' placeholder='Re-type your New Password' readonly name='con_pass' id='con_pass' style='width: 20%'/>
        <br><br>
        <label style='padding-left: 248px'>Last Name:</label><input type='text' placeholder='Edit your Last name' id='last_name' readonly name='last_name'  style='width: 20%' value='$last_name'/>
        <label style='margin-left: 105px'>Contact Number:</label><input type='tel' placeholder='Please put your number' readonly name='numb' id='numb' style='width: 20%' value='$numb' maxlength='11'/>
        <br><br>
        <label style='padding-left: 262px'>Birthday:</label><input type='date' placeholder='Select Birthdate' id='bday' readonly name='bday' style='width:20%' value='$bday'/>
        <label style='margin-left: 82px'>Emergency Number:</label></label><input type='tel' placeholder='Please put a Emergency Number' readonly name='numb2' id='numb2' style='width: 20%;' value='$numb2' maxlength='11'/>
        <br><br>
        <label style='padding-left: 268px'>Address:</label><input type='text' placeholder='Street/Block/Subdv No.' id='address' readonly name='address'   style='width: 20%' value='$address'/>
