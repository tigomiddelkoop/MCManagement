<?php use \App\Http\Controllers\Tools\ConvertTimeController; ?>

@section('pagetitle')
    Punishments: {{ $page_title }}
@endsection
@section('pagedescription')
    All the punishments that have been given
@endsection
@extends('layouts.general')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All {{ $page_title }}</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table id="BannedPlayers" class="table table-bordered table-striped">
                        <thead>
                        <td style="width: 25px"></td>
                        <th>ID</th>
                        <th>Playername</th>
                        <th>Reason</th>
                        <th>By</th>
                        <th>Active</th>
                        <th>Date</th>
                        <th></th>
                        </thead>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($punishments as $punishment)
                        <tr>
                            <td><img src="https://crafatar.com/avatars/{{ $punishment->uuid }}?size=25"></td>
                            <td>{{ $punishment->id  }}</td>
                            <td>{{ $punishment->name }}</td>
                            <td>{{ $punishment->reason }}</td>
                            <td>{{ $punishment->banned_by_name }}</td>
                            <td>
                                @switch($punishment->active)
                                    @case(0) <span class="label label-danger">No</span> @break
                                    @case(1) <span class="label label-success">Yes</span> @break
                                    @default <span class="label label-info">Unknown value</span> @break
                                @endswitch
                            </td>
                            <td>{{ ConvertTimeController::convertTimeDate($punishment->time) }}</td>
                            <td><a href="{{ route('minecraftSpecificPlayer', ['uuid' => $punishment->uuid ]) }}" class="btn btn-xs btn-primary">View Player</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                        </tfoot>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a href="{{ $punishments->previousPageUrl() }}">&laquo;</a></li>
                        @for($x = 1; $x <= $punishments->lastPage(); $x++)
                            @if($x === $punishments->currentPage())
                                <li><a href="{{ $punishments->url($x) }}" class="paginate_button active">{{ $x }}</a></li>
                            @else
                                <li><a href="{{ $punishments->url($x) }}" class="paginate_button">{{ $x }}</a></li>
                            @endif
                        @endfor
                        <li><a href="{{ $punishments->nextPageUrl() }}">&raquo;</a></li>
                    </ul>
                </div>
                </section>
@endsection