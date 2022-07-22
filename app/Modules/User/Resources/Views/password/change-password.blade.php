@extends('admin::layout')
@section('title')  Change Password @endsection
@section('breadcrumbs')
    <span class="breadcrumb-item active"> Change Password </span>
@endsection
@section('content')
    @include('flash::message')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Change Password</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="btn btn-success btn-sm " href="{{route('dashboard')}}">Back</a>
                </div>
            </div>
        </div>

        <div class="card-body pt-2">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                {!! Form::open(['route'=>'setting.update-password','method'=>'POST','class'=>'form-horizontal','role'=>'form','files' => true]) !!}
                <fieldset>
                    <div class="form-group row">
                        {!! Form::label('old_password', 'Old Password', ['class' => 'col-lg-3 control-label required_label']) !!}

                        <div class="col-lg-9">
                            {!! Form::text('old_password', $value = null, ['id'=>'old_password','placeholder'=>'New Password','class'=>'form-control']) !!}
                            <span class="error">{{ $errors->first('old_password') }}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('password', 'Password', ['class' => 'col-lg-3 control-label required_label']) !!}
                        <div class="col-lg-9">
                            {!! Form::password('password', ['id'=>'password','placeholder'=>'Password','class'=>'form-control']) !!}
                            <span class="error">{{ $errors->first('password') }}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('password_confirmation', 'Re-Type Password', ['class' => 'col-lg-3 control-label required_label']) !!}
                        <div class="col-lg-9">

                            {!! Form::password('password_confirmation', ['id'=>'password_confirmation','placeholder'=>'Password','class'=>'form-control']) !!}
                            <span class="error">{{ $errors->first('password_confirmation') }}</span>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-md-9 col-md-offset-3">
                            {!! Form::submit('Save',['class'=>'btn btn-success btn-sm ']) !!}
                        </div>
                    </div>
                </fieldset>

                {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
@endsection




