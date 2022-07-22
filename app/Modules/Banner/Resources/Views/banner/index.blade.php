@extends('admin::layout')
@section('title') List of Banner  @endsection
@section('breadcrumbs')
    <span class="breadcrumb-item active">Banner </span>
@endsection


@section('content')
    @include('flash::message')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Banner List</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="btn btn-success btn-sm " href="{{route('banner.create')}}">Create</a>
                    <button type="button" class="btn btn-danger btn-sm"
                            onclick="confirmAndSubmitForm()">
                        Delete
                    </button>
                </div>
            </div>
        </div>

        <div class="card-body pt-2">

            <div class="table-responsive">
                {!! Form::open(['route' => 'banner.destroy','method'=>'DELETE','id'=>'formDelete']) !!}

                <div class="table-responsive">


                    <table class="table datatable-basic">
                        <thead>
                        <tr class="label-size-white-200 text-black">
                            <th>S.N</th>
                            <th width="20">
                                <div class="pretty p-default p-bigger p-pulse">
                                    <input type="checkbox" id="checkAll"/>
                                </div>
                            </th>

                            <th>Image</th>
                            <th>

                                Title
                            </th>



                            <th>
                                Status
                            </th>
                            <th>
                                Created At
                            </th>
                            <th>
                                Edit
                            </th>
                        </tr>
                        </thead>
                        <tbody >
                        @forelse ($banners as $key=>$banner)

                            <tr id="{{$banner->id}}">
                                <td>{{$banner->id}}</td>

                                <td>
                                    <div class="pretty p-default p-bigger p-pulse">
                                        {!! Form::checkbox('toDelete[]',$banner->id, false,['class'=>'checkItem']) !!}
                                        <div class="state p-danger-o">
                                            <label></label>
                                        </div>
                                    </div>
                                </td>

                                <td>

                                    @if(!empty($banner->featured_image) && $banner->featured_image != null  )
                                        <a href="{{ asset('uploads/slide/featured_image/'. $banner->featured_image) }}"
                                           class="highslide shadow-z-4"
                                           onclick="return hs.expand(this)">
                                            <img src="{{ asset('uploads/slide/featured_image/'. $banner->featured_image) }}"
                                                 width="85"
                                                 alt="" class="img-thumbnail"/>
                                        </a>
                                    @else

                                        <a href="{{ asset('lib/filemanager/no_img.png') }}" class="highslide shadow-z-4"
                                           onclick="return hs.expand(this)">
                                            <img src="{{ asset('lib/filemanager/no_img.png') }}" width="85"
                                                 alt="" class="img-thumbnail"/>
                                        </a>
                                    @endif
                                </td>
                                <td>{{$banner->title}}</td>




                                <td>
                                    @if ($banner->status == 1)
                                        <a href="#" class="btnStatus" data-status="{{ $banner->status }}"
                                           data-id="{{ $banner->id}}" data-url="{!! route('banner.status') !!}">
                                            <i class="fas fa-toggle-on fa-2x text-success-800">
                                            </i>
                                        </a>
                                    @else
                                        <a href="#" class="btnStatus" data-status="{{$banner->status }}"
                                           data-id="{{ $banner->id }}" data-url="{!! route('banner.status') !!}">
                                            <i class="fas fa-toggle-off fa-2x text-danger-800">
                                            </i>
                                        </a>
                                    @endif
                                </td>
                                <td>{{$banner->created_at}}</td>
                                <td>
                                    <a href="{{ route('banner.edit',['id'=>$banner->id]) }}"
                                       class="btn btn-primary btn-sm"><i
                                                class="icon-pencil mr-2"></i> Edit</a>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="15">
                                    <p class="text-danger text-center">No data found !</p>
                                </td>

                            </tr>
                        @endforelse

                        </tbody>
                    </table>


                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
        <!-- /highlighting rows and columns -->
@endsection

