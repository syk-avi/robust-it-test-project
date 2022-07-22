<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Avinesh Shakya | CMS </title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="{{asset('admin-assets/global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet"
          type="text/css">
    <link href="{{asset('admin-assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin-assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin-assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin-assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin-assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{asset('admin-assets/global_assets/js/main/jquery.min.js')}}"></script>
    <script src="{{asset('admin-assets/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin-assets/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{asset('admin-assets/js/app.js')}}"></script>
    <!-- /theme JS files -->
    <style>
        @media (min-width: 576px) {
            .login-form {
                width: 20rem;
                margin: 50px auto 0 auto;
            }
        }
    </style>
</head>

<body>


<!-- Page content -->
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">


        <!-- Content area -->
        <div class="content d-flex justify-content-center align-items-center" style="flex-wrap: wrap">

            {!! Form::open(['route' => 'admin.login.post','method'=>'POST','id'=>'sign_in']) !!}


            <div class="login-form">
                <div class="card mb-0">

                    <div class="card-body">
                        <div class="text-center mb-3" style="overflow: hidden">

                            <h5 class="mb-0">Login to your account</h5>
                            <span class="d-block text-muted">Enter your credentials below</span>
                        </div>
                        @include('flash::message')
                        <div class="form-group form-group-feedback form-group-feedback-left">
                            {!! Form::text('email', $value = null, ['id'=>'email','placeholder'=>'Email','class'=>'form-control','autofocus']) !!}
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            {!! Form::password('password', ['id'=>'password','placeholder'=>'Password','class'=>'form-control']) !!}
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        </div>
                        <div class="form-group login-options">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="checkbox-inline">
                                        {!! Form::checkbox('remember',1,false, ['id'=>'remember_me','class'=>'filled-in chk-col-pink']) !!}
                                        Remember
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Sign in <i
                                        class="icon-circle-right2 ml-2"></i></button>
                        </div>

                        <div class="text-center">
                            <a href="{{route('forgetPassword')}}">Forgot password?</a>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}


        </div>
        <!-- /content area -->


    </div>
    <!-- /main content -->

</div>
<!-- /page content -->

</body>
</html>
