<?php
use Illuminate\Support\Str;
use App\Http\Controllers\Tools\ConvertTimeController;
?>
@extends('layouts.general')

@section('pagetitle')
    Overview of latest punishments
@endsection

@section('pagedescription')
    Here are a few punishments
@endsection

@section('content')
    <div class="row">
        @foreach($punishments as $name => $punishment)
            {{--@foreach($punishment as $name => $items)--}}
            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header with-border">

                        <h3 class="box-title">{{ $name }}</h3>

                    </div>
                    <div class="box-body no-padding">

                        <table class="table table-hover table-responsive">
                            <thead>
                            <th style="width: 25px"></th>
                            <th style="width: 25px">#</th>
                            <th style="width: 100px">Player</th>
                            <th style="width: 150px">Date</th>
                            <th style="width: 325px">Reason</th>
                            <th>View</th>
                            </thead>
                                @foreach($punishment as $item)
                                    <tr>
                                        <td><img src="https://crafatar.com/avatars/{{ $item->uuid }}?size=25"></td>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ ConvertTimeController::convertTimeDate($item->time) }}</td>
                                        <td>{{ Str::limit($item->reason, 50) }}</td>
                                        <td><a class="btn btn-xs btn-primary" href="">View punishment</a><a class="btn btn-xs btn-primary-" href="">View player</a></td>
                                    </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection