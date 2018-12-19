@extends('layouts.general')

@section('pagetitle')
    Settings
@endsection

@section('requiredCSS')
    <link rel="stylesheet" href="{{ url('/') }}/plugins/iCheck/all.css">
@endsection

@section('requiredJS')
    <!-- iCheck 1.0.1 -->
    <script src="{{ url('/') }}/plugins/iCheck/icheck.min.js"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="box box-default">

                <div class="box-header with-border">

                    <h3 class="box-title">Settings</h3>

                </div>
                <div class="box-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="panelname" class="col-sm-2 control-label">Panel Name (Edit in the .env
                                file):</label>
                            <div class="col-sm-9">
                                <input type="text" name="panelname" class="form-control"
                                       value="{{ config('app.name') }}" disabled="true">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Integrations with other Plugins</h3>
                </div>
                <div class="box-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="panelname" class="col-sm-8 control-label">NetworkManager Integration:</label>
                            <div class="col-sm-2">
                                <input type="checkbox" name="panelname" class="center-block checkbox"
                                       disabled="true" checked>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        {{--IF STATEMENT IF NetworkManager is enabled--}}
        @if($settings['networkmanager_integration'] == 1)
            <div class="col-md-4">
                <div class="box box-default">
                    <div class="box-header">
                        <h3 class="box-title">NetworkManager MySQL</h3>
                    </div>
                    <div class="box-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="host_networkmanager" class="col-sm-3 control-label">Database Host:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="host_networkmanager" class="form-control"
                                           value="{{ env('DB_HOST_NETWORKMANAGER') }}" disabled="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name_networkmanager" class="col-sm-3 control-label">Database Name:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name_networkmanager" class="form-control"
                                           value="{{ env('DB_DATABASE_NETWORKMANAGER') }}" disabled="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username_networkmanager" class="col-sm-3 control-label">Database User:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="username_networkmanager" class="form-control"
                                           value="{{ env('DB_USERNAME_NETWORKMANAGER') }}" disabled="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password_networkmanager" class="col-sm-4 control-label">Database Password:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="password_networkmanager" class="form-control"
                                           value="(Change the database credentials in the .env file)" disabled="true">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif

        @if($settings['luckperms_integration'] == 1)
            <div class="col-md-4">
                <div class="box box-default">
                    <div class="box-header">
                        <h3 class="box-title">LuckPerms MySQL</h3>
                    </div>
                </div>
            </div>
        @endif

        @if($settings['litebans_integration'] == 1)
            <div class="col-md-4">
                <div class="box box-default">
                    <div class="box-header">
                        <h3 class="box-title">Litebans MySQL</h3>
                    </div>
                </div>
            </div>
        @endif


    </div>
@endsection