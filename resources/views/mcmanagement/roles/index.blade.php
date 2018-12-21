@extends('layouts.general')

@section('pagetitle', 'Roles')
@section('pagedescription', 'Edit/view your roles')

@section('content')
    <div class="row">
        <div class='col-md-12'>
            <div class="box box-default">
                <div class="box-header">

                    <h3 class="box-title">All roles</h3>

                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <th>ID</th>
                        <th>Role Name</th>
                        <th>Created at</th>
                        <th>View</th>
                        </thead>
                        @foreach($roles as $role)

                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->created_at }}</td>
                                <td><a class="btn btn-xs btn-primary" href="{{ route('panelSettingsRoleEdit', ['id' => $role->id]) }}">View role</a></td>
                            </tr>

                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection