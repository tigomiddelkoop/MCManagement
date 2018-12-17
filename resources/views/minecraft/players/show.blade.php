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
        <div class="col-md-4">
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
                            <td>{{$networkmanager->ip}}</td>
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
                        <tr>
                            <td>Rank</td>
                            <td>{{ $luckperms->primary_group }}</td>
                        </tr>
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
                                        <a href="{{ route('minecraftSpecificPlayer', ['uuid' => $additional_acccounts->uuid]) }}">{{ $additional_acccounts->username }}</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        {{--<tr>--}}
                        {{--<td></td>--}}
                        {{--<td>--}}
                        {{--<ul class="pagination pagination-sm no-margin pull-right">--}}
                        {{--<li><a href="{{ $networkmanager_additional->previousPageUrl() }}">&laquo;</a></li>--}}
                        {{--@for($x = 1; $x <= $networkmanager_additional->lastPage(); $x++)--}}
                        {{--@if($x === $networkmanager_additional->currentPage())--}}
                        {{--<li><a href="{{ $networkmanager_additional->url($x) }}" class="paginate_button active">{{ $x }}</a></li>--}}
                        {{--@else--}}
                        {{--<li><a href="{{ $networkmanager_additional->url($x) }}" class="paginate_button">{{ $x }}</a></li>--}}
                        {{--@endif--}}
                        {{--@endfor--}}
                        {{--<li><a href="{{ $networkmanager_additional->nextPageUrl() }}">&raquo;</a></li>--}}
                        {{--</ul>--}}
                        {{--</td>--}}
                        {{--</tr>--}}
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
                <div class="box-body">
                    @foreach($networkmanager_versions as $session)

                        {{ MCVersionController::convert($session->version) }}

                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">

                    <h3 class="box-title">Most recent sessions</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Started</th>
                            <th>Ended</th>
                            <th>Time</th>
                            <th>IP</th>
                            <th>Version</th>
                        </tr>
                        @foreach($networkmanager_sessions as $sessions)
                            <tr>
                                <td>{{ ConvertTimeController::convertTimeDate($sessions->start) }}</td>
                                <td>{{ ConvertTimeController::convertTimeDate($sessions->end) }}</td>
                                <td>{{ ConvertTimeController::convertPlaytime($sessions->time) }}</td>
                                <td>{{ $sessions->ip }}</td>
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
    <script src="js/playernote.js"></script>
    <script>
        var uuid = document.getElementById('uuid');
        var note = document.getElementById('note');
        var saveNote = document.getElementById('saveNote');

        saveNote.addEventListener('click', function () {
            var uuidInput = uuid.value;
            var noteInput = note.value;
            ajax(uuidInput, noteInput);
        });
    </script>
    </section>
    <!-- /.content -->
@endsection