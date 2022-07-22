@extends('admin::layout')
@section('title')  User edit @endsection
@section('breadcrumbs')
    <a href="{{route('admin.index')}}" class="breadcrumb-item"> Admin </a>
    <span class="breadcrumb-item active">Edit Admin</span>

@endsection


@section('content')
    @include('flash::message')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Admin Edit</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="btn btn-success btn-sm " href="{{route('admin.index')}}">Back</a>
                </div>
            </div>
        </div>

        <div class="card-body pt-2">
            <div class="row">

                <div class="col-md-12">


                    {!! Form::model($admin,['route' => ['admin.update','id'=>$admin->id],'method'=>'PUT','class'=>'form-horizontal','role'=>'form','files' => true]) !!}


                    <fieldset>
                        <div class="form-group row">
                            {!! Form::label('first_name','Name',['class'=>'col-lg-3 control-label required_label']) !!}
                            <div class="col-lg-4">
                                {!! Form::text('first_name', $admin->first_name, ['id'=>'first_name','class'=>'form-control','placeholder'=>'First Name']) !!}
                                @if($errors->first('first_name'))
                                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-5">
                                {!! Form::text('last_name', $admin->last_name, ['id'=>'last_name','class'=>'form-control','placeholder'=>'Last Name ']) !!}
                                @if($errors->first('first_name'))
                                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                @endif
                            </div>
                        </div>

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
                            {!! Form::label('username','Username',['class'=>'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('username', $value = null, ['id'=>'username','class'=>'form-control','placeholder'=>'Username','disabled']) !!}
                                @if($errors->first('username'))
                                    <span class="text-danger">{{ $errors->first('username') }}</span>
                                @endif

                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('password','Password',['class'=>'col-lg-3 control-label required_label']) !!}
                            <div class="col-lg-9">
                                <input id="password" class="form-control" placeholder="Password" name="password" type="password" value="">
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
                        <div class="form-group row">
                            {!! Form::label('role','Select Role',['class'=>'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                <select name="role[]" class="form-control role" id="role">
                                    @forelse($adminRoles as $key=>$role)
                                        <option value="{{$key}}" @foreach ($admin->roles as $selectedRole)
                                        @if($selectedRole->id == $key) selected @endif @endforeach >{{$role}}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @if($errors->first('role'))
                                    <span class="text-danger">{{ $errors->first('role') }}</span>
                                @endif
                            </div>
                        </div>




                        <div class="form-group row">
                            {!! Form::label('profile_image', 'Profile Image', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-6">
                                @if($admin->profile_image)
                                    <div class="file_thumbnail img-wrap">
                                        <a href="{{route('admin.removeImage',$admin->id)}}"><span class="close">
                                     <img src="{{asset('lib/filemanager/close.png')}}" alt="close"/>
                                </span></a>
                                        <img src="{{asset('uploads/user/profile_image/'.$admin->profile_image)}}"
                                             alt="close"/>
                                    </div>
                                @endif
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
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {


        });
    </script>
@endsection
