<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School Plus</title>

    <!-- Global stylesheets -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" >
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icons/icomoon/styles.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/colors.css') }}">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/login.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>
    <!-- /theme JS files -->

</head>

<body class="login-container">
<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <!-- Advanced login -->
                <form action="{{ url('mail')}}" method="post">
                    {{ csrf_field() }}
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <div class="icon-object border-slate-300 text-slate-300"><img src="{{ asset('assets/images/peb-logo.png') }}"/></div>
                            <h5 class="content-group">Change account password! <small class="display-block">Your email</small></h5>
                        </div>
                        <div class="form-group has-feedback has-feedback-left">
                            <input type="text" class="form-control" placeholder="User Name" name="username">
                            <div class="form-control-feedback">
                                <i class="icon-mail5 text-muted"></i>
                            </div>
                        </div>
                        <div class="form-group login-options">
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <a href="{{ url('login') }}">Back to Login?</a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn bg-danger-400 btn-block">Send Request <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                        <span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
                    </div>
                </form>
                <!-- /advanced login -->


                <!-- Footer -->
                <div class="footer text-muted text-center">
                    &copy; 2017. <a href="#">School Plus</a> by <a href="http:/www.prosignstech.com" target="_blank">PROSIGNS</a>
                </div>
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>
