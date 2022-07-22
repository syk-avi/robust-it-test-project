@extends('admin::layout')
@section('title') List of Pages  @endsection
@section('breadcrumbs')
    <span class="breadcrumb-item active">Pages </span>
@endsection


@section('content')
    @include('flash::message')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Pages List</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="btn btn-success btn-sm " href="{{route('page.create')}}">Create</a>
                    <button type="button" class="btn btn-danger btn-sm"
                            onclick="confirmAndSubmitForm()">
                        Delete
                    </button>
                </div>
            </div>
        </div>

        <div class="card-body pt-2">


            <div class="table-responsive">
                {!! Form::open(['route' => 'page.destroy','method'=>'DELETE','id'=>'formDelete']) !!}
                <div class="table-responsive">


                    <table class="table datatable-basic">
                        <thead>
                        <tr>
                            <th>S.N</th>
                            <th>
                                <div class="pretty p-default p-bigger p-pulse">
                                    <input type="checkbox" id="checkAll"/>
                                </div>
                            </th>
                            <th>Image</th>
                            <th>Title</th>



                            <th>Status</th>
                            <th>
                                Created At
                            </th>
                            <th class="text-center">Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($pages as $key=>$page)
                            <tr>
                                <td>{{$page->id}}</td>

                                <td>
                                    <div class="pretty p-default p-bigger p-pulse">
                                        {!! Form::checkbox('toDelete[]',$page->id, false,['class'=>'checkItem']) !!}
                                        <div class="state p-danger-o">
                                            <label></label>
                                        </div>
                                    </div>
                                </td>
                                <td>

                                    @if(!empty($page->featured_image) && $page->featured_image != null  )
                                        <a href="{{ asset('uploads/page/featured_image/'. $page->featured_image) }}"
                                           class="highslide shadow-z-4"
                                           onclick="return hs.expand(this)">
                                            <img src="{{ asset('uploads/page/featured_image/'. $page->featured_image) }}"
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

                                <td>{{$page->title}}</td>




                                <td>
                                    @if ($page->status == 1)
                                        <a href="#" class="btnStatus" data-status="{{ $page->status }}"
                                           data-id="{{ $page->id}}" data-url="{!! route('page.status') !!}">
                                            <i class="fas fa-toggle-on fa-2x text-success-800">
                                            </i>
                                        </a>
                                    @else
                                        <a href="#" class="btnStatus" data-status="{{$page->status }}"
                                           data-id="{{ $page->id }}" data-url="{!! route('page.status') !!}">
                                            <i class="fas fa-toggle-off fa-2x text-danger-800">
                                            </i>
                                        </a>
                                    @endif
                                </td>
                                <td>{{$page->created_at}}</td>
                                <td>
                                    <a href="{{ route('page.edit',['id'=>$page->id]) }}"
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
        <!-- /highlighting rows and columns -->
    </div>
@endsection

