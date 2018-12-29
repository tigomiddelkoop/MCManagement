@extends('layouts.general')

@section('pagetitle', 'Server Manager')
@section('pagedescription', 'Manage your servers with NetworkManager')
<?php

if (session()->has('success')) {
    $success = session('success');
}
?>

@section('content')
    <div class="row">
        @if(isset($success))
            <div class="col-md-12">
                @if($success['code'] == 0)
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Successful! Do Execute '/servermanager
                                reload {{ $success['servername'] }}
                                ' to register/reload it.</h3>
                        </div>
                        @elseif($success['code'] == 1)
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Successful! Server {{ $success['servername'] }} Removed</h3>
                                </div>
                                @endif
                            </div>
                    </div>
                @endif

                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">

                            <div class="box-title">Server</div>
                            <div class="box-tools">
                                <a class="btn btn-primary btn-sm"
                                   href="{{ route('networkmanagerServerCreateServer') }}">Create server</a>
                            </div>

                        </div>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                <th>ID</th>
                                <th>Server</th>
                                <th>IP</th>
                                <th>Port</th>
                                <th>Restricted</th>
                                <th>Online</th>
                                <th>Edit</th>
                                </thead>
                                @foreach($servers as $server)
                                    <tr>
                                        <td>{{ $server->id }}</td>
                                        <td>{{ $server->servername }}</td>
                                        <td>{{ $server->ip }}</td>
                                        <td>{{ $server->port }}</td>
                                        <td>{{ $server->restricted }}</td>
                                        <td>{{ $server->online }}</td>
                                        <td>
                                            <a href="{{ route('networkmanagerServerEditServer', ['id' => $server->id]) }}"
                                               class="btn btn-xs btn-primary">Edit</a>
                                            <a href="{{ route('networkmanagerServerDestroyServer', ['id' => $server->id]) }}"
                                               class="btn btn-xs btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-header with-border">

                            <div class="box-title">Server groups</div>
                            <div class="box-tools">
                                <a class="btn btn-primary btn-sm"
                                   href="{{ route('networkmanagerServerCreateServerGroup') }}">Create
                                    servergroup</a>
                            </div>

                        </div>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                <th>ID</th>
                                <th>Group</th>
                                <th>Servers</th>
                                </thead>
                                @foreach($serverGroups as $serverGroup)
                                    <tr>
                                        <td>{{ $serverGroup->id }}</td>
                                        <td>{{ $serverGroup->groupname }}</td>
                                        <td>{{ $serverGroup->servers }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
@endsection
