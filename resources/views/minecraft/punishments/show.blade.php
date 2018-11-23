@extends('layouts.general')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{$punishmentstitle}</h3>

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
                            <td>{{ $punishment->time }}</td>
                            <td><a href="{{ route('minecraftSpecificPlayer', ['uuid' => $punishment->uuid ]) }}" class="btn btn-primary">View Player</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                        </tfoot>
                    </table>
                </div>

                </section>
@endsection