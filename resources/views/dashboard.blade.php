@extends('layouts.general')

@section('pagetitle')
    Dashboard
@endsection

@section('pagedescription')
    Quick overview of the server
@endsection

@section('content')
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-3">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Info</h3>
                </div>
                <div class="box-body no-padding">
                    <table class="table">
                        <tr>
                            <th style="width: 10px">Server Status</th>
                            <td style="width: 10px"><span class="label label-success">Coming</span> <span
                                        class="label label-danger">Soon</span></td>
                        </tr>
                        <tr>
                            <th style="width: 10px">NamelessMC version</th>
                            <td style="width: 10px">Version</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-purple"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Online now</span>
                    <span class="info-box-number">{{ $onlinePlayers }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-purple"><i class="fa fa-clock-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Playtime today</span>
                    <span class="info-box-number">{{ \App\Http\Controllers\Tools\ConvertTimeController::convertPlaytime(0) }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-purple"><i class="fa fa-clock-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total playtime</span>
                    <span class="info-box-number">{{ \App\Http\Controllers\Tools\ConvertTimeController::convertPlaytime($playtime) }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-purple"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Players</span>
                    <span class="info-box-number">{{ $totalPlayers }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-purple"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Today online players</span>
                    {{--<span class="info-box-number">{{ $todayPlayers }}</span>--}}
                    <span class="info-box-number">--</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-purple"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Todays new players</span>
                    {{--<span class="info-box-number">{{ $newPlayers }}</span>--}}
                    <span class="info-box-number">--</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- LINE CHART -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Player Statistics</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body chart-responsive">
            <div class="chart" id="line-chart" style="height: 300px;"></div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- END LINE CHART -->
    <!-- MAP & BOX PANE -->
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Newest Players</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <div class="row">
                <div class="col-md-9 col-sm-8">
                    <div class="pad">
                        <!-- Map will be created here -->
                        <div id="world-map-markers" style="height: 325px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- END MAP -->
    <!-- /.box -->
@endsection
