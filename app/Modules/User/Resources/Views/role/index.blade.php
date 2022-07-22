@extends('admin::layout')
@section('title') List of Roles @endsection
@section('breadcrumbs')
    <span class="breadcrumb-item active">Roles</span>
@endsection


@section('content')
    @include('flash::message')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Roles List</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="btn btn-success btn-sm " href="{{route('role.create')}}">Create</a>
                    <button type="button" class="btn btn-danger btn-sm"
                            onclick="confirmAndSubmitForm()">
                        Delete
                    </button>
                </div>
            </div>
        </div>

        <div class="card-body pt-2">

            <div class="table-responsive">
                {!! Form::open(['route'=>'role.destroy','method'=>'DELETE','id'=>'formDelete']) !!}
                <table class="table datatable-basic">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th width="20">
                            <div class="pretty p-default p-bigger p-pulse">
                                <input type="checkbox" id="checkAll"/>
                                <div class="state p-danger-o">
                                    <label>Check All</label>
                                </div>
                            </div>
                        </th>

                        <th>

                            Name
                        </th>

                        <th> Status</th>
                        <th>
                            Created Date
                        </th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($roles as $key=>$role)
                        <tr>

                            <td>{{$role->id}}</td>
                            <td>
                                <div class="pretty p-default p-bigger p-pulse">
                                    {!! Form::checkbox('toDelete[]',$role->id, false,['class'=>'checkItem']) !!}
                                    <div class="state p-danger-o">
                                        <label></label>
                                    </div>
                                </div>
                            </td>
                            <td>{{$role->name}}</td>

                            <td>
                                @if ($role->status == 1)
                                    <a href="#" class="btnStatus" data-status="{{ $role->status }}"
                                       data-id="{{ $role->id}}" data-url="{!! route('role.status') !!}">
                                        <i class="fa fa-toggle-on fa-2x text-success-800">
                                        </i>
                                    </a>
                                @else
                                    <a href="#" class="btnStatus" data-status="{{$role->status }}"
                                       data-id="{{ $role->id }}" data-url="{!! route('role.status') !!}">
                                        <i class="fa fa-toggle-off fa-2x text-danger-800">
                                        </i>
                                    </a>
                                @endif

                            </td>
                            <td>{{$role->created_at}}</td>
                            <td class="text-center">
                                <a href="{{ route('role.edit',['id'=>$role->id]) }}" class="btn btn-primary btn-sm"><i
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


                {!! Form::close() !!}
            </div>
        </div>

    </div>
@stop
