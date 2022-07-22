@extends('admin::layout')
@section('title') List of Admin @endsection
@section('breadcrumbs')
    <span class="breadcrumb-item active">Admin</span>
@endsection


@section('content')
    @include('flash::message')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Admin List</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="btn btn-success btn-sm " href="{{route('admin.create')}}">Create</a>
                    <button type="button" class="btn btn-danger btn-sm"
                            onclick="confirmAndSubmitForm()">
                        Delete
                    </button>
                </div>
            </div>
        </div>

        <div class="card-body pt-2">

            <div class="table-responsive">
                {!! Form::open(['route' => 'admin.destroy','method'=>'DELETE','id'=>'formDelete']) !!}
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

                            Name
                        </th>

                        <th>

                            Email
                        </th>

                        <th>
                            User Type
                        </th>
                        <th>

                            Role
                        </th>


                        <th>
                            Status
                        </th>
                        <th>
                            Edit
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($admins as $key=>$admin)
                        <tr>
                            <td>{{$admin->id}}</td>

                            <td>
                                <div class="pretty p-default p-bigger p-pulse">
                                    {!! Form::checkbox('toDelete[]',$admin->id, false,['class'=>'checkItem']) !!}
                                    <div class="state p-danger-o">
                                        <label></label>
                                    </div>
                                </div>
                            </td>
                            <td>

                                @if(!empty($admin->profile_image) && $admin->profile_image != null  )
                                    <a href="{{ $admin->profile_image }}" class="highslide shadow-z-4"
                                       onclick="return hs.expand(this)">
                                        <img src="{{ $admin->profile_image}}" width="85"
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

                            <td>{{$admin->first_name}} {{$admin->last_name}}</td>
                            <td>{{$admin->email}}</td>
                            <td>{{$admin->user_type }}</td>
                            <td>@foreach ($admin->roles as $role) {{$role->name }} @endforeach</td>
                            <td>
                                @if ($admin->status == 1)
                                    <a href="#" class="btnStatus" data-status="{{ $admin->status }}"
                                       data-id="{{ $admin->id}}" data-url="{!! route('admin.status') !!}">
                                        <i class="fas fa-toggle-on fa-2x text-success-800">
                                        </i>
                                    </a>
                                @else
                                    <a href="#" class="btnStatus" data-status="{{$admin->status }}"
                                       data-id="{{ $admin->id }}" data-url="{!! route('admin.status') !!}">
                                        <i class="fas fa-toggle-off fa-2x text-danger-800">
                                        </i>
                                    </a>
                                @endif
                            </td>
                            <td>
                                <a   href="{{ route('admin.edit',['id'=>$admin->id]) }}" class="btn btn-primary btn-sm"><i class="icon-pencil mr-2"></i> Edit</a>

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

                {!! Form::close() !!}
            </div>
        </div>

    </div>
@stop
