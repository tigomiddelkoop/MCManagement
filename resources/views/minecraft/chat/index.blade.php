<?php use \App\Http\Controllers\Tools\CountryController; ?>

@extends('layouts.general')

@section('pagetitle')
    All players
@endsection
@section('pagedescription')
    All the players that have ever logged in.
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    @if(isset($searchResult))
                        <h3 class="box-title">Search results for: {{ $searchResult }}</h3>
                    @else
                        <h3 class="box-title">All Players</h3>
                    @endif

                    <div class="box-tools">
                        {{--<form method="post" action="{{ route('networkmanagerPlayersSearch') }}">--}}
                            {{--<div class="input-group input-group-sm" style="width: 200px;">--}}
                                {{--@csrf--}}
                                {{--<input type="text" class="form-control pull-right"--}}
                                       {{--placeholder="Search Player or IP"--}}
                                       {{--id="search"--}}
                                       {{--name="playername">--}}

                                {{--<div class="input-group-btn">--}}
                                    {{--<button type="submit" class="btn btn-default" id="submit_search"><i--}}
                                                {{--class="fa fa-search"></i></button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    </div>
                </div>
                <div class="box-body table-responsive no-padding
                <!-- /.box-header -->">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <thead>
                            <th style="width: 25px;"></th>
                            <th style="width: 90px;">Message ID</th>
                            <th>Playername</th>
                            <th>Message</th>
                            <th>Server</th>
                            <th>Send at</th>
                            </thead>
                        </tr>
                        <tbody id="players">
                        @foreach($chat as $e)
                            <tr>
                                <td><img src="https://crafatar.com/avatars/{{ $e->uuid }}?size=25"></td>
                                <td>{{ $e->id }}</td>
                                <td><a href="{{ route('networkmanagerPlayersShow', ['uuid' => $e->uuid]) }}">{{ \App\Http\Controllers\Tools\NameConverter::UUIDToName($e->uuid)}}</a></td>
                                <td>{{ $e->message }}</td>
                                <td>{{ $e->server }}</td>
                                <td>
                                    <p>{{ \App\Http\Controllers\Tools\ConvertTimeController::convertTimeDate($e->time) }}</p>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a href="{{ $chat->previousPageUrl() }}">&laquo;</a></li>
                        @for($x = 1; $x <= $chat->lastPage(); $x++)
                            @if($x === $chat->currentPage())
                                <li><a href="{{ $chat->url($x) }}" class="paginate_button active">{{ $x }}</a></li>
                            @else
                                <li><a href="{{ $chat->url($x) }}" class="paginate_button">{{ $x }}</a></li>
                            @endif
                        @endfor
                        <li><a href="{{ $chat->nextPageUrl() }}">&raquo;</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection