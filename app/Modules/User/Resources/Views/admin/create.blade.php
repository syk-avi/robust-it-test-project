@extends('admin::layout')
@section('title') Add Admin @endsection
@section('breadcrumbs')
    <a href="{{route('admin.index')}}" class="breadcrumb-item"> Admin </a>
    <span class="breadcrumb-item active">Admin Create</span>

@endsection
@section('content')
    @include('flash::message')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Admin Create</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="btn btn-success btn-sm " href="{{route('admin.index')}}">Back</a>
                </div>
            </div>
        </div>

        <div class="card-body pt-2">
            <div class="row">

                <div class="col-md-12">


                    {!! Form::open(['route' => 'admin.store','method'=>'POST','class'=>'form-horizontal','user'=>'form','files' => true]) !!}


                    <fieldset>
                        <fieldset class="mb-3">
                            <div class="form-group row">

                                {!! Form::label('first_name','Name',['class'=>'col-lg-3 control-label required_label']) !!}
                                <div class="col-lg-5">
                                    {!! Form::text('first_name', $value = null, ['id'=>'first_name','class'=>'form-control','placeholder'=>'First Name']) !!}
                                    @if($errors->first('first_name'))
                                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-4">
                                    {!! Form::text('last_name', $value = null, ['id'=>'last_name','class'=>'form-control','placeholder'=>'Last Name ']) !!}
                                    @if($errors->first('first_name'))
                                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                    @endif
                                </div>
                            </div>

                        </fieldset>

                        <div class="form-group row">
                            {!! Form::label('email','E-mail',['class'=>'col-lg-3 control-label required_label']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('email', $value = null, ['id'=>'email','class'=>'form-control','placeholder'=>'E-mail']) !!}
                                @if($errors->first('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('username','Username',['class'=>'col-lg-3 control-label ']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('username', $value = null, ['id'=>'username','class'=>'form-control','placeholder'=>'Username']) !!}
                                @if($errors->first('username'))
                                    <span class="text-danger">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('password','Password',['class'=>'col-lg-3 control-label required_label']) !!}
                            <div class="col-lg-9">
                                {!! Form::password('password',['id'=>'password','class'=>'form-control','placeholder'=>'Password']) !!}
                                @if($errors->first('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('password_confirmation','Confirm Password',['class'=>'col-lg-3 control-label required_label']) !!}
                            <div class="col-lg-9">
                                {!! Form::password('password_confirmation',['id'=>'password_confirmation','class'=>'form-control','placeholder'=>'Confirm Password']) !!}
                                @if($errors->first('password_confirmation'))
                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group  row">
                            {!! Form::label('role','Select Role',['class'=>'col-lg-3 control-label  required_label']) !!}
                            <div class="col-md-6">

                                {!! Form::select('role[]',$roles,$value = null, ['id'=>'role','class'=>'form-control role']) !!}
                                @if($errors->first('role'))
                                    <span class="text-danger">{{ $errors->first('role') }}</span>
                                @endif

                            </div>
                        </div>



                        <div class="form-group row">
                            {!! Form::label('profile_image', 'Profile Image', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::file('profile_image',  ['id'=>'profile_image','class'=>'form-control h-auto']) !!}
                                <span class="text-danger">{{ $errors->first('profile_image') }}</span>
                            </div>
                        </div>

                    </fieldset>

                    <div class="form-group row">
                        <div class="col-md-9 col-md-offset-3">
                            {!! Form::submit('Save',['class'=>'btn btn-success btn-sm ']) !!}
                            <a href="{{ route('admin.index') }}">
                                {!! Form::button('Cancel',['class'=>'btn btn-warning btn-sm ']) !!}
                            </a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>

    </div>





@stop

