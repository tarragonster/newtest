<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title></title>
    <link href="{{URL::asset('module/admin/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('module/admin/css/login.css')}}" rel="stylesheet" >
</head>
<body>
<div class="container outer-login">
    <div class="row">
        <div class="col-md-12 row-block">
            <a href="{{ url('auth/google') }}" class="btn btn-lg btn-primary btn-block">
                <strong>Login With Google</strong>
            </a>
        </div>
    </div>
</div>

<!-- Scripts -->
<script type="text/javascript" src="{{URL::asset('module/admin/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('module/admin/js/bootstrap.min.js')}}"></script>

</body>
</html>
