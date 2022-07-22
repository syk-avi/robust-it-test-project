@extends('admin::layout')
@section('title') My Profile @endsection
@section('breadcrumbs')
    <span class="breadcrumb-item active">My Profile</span>
@endsection
@section('content')
    @include('flash::message')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">My Profile</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="btn btn-success btn-sm " href="{{route('dashboard')}}">Back</a>
                </div>
            </div>
        </div>

        <div class="card-body pt-2">
            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card bg-slate-600" style="background-image: url({{asset('admin-assets/global_assets/images/backgrounds/panel_bg.png')}}); background-size: contain;">
                        <div class="card-body text-center">
                            <div class="card-img-actions d-inline-block mb-3">
                                @if($admin->profile_image)
                                    <img  class="img-fluid rounded-circle"  src="{{ URL::to($admin->profile_image) }}"   alt="">
                                @else
                                    <img  class="img-fluid rounded-circle"  src="{{ URL::to('lib/filemanager/no_img.png') }}" alt="">
                                @endif


                            </div>

                            <h6 class="font-weight-semibold mb-0">{{$admin->first_name }} {{$admin->last_name }}</h6>
                            <span class="d-block opacity-75">{{$admin->email}}</span>


                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Basic layout-->
                    {!! Form::model($admin,['method'=>'PUT','route'=>['admin.updateProfile',$admin->id],'class'=>'form-horizontal','role'=>'form']) !!}

                    <fieldset>
                        <div class="form-group row">
                            {!! Form::label('first_name','Name',['class'=>'col-lg-4 control-label required_label']) !!}
                            <div class="col-lg-4">
                                {!! Form::text('first_name', $admin->first_name, ['id'=>'first_name','class'=>'form-control','placeholder'=>'First Name']) !!}
                                <span class="error">{{ $errors->first('first_name') }}</span>
                            </div>
                            <div class="col-lg-4">
                                {!! Form::text('last_name', $admin->last_name, ['id'=>'last_name','class'=>'form-control','placeholder'=>'Last Name']) !!}
                                <span class="error">{{ $errors->first('last_name') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 control-label required_label">Mobile</label>
                            <div class="col-lg-4">
                                {!! Form::text('mobile', $admin->mobile, ['id'=>'mobile','class'=>'form-control','placeholder'=>'Mobile']) !!}
                                <span class="error">{{ $errors->first('mobile') }}</span>
                            </div>
                            <div class="col-lg-4">
                                {!! Form::text('phone', $admin->phone, ['id'=>'mobile','class'=>'form-control','placeholder'=>'Phone']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 control-label required_label">Address</label>
                            <div class="col-lg-8">
                                {!! Form::text('address_line1', $admin->address_line1, ['id'=>'address_line1','class'=>'form-control ','placeholder'=>'Address 1']) !!}
                                <span class="error">{{ $errors->first('address_line1') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 control-label">Profile Image</label>

                            <div class="col-lg-8">
                                {{Form::file('profile_image', ['id'=>'mobile','class'=>'file-styled'])}}
                                <span class="help-block">Accepted formats: png, jpg. Max file size 2Mb</span>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary legitRipple">Submit form <i
                                        class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </fieldset>
                    {!! Form::close() !!}
                </div>


            <!-- /basic layout -->





            </div>
        </div>

    </div>


    <!-- /.row -->

@stop
@section('scripts')

@endsection

