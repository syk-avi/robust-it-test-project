@extends('admin::layout')
@section('title')  Global Setting  edit @endsection
@section('breadcrumbs')
    <a class="breadcrumb-item"> Global Setting </a>
    <span class="breadcrumb-item active">Edit </span>

@endsection

@section('content')
    @include('flash::message')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Global Setting Edit</h5>

        </div>


        <div class="card-body pt-2">
            {!! Form::model($setting,['route' => ['globalsetting.update','id'=>$setting->id],'method'=>'PUT','class'=>'form-horizontal','role'=>'form','files' => true]) !!}
            <div class="row">
                <div class="col-md-12">

                    <div class="form-group row">

                        {!! Form::label('organisation_name', 'Organisation Name', ['class' => 'col-md-2 control-label required_label']) !!}

                        <div class="col-md-10">
                            {!! Form::text('organisation_name', $value = null, ['id'=>'organisation_name','placeholder'=>'Organisation Name','class'=>'form-control required_label']) !!}
                            <span class="error">{{ $errors->first('organisation_name') }}</span>
                        </div>

                    </div>

                    <div class="form-group row">
                        {!! Form::label('organisation_logo_1', 'Logo', ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-6">
                            @if($setting->organisation_logo_1)
                                <div class="file_thumbnail img-wrap">
                                    <a href="{{route('globalsetting.removeImage',[$setting->id,'organisation_logo_1'])}}"><span class="close">
                                     <img src="{{asset('lib/filemanager/close.png')}}" alt="close"/>
                                </span></a>
                                    <img src="{{asset('uploads/featured_image/'.$setting->organisation_logo_1)}}"
                                         alt="close"/>
                                </div>
                            @endif
                            {!! Form::file('organisation_logo_1',  ['id'=>'organisation_logo_1','class'=>'form-control h-auto']) !!}
                            <span class="text-danger">{{ $errors->first('organisation_logo_1') }}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('organisation_logo_2', 'Logo Alt', ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-6">
                            @if($setting->organisation_logo_2)
                                <div class="file_thumbnail img-wrap">
                                    <a href="{{route('globalsetting.removeImage',[$setting->id,'organisation_logo_2'])}}"><span class="close">
                                     <img src="{{asset('lib/filemanager/close.png')}}" alt="close"/>
                                </span></a>
                                    <img src="{{asset('uploads/featured_image/'.$setting->organisation_logo_2)}}"
                                         alt="close"/>
                                </div>
                            @endif
                            {!! Form::file('organisation_logo_2',  ['id'=>'organisation_logo_2','class'=>'form-control h-auto']) !!}
                            <span class="text-danger">{{ $errors->first('organisation_logo_2') }}</span>
                        </div>
                    </div>


                    <div class="form-group row">
                        {!! Form::label('header_bg_image', 'Header Background', ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-6">
                            @if($setting->header_bg_image)
                                <div class="file_thumbnail img-wrap">
                                    <a href="{{route('globalsetting.removeImage',[$setting->id,'header_bg_image'])}}"><span class="close">
                                     <img src="{{asset('lib/filemanager/close.png')}}" alt="close"/>
                                </span></a>
                                    <img src="{{asset('uploads/featured_image/'.$setting->header_bg_image)}}"
                                         alt="close"/>
                                </div>
                            @endif
                            {!! Form::file('header_bg_image',  ['id'=>'header_bg_image','class'=>'form-control h-auto']) !!}
                            <span class="text-danger">{{ $errors->first('header_bg_image') }}</span>
                        </div>
                    </div>

                    <div class="form-group row">

                        {!! Form::label('contact_number_1', 'Contact Number ', ['class' => 'col-md-2 control-label']) !!}

                        <div class="col-md-5">
                            {!! Form::text('contact_number_1', $value = null, ['id'=>'contact_number_1','placeholder'=>'Contact Number 1','class'=>'form-control ']) !!}
                            <span class="error">{{ $errors->first('contact_number_1') }}</span>
                        </div>
                        <div class="col-md-5">
                            {!! Form::text('contact_number_2', $value = null, ['id'=>'contact_number_2','placeholder'=>'Contact Number 2','class'=>'form-control ']) !!}
                            <span class="error">{{ $errors->first('contact_number_2') }}</span>
                        </div>
                    </div>

                    <div class="form-group row">

                        {!! Form::label('fax_number_1', 'Fax Number', ['class' => 'col-md-2 control-label required_label']) !!}

                        <div class="col-md-5">
                            {!! Form::text('fax_number_1', $value = null, ['id'=>'fax_number_1','placeholder'=>'Fax Number 1','class'=>'form-control']) !!}
                            <span class="error">{{ $errors->first('fax_number_1') }}</span>
                        </div>
                        <div class="col-md-5">
                            {!! Form::text('fax_number_2', $value = null, ['id'=>'fax_number_2','placeholder'=>'Fax Number 2','class'=>'form-control']) !!}
                            <span class="error">{{ $errors->first('fax_number_2') }}</span>
                        </div>
                    </div>


                    <div class="form-group row">

                        {!! Form::label('email_1', 'Email Address', ['class' => 'col-md-2 control-label required_label']) !!}

                        <div class="col-md-5">
                            {!! Form::text('email_1', $value = null, ['id'=>'email_1','placeholder'=>'Email 1','class'=>'form-control']) !!}
                            <span class="error">{{ $errors->first('email_1') }}</span>
                        </div>
                        <div class="col-md-5">
                            {!! Form::text('email_2', $value = null, ['id'=>'email_2','placeholder'=>'Email 2','class'=>'form-control']) !!}
                            <span class="error">{{ $errors->first('email_2') }}</span>
                        </div>
                    </div>

                    <div class="form-group row">

                        {!! Form::label('address_en', 'Address en', ['class' => 'col-md-2 control-label required_label']) !!}

                        <div class="col-md-5">
                            {!! Form::text('address_en', $value = null, ['id'=>'address_en','placeholder'=>'Address En','class'=>'form-control']) !!}
                            <span class="error">{{ $errors->first('address_en') }}</span>
                        </div>
                        <div class="col-md-5">
                            {!! Form::text('address_np', $value = null, ['id'=>'address_np','placeholder'=>'Address Np','class'=>'form-control']) !!}
                            <span class="error">{{ $errors->first('address_np') }}</span>
                        </div>
                    </div>


                    <div class="form-group row">

                        {!! Form::label('facebook_url', 'Facebook Url', ['class' => 'col-md-2 control-label required_label']) !!}

                        <div class="col-md-10">
                            {!! Form::text('facebook_url', $value = null, ['id'=>'facebook_url','placeholder'=>'Facebook Url','class'=>'form-control']) !!}
                            <span class="error">{{ $errors->first('facebook_url') }}</span>
                        </div>

                    </div>

                    <div class="form-group row">

                        {!! Form::label('tweeter_url', 'Tweeter Url', ['class' => 'col-md-2 control-label required_label']) !!}

                        <div class="col-md-10">
                            {!! Form::text('tweeter_url', $value = null, ['id'=>'tweeter_url','placeholder'=>'Tweeter Url','class'=>'form-control']) !!}
                            <span class="error">{{ $errors->first('tweeter_url') }}</span>
                        </div>

                    </div>

                    <div class="form-group row">

                        {!! Form::label('instagram_url', 'Instagran Url', ['class' => 'col-md-2 control-label required_label']) !!}

                        <div class="col-md-10">
                            {!! Form::text('instagram_url', $value = null, ['id'=>'instagram_url','placeholder'=>'Instagram Url','class'=>'form-control']) !!}
                            <span class="error">{{ $errors->first('instagram_url') }}</span>
                        </div>

                    </div>
                    <div class="form-group row">

                        {!! Form::label('copyright_en', 'Copyright', ['class' => 'col-md-2 control-label required_label']) !!}

                        <div class="col-md-5">
                            {!! Form::text('copyright_en', $value = null, ['id'=>'copyright_en','placeholder'=>'Copyright En','class'=>'form-control']) !!}
                            <span class="error">{{ $errors->first('address_en') }}</span>
                        </div>
                        <div class="col-md-5">
                            {!! Form::text('copyright_np', $value = null, ['id'=>'copyright_np','placeholder'=>'Copyright Np','class'=>'form-control']) !!}
                            <span class="error">{{ $errors->first('copyright_np') }}</span>
                        </div>
                    </div>






                    <div class="form-group row">

                        <div class="col-md-9 col-md-offset-3">
                            {!! Form::submit('Save',['class'=>'btn btn-success btn-rounded legitRipple']) !!}

                        </div>

                    </div>
                </div>

            </div>

            {!! Form::close() !!}
        </div>

    </div>

    <!-- /basic layout -->



@endsection