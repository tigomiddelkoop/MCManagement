@extends('layouts.general')

@section('pagetitle', 'Add server')
@section('pagedescription', 'Add a server to your network')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <form action="{{ route('networkmanagerServerStoreServer') }}" method="post">
                    <div class="box-header with-border">
                        <div class="box-title">

                            <h3 class="box-title">Add Server</h3>

                        </div>
                        <div class="box-tools">
                            <button class="btn btn-sm btn-primary" type="submit">Save server</button>
                        </div>
                    </div>
                    <div class="box-body">
                        @foreach ($errors->all() as $message)
                        {{ $message }} <br />
                        @endforeach
                        @csrf
                        <label for="servername">Server Name:</label>
                        <input class="form-control" name="servername" type="text">

                        <label for="serverip">Server IP:</label>
                        <input class="form-control" name="serverip" type="text">

                        <label for="serverport">Server Port:</label>
                        <input class="form-control" name="serverport" type="number" min="1" max="65535">

                        <label for="servermotd">Server MOTD:</label>
                        <input class="form-control" name="servermotd" type="text">

                        <label for="serverrestricted">Server Restricted:</label>
                        <input class="" name="serverrestricted" type="checkbox">
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-primary" type="submit">Save server</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection