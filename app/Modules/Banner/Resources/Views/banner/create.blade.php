@extends('admin::layout')
@section('title') Add Banner  @endsection
@section('breadcrumbs')
    <a href="{{route('banner.index')}}" class="breadcrumb-item"> Banner </a>
    <span class="breadcrumb-item active">Banner  Create</span>

@endsection
@section('content')
    @include('flash::message')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Banner Create </h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="btn btn-success btn-sm " href="{{route('banner.index')}}">Back</a>
                </div>
            </div>
        </div>


        <div class="card-body pt-2">
            {!! Form::open(['route' => 'banner.store','method'=>'POST','class'=>'form-horizontal','user'=>'form','files' => true]) !!}

            <div class="row">
                <div class="col-md-12">

                    <div class="form-group row">

                        {!! Form::label('title', 'Title', ['class' => 'col-md-2 control-label required_label']) !!}

                        <div class="col-md-10">
                            {!! Form::text('title', $value = null, ['id'=>'title','placeholder'=>'Title','class'=>'form-control required_label']) !!}
                            <span class="error">{{ $errors->first('title') }}</span>
                        </div>

                    </div>

                    <div class="form-group row">

                        {!! Form::label('detail', 'Detail', ['class' => 'col-md-2 control-label']) !!}

                        <div class="col-md-5">
                            {!! Form::textarea('detail', $value = null, ['id'=>'detail','placeholder'=>'Detail','class'=>'form-control ']) !!}
                            <span class="error">{{ $errors->first('detail') }}</span>
                        </div>

                    </div>

                    <div class="form-group row">
                        {!! Form::label('featured_image', 'Featured Image', ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::file('featured_image',  ['id'=>'featured_image','class'=>'form-control h-auto']) !!}
                            <span class="text-danger">{{ $errors->first('featured_image') }}</span>
                        </div>
                    </div>

                    <div class="form-group row">

                        {!! Form::label('sort_order', 'Sort Order', ['class' => 'col-md-2 control-label']) !!}

                        <div class="col-md-5">
                            {!! Form::text('sort_order', $value = null, ['id'=>'sort_order','class'=>'form-control ']) !!}
                            <span class="error">{{ $errors->first('sort_order') }}</span>
                        </div>

                    </div>
                    <div class="form-group row">

                        <div class="col-md-9 col-md-offset-3">
                            {!! Form::submit('Save',['class'=>'btn btn-success btn-rounded legitRipple']) !!}
                            <a href="{{ route('banner.index') }}">
                                {!! Form::button('Cancel',['class'=>'btn btn-warning btn-rounded legitRipple']) !!}
                            </a>
                        </div>

                    </div>
                </div>

            </div>

            {!! Form::close() !!}
        </div>

    </div>
    <!-- /basic layout -->

@endsection

