<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{asset('assets/admin/img/favIcon.png')}}"/>
    <link rel="stylesheet" href="{{asset('assets/admin/css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootadmin.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/admin/dtablecss/jquery_dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/dtablecss/buttons_dataTables.min.css')}}">

    {{--customs css--}}
    <link rel="stylesheet" href="{{asset('assets/admin/css/customs.css')}}">

    {{--toastr--}}
    <script src=" {{asset('assets/admin/js/jquery.min.js')}}"></script>
    <link href="{{asset('assets/admin/css/toastr.css')}}" rel="stylesheet"/>
    <script src="{{asset('assets/admin/js/toastr.js')}}"></script>

    <!--Icofont CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/user/css/icofont.css')}}">

    <title>@yield('title')</title>
</head>
<body class="bg-light">

{{--nav--}}
@include('admin.includes.nav')

<div class="d-flex">
    {{--sidebar--}}
    @include('admin.includes.sidebar')


    <div class="content p-4">

        {{--toastr--}}
        <script>
            @if(Session()->has('success'))

            toastr.success("{{Session('success')}}")
            @endif

            @if(Session()->has('warning'))

            toastr.warning("{{Session('warning')}}")
            @endif

            @if(Session()->has('errors'))
            @foreach($errors->all() as $error)
            toastr.error("{{$error}}")
            @endforeach
            @endif
        </script>

        @yield('body')
    </div>
</div>
<script src=" {{asset('assets/admin/js/jquery.min.js')}}"></script>
<script src=" {{asset('assets/admin/js/bootstrap.bundle.min.js')}}"></script>
<script src=" {{asset('assets/admin/js/datatables.min.js')}}"></script>
<script src=" {{asset('assets/admin/js/moment.min.js')}}"></script>
<script src=" {{asset('assets/admin/js/fullcalendar.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootadmin.min.js')}}"></script>

{{--select2--}}
<link href="{{asset('assets/admin/css/select2.min.css')}}" rel="stylesheet"/>
<script src="{{asset('assets/admin/js/select2.min.js')}}"></script>

@yield('scripts')
<script src=" {{asset('assets/admin/dtablejs/jquery.dataTables.min.js')}}"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>
