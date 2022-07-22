@extends('admin::layout')
@section('title')  Page  edit @endsection
@section('breadcrumbs')
    <a href="{{route('page.index')}}" class="breadcrumb-item"> Page </a>
    <span class="breadcrumb-item active">Edit </span>

@endsection

@section('content')
    @include('flash::message')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Page Edit</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="btn btn-success btn-sm" href="{{route('page.index')}}">Back</a>
                </div>
            </div>
        </div>


        <div class="card-body pt-2">
            {!! Form::model($page,['route' => ['page.update','id'=>$page->id],'method'=>'PUT','class'=>'form-horizontal','role'=>'form','files' => true]) !!}
            <div class="row">
                <div class="col-md-8">
                    <fieldset>
                        <fieldset class="mb-3">


                            <div class="form-group row">
                                {!! Form::label('title', 'Title', ['class' => 'col-md-2 control-label required_label']) !!}

                                <div class="col-lg-10">
                                    {!! Form::text('title', $value = null, ['id'=>'title','class'=>'form-control','placeholder'=>'Title']) !!}
                                    @if($errors->first('title_en'))
                                        <span class="text-danger">{{ $errors->first('title_en') }}</span>
                                    @endif
                                </div>

                            </div>

                        </fieldset>

                        <div class="form-group row">

                            {!! Form::label('intro_text', 'IntroText', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">
                                {!! Form::textarea('intro_text',$value = null, ['id'=>'intro_text','placeholder'=>'Description','class'=>'editor ']) !!}
                                <span class="error">{{ $errors->first('intro_text') }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('detail', 'Details', ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-lg-10">
                                {!! Form::textarea('detail', $value = null, ['id'=>'detail','class'=>'editor','placeholder'=>'Description ']) !!}
                                @if($errors->first('detail'))
                                    <span class="text-danger">{{ $errors->first('detail') }}</span>
                                @endif

                            </div>

                        </div>
                        <div class="form-group row">
                            {!! Form::label('featured_image', 'Featured Image', ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-6">
                                @if($page->featured_image)
                                    <div class="file_thumbnail img-wrap">
                                        <a href="{{route('page.removeImage',$page->id)}}"><span class="close">
                                     <img src="{{asset('lib/filemanager/close.png')}}" alt="close"/>
                                </span></a>
                                        <img src="{{asset('uploads/page/featured_image/'.$page->featured_image)}}"
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
                            <a href="{{ route('page.index') }}">
                                {!! Form::button('Cancel',['class'=>'btn btn-warning btn-sm ']) !!}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="form-group">

                        {!! Form::label('parent_page_id', 'Parent Page', ['class' => 'col-md-12 control-label ']) !!}

                        <div class="col-md-12">
                            {!! Form::select('parent_page_id', $parentPages, $value = null, ['id'=>'parent_page_id','class'=>'form-control required_label','placeholder' => 'Pick a Page Type...']) !!}
                            <span class="error">{{ $errors->first('parent_page_id') }}</span>
                        </div>
                    </div>
                    <div class="form-group">

                        {!! Form::label('extra_one', 'Extra One', ['class' => 'col-md-12 control-label ']) !!}

                        <div class="col-md-12">
                            {!! Form::text('extra_one',$value = null, ['id'=>'extra_one','placeholder'=>'Extra One','class'=>'form-control']) !!}
                            <span class="error">{{ $errors->first('extra_one') }}</span>
                        </div>
                    </div>
                    <div class="form-group">

                        {!! Form::label('page_title', 'Page Title', ['class' => 'col-md-12 control-label ']) !!}

                        <div class="col-md-12">
                            {!! Form::text('page_title',$value = null, ['id'=>'extra_one','placeholder'=>'Page Title','class'=>'form-control']) !!}
                            <span class="error">{{ $errors->first('page_title') }}</span>
                        </div>
                    </div>
                    <div class="form-group">

                        {!! Form::label('page_keyword', 'Page Keyword', ['class' => 'col-md-12 control-label ']) !!}

                        <div class="col-md-12">
                            {!! Form::text('page_keyword',$value = null, ['id'=>'page_keyword','placeholder'=>'Page Keyword','class'=>'form-control']) !!}
                            <span class="error">{{ $errors->first('page_keyword') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('page_description', 'Page Description', ['class' => 'col-md-12 control-label ']) !!}

                        <div class="col-md-12">
                            {!! Form::text('page_description',$value = null, ['id'=>'page_description','placeholder'=>'Page Description','class'=>'form-control']) !!}
                            <span class="error">{{ $errors->first('page_description') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('icon_image', 'Icon', ['class' => 'col-md-12 control-label ']) !!}

                        <div class="col-md-12">
                            {!! Form::text('icon_image',$value = null, ['id'=>'icon_image','placeholder'=>'Icon','class'=>'form-control']) !!}
                            <span class="error">{{ $errors->first('icon_image') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {!! Form::close() !!}
        </div>

    </div>

    <!-- /basic layout -->



@endsection