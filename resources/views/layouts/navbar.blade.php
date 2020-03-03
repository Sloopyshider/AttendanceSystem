
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <link rel="stylesheet" href="{{ asset('/bootstrap/main.css') }}">
            <link rel="stylesheet" href="{{ asset('/bootstrap/admin.css') }}">

            <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
        </head>

<hr>
        <body>


        <div class="head1">

            <meta name="viewport" content="width=device-width, initial-scale=0, user-scalable=no">
            <a href= {{url('intime')}}>
            <img class="img1" src='{{ asset('/companylogogreen.jpg') }}' alt=""> </a>
            <a href= {{url('eprofile')}}>
            <img src="avatar1.jpg" width="60px"  height="60px" style="margin-left: 40%; cursor: pointer; display: inline-grid"> </a>




 <label class="employeename">


        <label style="margin-left: 20px; font-size: 17px">


            Hello: <font style="font-family: Open Sans, Raleway, sans-serif"> {{ Auth::user()->first_name }}

          </font>
            <br>
            <label style="margin-left: 20px; font-size: 17px">
                Last Name:  <font style="font-family: Open Sans, Raleway, sans-serif"> {{ Auth::user()->last_name }}</font>
            <br>
                <label style="margin-left: 20px; font-size: 17px">
                    Position: <font style="font-family: Open Sans, Raleway, sans-serif">{{ Auth::user()->position->name}} </font>

        </label>



            <div class="dropdown">
                <img src="down4.jpg" width="25px" height="20px" onclick="myFunction()" class="dropbtn">
                <div id="myDropdown" class="dropdown-content">
                    <a href="{{url('intime')}}">Attendance</a>
                    <a href="{{url('record')}}">Record</a>
                    <a href="{{url('eprofile')}}">Employee Profile</a>
                    @if(Auth::user()->position->id == 1)
                        <a href="{{url('displayuser')}}">Add Employee</a>
                    @endif
                    <a href="{{url('logout')}}">Log out</a>


                </div>
            </div>


            <script>

                function myFunction() {
                    document.getElementById("myDropdown").classList.toggle("show");
                }

                window.onclick = function(event) {
                    if (!event.target.matches('.dropbtn')) {
                        let dropdowns = document.getElementsByClassName("dropdown-content");
                        let i;
                        for (i = 0; i < dropdowns.length; i++) {
                            let openDropdown = dropdowns[i];
                            if (openDropdown.classList.contains('show')) {
                                openDropdown.classList.remove('show');
                            }
                        }
                    }
                }
            </script>




            </label>
        </label>
        </label>
        </div>
        </body>
        <hr>
