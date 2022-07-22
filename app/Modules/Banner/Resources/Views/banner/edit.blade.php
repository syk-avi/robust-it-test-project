@extends('admin::layout')
@section('title')  Banner  edit @endsection
@section('breadcrumbs')
    <a href="{{route('banner.index')}}" class="breadcrumb-item"> Banner </a>
    <span class="breadcrumb-item active">Edit </span>

@endsection

@section('content')
    @include('flash::message')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Banner Edit</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="btn btn-success btn-sm" href="{{route('banner.index')}}">Back</a>
                </div>
            </div>
        </div>


        <div class="card-body pt-2">
            {!! Form::model($banner,['route' => ['banner.update','id'=>$banner->id],'method'=>'PUT','class'=>'form-horizontal','role'=>'form','files' => true]) !!}
            <div class="row">
                <div class="col-md-12">
                    <fieldset>
                        <div class="form-group row">

                            {!! Form::label('title', 'Title', ['class' => 'col-md-2 control-label required_label']) !!}

                            <div class="col-md-10">
                                {!! Form::text('title', $value = null, ['id'=>'title','placeholder'=>'Title','class'=>'form-control required_label']) !!}
                                <span class="error">{{ $errors->first('title') }}</span>
                            </div>

                        </div>
                        <div class="form-group row">
                            {!! Form::label('detail', 'Detail ', ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::textarea('detail', $value = null, ['id'=>'detail','class'=>'form-control','placeholder'=>'detail']) !!}
                                @if($errors->first('detail'))
                                    <span class="text-danger">{{ $errors->first('detail') }}</span>
                                @endif

                            </div>

                        </div>


                        <div class="form-group row">
                            {!! Form::label('featured_image', 'Featured Image', ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-6">
                                @if($banner->featured_image)
                                    <div class="file_thumbnail img-wrap">
                                        <a href="{{route('banner.removeImage',$banner->id)}}"><span class="close">
                                     <img src="{{asset('lib/filemanager/close.png')}}" alt="close"/>
                                </span></a>
                                        <img src="{{asset('uploads/slide/featured_image/'.$banner->featured_image)}}"
                                             alt="close"/>
                                    </div>
                                @endif
                                {!! Form::file('featured_image',  ['id'=>'featured_image','class'=>'form-control h-auto']) !!}
                                <span class="text-danger">{{ $errors->first('featured_image') }}</span>
                            </div>
                        </div>



                    </fieldset>

                    <div class="form-group row">
                        <div class="col-md-9 col-md-offset-3">
                            {!! Form::submit('Save',['class'=>'btn btn-success btn-sm ']) !!}
                            <a href="{{ route('banner.index') }}">
                                {!! Form::button('Cancel',['class'=>'btn btn-warning btn-sm ']) !!}
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