@extends('layouts.general')
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
                        <th style="width: 10px"><span class="label label-success">5 Online</span> <span class="label label-danger">0 Offline</span></th>
                    </tr>
                    <tr>
                        <th style="width: 10px">Server Versions</th>
                        <th style="width: 10px"><span class="label label-info">4x 1.12.2</span> <span class="label label-info">1x 1.13</span></th>
                    </tr>
                    <tr>
                        <th style="width: 10px">NamelessMC version</th>
                        <th style="width: 10px"><span class="label label-info">{$namelessVersion['nameless_version']}</span></th>
                    </tr>
                    <tr>
                        <th style="width: 10px">NamelessMC version</th>
                        <th style="width: 10px"><span class="label label-info">{$namelessVersion['nameless_version']}</span></th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Players</span>
                <span class="info-box-number">{$totalPlayers}</span>
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
                <span class="info-box-number">{$todayOnlinePlayers}</span>
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
                <span class="info-box-number">{$todayNewPlayers}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="fa fa-clock-o"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Todays playtime</span>
                <span class="info-box-number">WIP</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="fa fa-clock-o"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total playtime</span>
                <span class="info-box-number">{$totalPlaytime}</span>
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