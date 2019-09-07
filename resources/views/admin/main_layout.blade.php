<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title></title>
    <link href="{{URL::asset('module/admin/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('module/admin/css/search.css')}}" rel="stylesheet" >
</head>
<body>

<div class="user-item">
    <a class="btn btn-lg btn-primary btn-block" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
        {{ __('LOGOUT') }}
    </a>
</div>


<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<div class="outer-scale">
    <div class="outer-def-container">
        <div class="def-container">
            <div class="inner-def">
                <div class="def-content">
                    <div class="outer-word-display">
                        <div class="anchor-def">
                            <div class="search-cover">
                                <img class="review-image-account" id="imageId" src="">
                            </div>
                            <div class="post-content">
                                <form action="{{ action('Auth\LoginController@updateAccount')}}" method="POST" class="form-account">

                                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

                                    <div class="account-upload upper-upload">

                                        <input type="text" name="id" value="{{$authUser->id}}" style="display: none">

                                        <div class="outer-email">
                                            <span>Your Email</span>
                                            <div class="outer-inputEmail">
                                                <input type="text" id="userEmail" name="email" value="{{$authUser->email}}" disabled>
                                            </div>
                                        </div>

                                        <div class="outer-email">
                                            <span>Your Phone</span>
                                            <div class="outer-inputEmail">
                                                <input type="text" id="userEmail" name="phone" value="{{$authUser->phone}}">
                                            </div>
                                        </div>

                                        <div class="outer-userName">
                                            <span>Your Name</span>
                                            <div class="outer-inputName">
                                                <input type="text" id="userName" name="name" value="{{$authUser->name}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="submit-section">
                                        <input type="submit" value="Save changes" class="submit-btn">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script type="text/javascript" src="{{URL::asset('module/admin/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('module/admin/js/bootstrap.min.js')}}"></script>

</body>
</html>
