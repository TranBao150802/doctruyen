<!DOCTYPE html>
<head>
<title>Đăng nhập</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset("frontend/css/bootstrap.min.css")}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('frontend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('frontend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('frontend/css/font.css')}}" type="text/css"/>
<link href="{{asset('frontend/css/font-awesome.css')}}" rel="stylesheet">
<!-- //font-awesome icons -->
<script src="{{asset("frontend/js/jquery2.0.3.min.js")}}"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
    <h2>Đăng nhập</h2>
    <?php
$message = Session::get('message');
if ($message) {
	echo '<span class="text-alert">' . $message . '</span>';
	Session::put('message', null);
}
?>
        <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                        <div class="panel-body">
                            <div class="col-md-12 form-group">
                                <span class="input-group-addon btn-white"><i class="fa fa-envelope"></i></span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <span class="input-group-addon btn-white"><i class="fa fa-user"></i></span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="col-md-8 offset-md-4">
                                 <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Nhớ mật khẩu') }}
                                    </label>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Đăng nhập') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Quên mật khẩu?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </form>
</div>
</div>
<script src="{{asset('frontend/js/bootstrap.js')}}"></script>
<script src="{{asset('frontend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('frontend/js/scripts.js')}}"></script>
<script src="{{asset('frontend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('frontend/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('frontend/js/jquery.scrollTo.js')}}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>
