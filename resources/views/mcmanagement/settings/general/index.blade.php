@extends('layouts.general')
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
                            <label for="panelname" class="col-sm-3 control-label">Panel Name (Edit in the .env file):</label>
                            <div class="col-sm-9">
                                <input type="text" name="panelname" class="form-control"
                                       value="{{ config('app.name') }}" disabled="true">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection