<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{asset('assets/admin/img/favIcon.png')}}" />
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootadmin.min.css')}}">

    {{--toastr--}}
    <script src=" {{asset('assets/admin/js/jquery.min.js')}}"></script>
    <link href="{{asset('assets/admin/css/toastr.css')}}" rel="stylesheet"/>
    <script src="{{asset('assets/admin/js/toastr.js')}}"></script>

    <title>Login | Bus Ticket</title>
</head>
<body class="" style="background: #2C3136;">

<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-4">
            <h1 class="text-center text-light mb-4">Bus Ticket</h1>
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{route('admin.dashboard')}}">
                        @method('get')
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" name="userName" class="form-control form-control-lg" placeholder="Username" >
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" >
                        </div>

                        {{--                        <div class="form-check mb-3">--}}
                        {{--                            <label class="form-check-label">--}}
                        {{--                                <input type="checkbox" name="remember" class="form-check-input">--}}
                        {{--                                Remember Me--}}
                        {{--                            </label>--}}
                        {{--                        </div>--}}

                        <div class="row">
                            <div class="col pr-2">
                                <button type="submit" class="btn btn-block btn-primary">Login</button>
                            </div>
                            <div class="col pl-2">
                                <a class="btn btn-block btn-link" href="#" data-toggle="modal"
                                   data-target="#forgetPass">Forgot Password</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create category Modal -->



{{--toastr--}}
<script>
    @if(Session()->has('success'))

    toastr.success("{{Session('success')}}");
    @endif

    @if(Session()->has('warning'))

    toastr.warning("{{Session('warning')}}");
    @endif

    @if(Session()->has('errors'))
    @foreach($errors->all() as $error)
    toastr.error("{{$error}}");
    @endforeach
    @endif
</script>

<script src=" {{asset('assets/admin/js/bootstrap.bundle.min.js')}}"></script>
<script src=" {{asset('assets/admin/js/moment.min.js')}}"></script>
<script src=" {{asset('assets/admin/js/fullcalendar.min.js')}}"></script>
<script src=" {{asset('assets/admin/js/bootadmin.min.js')}}"></script>

</body>
</html>
