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
        <div class="col-md-12">
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
                            <label for="panelname" class="col-sm-8 control-label">Panel Name (Edit in the .env
                                file):</label>
                            <div class="col-sm-2">
                                <input type="checkbox" name="panelname" class="center-block checkbox"
                                       disabled="true">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection