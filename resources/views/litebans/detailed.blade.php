@extends('layouts.general')



@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="box box-default">
                <div class="box-header with-border">

                    <h3 class="box-title">Player Skin</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <img class="center-block"
                         src="https://crafatar.com/renders/body/{{ $punishment->uuid }}?overlay">
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-md-5">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Punishment info</h3>
                </div>
                <div class="box-body no-padding">
                    <table class="table">
                        <tr>
                            <td width="100px">Username</td>
                            <td>{{ $punishment->name }}</td>
                        </tr>
                        <tr>
                            <td>IP</td>
                            @can('networkmanager.player.viewip')
                                <td>{{ $punishment->ip }}</td>
                            @else
                                <td></td>
                            @endcan
                        </tr>
                        <tr>
                            <td>&nbsp</td>
                            <td>&nbsp</td>
                        </tr>
                        <tr>
                            <td>Banned by</td>
                            <td>{{ $punishment->banned_by_name }}</td>
                        </tr>
                        <tr>
                            <td>Reason</td>
                            <td>{{ $punishment->reason }}</td>
                        </tr>
                        <tr>
                            <td>&nbsp</td>
                            <td>&nbsp</td>
                        </tr>
                        <tr>
                            <td>&nbsp</td>
                            <td>&nbsp</td>
                        </tr>
                        <tr>
                            <td>When</td>
                            <td>{{ \App\Http\Controllers\Tools\ConvertTimeController::convertTimeDate($punishment->time) }}</td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-1">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title with-border">Info</h3>
                </div>
                <div class="box-body text-center">
                    <a class="btn btn-sm btn-primary"
                       href="{{ route('networkmanagerPlayersShow', ['uuid' => $punishment->uuid]) }}">View player</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="box box-default">
                <div class="box-header with-border">

                    <h3 class="box-title">Active</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="text-center">
                        <br/>
                        <br/>
                        @if( $punishment->active == 1)
                            <h1 class="label label-success" style="font-size: 9em">YES</h1>
                        @else
                            <h1 class="label label-danger" style="font-size: 9em">NO</h1>
                        @endif
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection