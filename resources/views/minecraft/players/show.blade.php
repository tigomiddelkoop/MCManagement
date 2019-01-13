<?php

use \App\Http\Controllers\Tools\CountryController;
use \App\Http\Controllers\Tools\MCVersionController;
use \App\Http\Controllers\Tools\ConvertTimeController;

?>
@section('pagetitle')
    Player info
@endsection

@section('pagedescription')
    Reviewing player: {{ $networkmanager->username }}
@endsection

@section('requiredJS')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
    <script>
        var ctx = document.getElementById("pieChart");

        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [@foreach($networkmanager_versions as $version)"{{ $version["version"] }}",@endforeach],
                datasets: [{
                    data: [@foreach($networkmanager_versions as $version){{ $version["amount"] . "," }} @endforeach],
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                }],
            },
            options: {
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                },
                legend: {
                    position: 'left',
                }
            }
        });
    </script>
@endsection

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
                         src="https://crafatar.com/renders/body/{{ $networkmanager->uuid }}?overlay">
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <!-- BEGIN PLAYERINFO -->
        <div class="col-md-4 col-6">
            <div class="box box-default">
                <div class="box-header with-border">

                    <h3 class="box-title">Player info</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table">
                        <tr>
                            <td>Username</td>
                            <td>{{ $networkmanager->username }}</td>
                        </tr>
                        <tr>
                            <td>UUID</td>
                            <td>{{ $networkmanager->uuid }}</td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>{{ CountryController::convert($networkmanager->country) }}</td>
                        </tr>
                        <tr>
                            <td>IP Address</td>
                            @can('networkmanager.player.viewip')
                                <td><a href="">{{ $networkmanager->ip }}</a></td>
                            @else
                                <td></td>
                            @endcan
                            {{--<td><a>{{ $networkmanager->ip }}</a></td>--}}
                        </tr>
                        <tr>
                            <td>Joined</td>
                            <td>{{ ConvertTimeController::convertTimeDate($networkmanager->firstlogin) }}</td>
                        </tr>
                        <tr>
                            <td>Last Login</td>
                            <td>{{ ConvertTimeController::convertTimeDate($networkmanager->lastlogin) }}</td>

                        </tr>
                        <tr>
                            <td>Last Logout</td>
                            <td>{{ ConvertTimeController::convertTimeDate($networkmanager->lastlogout) }}</td>

                        </tr>
                        <tr>
                            <td>&nbsp</td>
                            <td>&nbsp</td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>


        <!-- /.col -->
        <!-- END PLAYER INFO -->
        <div class="col-md-3">
            <div class="box box-default">
                <div class="box-header with-border">

                    <h3 class="box-title">Additional info</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table">
                        <tr>
                            <td>Online</td>
                            <td>
                                @switch($networkmanager->online)
                                    @case(0) <span class="label label-danger">No</span> @break
                                    @case(1) <span class="label label-success">Yes</span> @break
                                    @default <span class="label label-info">Unknown Value</span> @break
                                @endswitch
                            </td>
                        </tr>
                        <tr>
                            <td>Nickname</td>
                            <td>{{ $networkmanager->nickname }}</td>
                        </tr>
                        @if($settings['luckperms_integration'] == 1)
                            <tr>
                                <td>Rank</td>
                                <td>{{ $luckperms->primary_group }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td>Latest Minecraft</td>
                            <td>{{ MCVersionController::convert($networkmanager->version) }}</td>
                        </tr>
                        <tr>
                            <td>Playtime</td>
                            <td>{{ ConvertTimeController::convertPlaytime($networkmanager->playtime) }}</td>
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
                            <td>&nbsp</td>
                            <td>&nbsp</td>
                        </tr>
                        @if($settings['luckperms_integration'] == 0)
                            <tr>
                                <td>&nbsp</td>
                                <td>&nbsp</td>
                            </tr>
                        @endif
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.box -->
        <div class="col-md-2">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Additional Accounts</h3>
                </div>
                <div class="box-body no-padding">
                    <table class="table">
                        @foreach($networkmanager_additional as $additional_acccounts)
                            @if($networkmanager->uuid !== $additional_acccounts->uuid)
                                <tr>
                                    <td style="width: 25px;"><img
                                                src="https://crafatar.com/avatars/{{ $additional_acccounts->uuid }}?size=25">
                                    </td>
                                    <td>
                                        <a href="{{ route('networkmanagerPlayersShow', ['uuid' => $additional_acccounts->uuid]) }}">{{ $additional_acccounts->username }}</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--TEST-->
    <div class="row">
        <div class="col-md-2">
            <div class="box box-default">
                <div class="box-header with-border">

                    <h3 class="box-title">Notes</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <form action="index.php?data=playernote" method="get">
                        <input type="hidden" id="uuid" value="{$player['uuid']}">
                        <textarea class="textarea" id="note" placeholder="Make a new note"
                                  style="width: 100%; font-size: 14px; height: 250px; line-height: 15px; border: 1px solid #dddddd; padding: 10px;">PLACEHOLDER</textarea>
                </div>
                <div class="box-footer">
                    <button type="button" id="saveNote" class="btn btn-primary">Save</button>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Most used minecraft versions</h3>
                </div>
                <div class="box-body center-block">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">

                    <h3 class="box-title">Most recent sessions (Last 8 Records)</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                        <th>Started</th>
                        <th>Ended</th>
                        <th>Time</th>
                        <th>IP</th>
                        <th>Version</th>
                        </thead>
                        @foreach($networkmanager_sessions as $sessions)
                            <tr>
                                <td>{{ ConvertTimeController::convertTimeDate($sessions->start) }}</td>
                                <td>{{ ConvertTimeController::convertTimeDate($sessions->end) }}</td>
                                <td>{{ ConvertTimeController::convertPlaytime($sessions->time) }}</td>
                                @can('networkmanager.player.viewip')
                                    <td>{{ $sessions->ip }}</td>
                                @else
                                    <td></td>
                                @endcan
                                <td>{{ MCVersionController::convert($sessions->version) }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    {{--<script src="js/playernote.js"></script>--}}
    {{--<script>--}}
    {{--var uuid = document.getElementById('uuid');--}}
    {{--var note = document.getElementById('note');--}}
    {{--var saveNote = document.getElementById('saveNote');--}}

    {{--saveNote.addEventListener('click', function () {--}}
    {{--var uuidInput = uuid.value;--}}
    {{--var noteInput = note.value;--}}
    {{--ajax(uuidInput, noteInput);--}}
    {{--});--}}
    {{--</script>--}}
    {{--</section>--}}
    <!-- /.content -->
@endsection