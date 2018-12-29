@extends('layouts.general')

@section('pagetitle', 'Add server')
@section('pagedescription', 'Add a server to your network')

@section('requiredCSS')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ url('/') }}/bower_components/select2/dist/css/select2.min.css">
@endsection

@section('requiredJS')
    <script src="{{ url('/') }}/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.versionselector').select2()
        })
    </script>
@endsection

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
                            {{ $message }} <br/>
                        @endforeach
                        @csrf
                        <label for="servername">Server Name:</label>
                        <input class="form-control" name="servername" type="text" value="{{ old('servername') }}">

                        <label for="serverip">Server IP:</label>
                        <input class="form-control" name="serverip" type="text" value="{{ old('serverip') }}">

                        <label for="serverport">Server Port:</label>
                        <input class="form-control" name="serverport" type="number" min="1" max="65535"
                               value="{{ old('serverport') }}">

                        <label for="servermotd">Server MOTD:</label>
                        <input class="form-control" name="servermotd" type="text" value="{{ old('servermotd') }}">


                        <div class="form-group">
                            <label for="allowedversions">Select Minecraft versions</label>
                            <select class="from-control versionselector" multiple="multiple"
                                    data-placeholder="Select allowed minecraft versions"
                                    style="width: 100%;"
                                    name="allowedversions[]">
                                @include('networkmanager.servermanager.versions')
                            </select>
                        </div>

                        <label for="serverrestricted">Server Restricted:</label>
                        @if(old('serverrestricted') == "on")
                            <input class="" name="serverrestricted" type="checkbox" checked>
                        @else
                            <input class="" name="serverrestricted" type="checkbox">
                        @endif

                    </div>
                    <div class="box-footer">
                        <button class="btn btn-primary" type="submit">Save server</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection