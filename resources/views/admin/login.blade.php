<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/b/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/b/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/b/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/b/css/login.css" media="screen">

<link rel="stylesheet" type="text/css" href="/b/css/mws-theme.css" media="screen">

<title>{{Config::get('app.webname')}}</title>

</head>

<body>

    <div id="mws-login-wrapper">
        <div id="mws-login">

            <h1>welcom</h1>
            <div class="mws-login-lock"><i class="icon-lock"></i></div>
            <div id="mws-login-form">
                @if (count($errors) > 0)
                    <div class="mws-form-message error">
                        <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                   </div>        
               @endif
                @if(session('error'))
                    <div class="mws-form-message error">
                        {{session('error')}}
                    </div>
                @endif

                 @yield('content') 
                <form class="mws-form" action="{{url('admin/login')}}" method="post">
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="text" name="username" class="mws-login-username required" placeholder="用户名">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="password" name="password" class="mws-login-password required" placeholder="密码">
                        </div>
                    </div>
                    <div id="mws-login-remember" class="mws-form-row mws-inset">
                        <ul class="mws-form-list inline">
                            <li>
                                <input id="remember" name = "reme" value="1" type="checkbox"> 
                                <label for="remember">记住我</label>
                            </li>
                        </ul>
                    </div>


                    <div class="mws-form-row">
                            {{csrf_field()}}
                        <input type="submit" value="登录" class="btn btn-success mws-login-button">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Plugins -->
    <script src="/b/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/b/js/libs/jquery.placeholder.min.js"></script>
    <script src="/b/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/b/jui/js/jquery-ui-effects.min.js"></script>

    <!-- Plugin Scripts -->
    <script src="/b/plugins/validate/jquery.validate-min.js"></script>

    <!-- Login Script -->
    <script src="/b/js/core/login.js"></script>

</body>
</html>
