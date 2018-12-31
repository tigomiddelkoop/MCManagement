@extends('layouts.general')
@section('pagetitle')
    All Users
@endsection
@section('pagedescription')
    All the users registered on the panel including their role
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">

                    <h3 class="box-title">Test</h3>

                </div>
                <div class="box-body table table-responsive no-padding">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th style="width: 25px;"></th>
                            <th style="width: 25px;">ID</th>
                            <th>Username</th>
                            <th>Email Address</th>
                            <th>Role</th>
                            <th>Added</th>
                            <th>View</th>
                        </thead>
                        @foreach($users as $user)
                        <tr>
                            <td><img src="https://crafatar.com/avatars/{{ $user->mc_uuid }}?size=25" class="user-image"
                                     alt="User Image"></td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td></td>
                            <td>{{ $user->created_at }}</td>
                            <td><a class="btn btn-primary btn-sm" href="{{ route('panelSettingsUserShow', ['user' => $user->id]) }}">View User</a> <a class="btn btn-primary btn-sm" href="{{ route('networkmanagerPlayersShow', ['uuid' => $user->mc_uuid]) }}">View Player</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection