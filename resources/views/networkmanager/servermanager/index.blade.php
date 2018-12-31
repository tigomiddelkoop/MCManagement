@extends('layouts.general')

@section('pagetitle', 'Server Manager')
@section('pagedescription', 'Manage your servers with NetworkManager')
<?php

if (session()->has('success')) {
    $infoMessage = session('success');
}
?>

@section('content')
    <div class="row">
        @if(isset($infoMessage))
            <div class="col-md-12">
                <div class="info-box">
                    <!-- Apply any bg-* class to to the icon to color it -->
                    @switch($infoMessage['code'])
                        @case(0) <span class="info-box-icon bg-red"><i
                                    class="fa fa-exclamation-circle"></i></span> @break
                        @case(1) <span class="info-box-icon bg-green"><i class="fa fa-check-circle"></i></span> @break
                    @endswitch
                    <div class="info-box-content">
                        @switch($infoMessage['code'])
                            @case(0) <span class="info-box-number">Failed</span> @break
                            @case(1) <span class="info-box-number">Success</span> @break
                        @endswitch
                        <span class="info-box-number">{{ $infoMessage['message'] }}</span>
                    </div>
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
