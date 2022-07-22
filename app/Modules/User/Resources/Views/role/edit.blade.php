@extends('admin::layout')
@section('title')  Role edit @endsection
@section('breadcrumbs')
    <a href="{{route('role.index')}}" class="breadcrumb-item"> Role </a>
    <span class="breadcrumb-item active">Edit Role</span>

@endsection



@section('content')
    @include('flash::message')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Role Edit</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="btn btn-success btn-sm " href="{{route('role.index')}}">Back</a>
                </div>
            </div>
        </div>

        <div class="card-body pt-2">
            <div class="row">

                <div class="col-md-12">


                    {!! Form::model($role,['route' => ['role.update','id'=>$role->id],'method'=>'PUT','class'=>'form-horizontal','role'=>'form','files' => true]) !!}


                    <fieldset>
                        <legend class="text-semibold">Fill Fields Properly</legend>

                        <div class="form-group row">
                            {!! Form::label('name','Role Name',['class'=>'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('name', $value = null, ['id'=>'name','class'=>'form-control','placeholder'=>' Role Name']) !!}
                                @if($errors->first('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif

                            </div>
                        </div>


                        <div class="form-group row">
                            {!! Form::label('sort_order','Sort order',['class'=>'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('sort_order', $value = null, ['id'=>'sort_order','class'=>'form-control','placeholder'=>'Sort Order']) !!}
                                @if($errors->first('sort_order'))
                                    <span class="text-danger">{{ $errors->first('sort_order') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('roles','Permissions',['class'=>'col-lg-3 control-label']) !!}

                            <div class="col-lg-9">
                                <div class="row">
                                    @foreach($routes as $key => $route)
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="route_name[]"  value="{{$key}}" class="form-check-input-styled" @if(in_array($key,$assignedRoutes)) checked @endif >
                                                    {{$route}}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>




                                @if($errors->first('route_name'))
                                    <span class="text-danger">{{ $errors->first('route_name') }}</span>
                                @endif
                            </div>
                        </div>

                    </fieldset>

                    <div class="form-group row">
                        <div class="col-md-9 col-md-offset-3">
                            {!! Form::submit('Save',['class'=>'btn btn-success btn-sm ']) !!}
                            <a href="{{ route('role.index') }}">
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
