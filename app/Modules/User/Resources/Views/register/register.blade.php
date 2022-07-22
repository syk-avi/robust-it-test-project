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

            {!! Form::open(['route' => 'post.register','method'=>'POST','id'=>'sign_in']) !!}


            <div class="login-form">
                <div class="card mb-0">

                    <div class="card-body">
                        <div class="text-center mb-3" style="overflow: hidden">

                            <h5 class="mb-0">Please Register</h5>
                            <span class="d-block text-muted">Enter your information below</span>
                        </div>
                        @include('flash::message')

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            {!! Form::text('first_name', $value = null, ['id'=>'first_name','placeholder'=>'First Name','class'=>'form-control','autofocus']) !!}
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                        </div>


                        <div class="form-group form-group-feedback form-group-feedback-left">
                            {!! Form::text('last_name', $value = null, ['id'=>'last_name','placeholder'=>'Last Name','class'=>'form-control','autofocus']) !!}
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                        </div>



                        <div class="form-group form-group-feedback form-group-feedback-left">
                            {!! Form::text('email', $value = null, ['id'=>'email','placeholder'=>'Email','class'=>'form-control','autofocus']) !!}
                            <div class="form-control-feedback">
                                <i class=" icon-envelop text-muted"></i>
                            </div>
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>


                        <div class="form-group form-group-feedback form-group-feedback-left">
                            {!! Form::text('username', $value = null, ['id'=>'username','placeholder'=>'Username','class'=>'form-control','autofocus']) !!}
                            <div class="form-control-feedback">
                                <i class=" icon-user-tie text-muted"></i>
                            </div>
                            <span class="text-danger">{{ $errors->first('username') }}</span>
                        </div>


                        <div class="form-group form-group-feedback form-group-feedback-left">
                            {!! Form::password('password', ['id'=>'password','placeholder'=>'Password','class'=>'form-control']) !!}
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        </div>


                        <div class="form-group form-group-feedback form-group-feedback-left">
                            {!! Form::password('password_confirmation', ['id'=>'password_confirmation','placeholder'=>'Re-Password','class'=>'form-control']) !!}
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Register Account <i
                                        class="icon-circle-right2 ml-2"></i></button>
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



