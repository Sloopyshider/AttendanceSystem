<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('/bootstrap/jquery/jquery-3.4.1.slim.min.js') }}"></script>
    <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>



    @if(\Illuminate\Support\Facades\Auth::user())
        <div class="head1">
            <meta name="viewport" content="width=device-width, initial-scale=0, user-scalable=no">
        </div>

    @endif


{{--    <title>Attendance Elite</title>--}}
</head>
<body>

@if($errors->any())

    @foreach($errors->all() as $error)
        <div class="row mt-2">
            <div class="col-sm-6 offset-3">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>

    @endforeach


@endif



</body>
</html>
