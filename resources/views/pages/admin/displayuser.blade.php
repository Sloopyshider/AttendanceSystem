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
    <br><br>
    <center><a href="{{route('displayuser.create')}}"><button>Add USER</button></a> </center>
    <div class='border'> </div>
    <table class="table-light" style="margin-left: 300px; margin-top: 100px; background: #5ff7ca">

        <thead>
        <tr>
            <td style="width: 60px">ID</td>
            <td style="width: 150px">Name</td>
            <td style="width: 10px">Email</td>
            <td style="width: 150px">Job Title</td>
            <td style="width: 150px">City</td>
            <td style="width: 200px">Country</td>
            <td colspan = 2 style="width: 400px">Actions</td>
        </tr>
        </thead>
        <tr>
        @foreach($userData as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->first_name}} , {{$data->last_name}}</td>
                <td>{{$data->position->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->birth_date}}</td>
                <td>{{$data->email}}</td>
                <td style="height: 90px"> <a href="{{ route('displayuser.create')}}" class="btn btn-primary">Edit</a>
                </td>
                <td style="width: 100px">
                    <form action="{{ route('displayuser.destroy', $data->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tr>
    </table>
</div>


