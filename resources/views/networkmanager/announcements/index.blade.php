<?php use \App\Http\Controllers\Tools\CountryController; ?>

@extends('layouts.general')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Announcements</h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search"
                                   id="search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default" id="submit_search"><i
                                            class="fa fa-search"></i></button>
                                <!--                                        <button type="submit" class="btn btn-default btn" id="submit_search"><i class="reset">Reset View</i></button>-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <thead>
                            <th style="width: 25px;">ID</th>
                            <th>Type</th>
                            <th>Message</th>
                            <th>Servers</th>
                            <th>Active</th>
                            <th></th>
                            </thead>
                        </tr>
                        <tbody id="players">
                        @foreach($announcements as $announcement)
                            <tr>
                                <td>{{ $announcement->id }}</td>
                                <td>{{ $announcement->type }}</td>
                                <td>{{ $announcement->message }}</td>
                                <td>{{ $announcement->server }}</td>
                                <td>
                                    @switch($announcement->active)
                                        @case(0) <span class="label label-danger">No</span> @break
                                        @case(1) <span class="label label-success">Yes</span> @break
                                        @default <span class="label label-info">Unknown Value</span> @break
                                    @endswitch
                                </td>
                                <td>
                                    <a href="{{ route('networkmanagerAnnouncementsEdit', ['id' => $announcement->id]) }}"
                                       class="btn btn-xs btn-block btn-primary">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a href="{{ $announcements->previousPageUrl() }}">&laquo;</a></li>
                        @for($x = 1; $x <= $announcements->lastPage(); $x++)
                            @if($x === $announcements->currentPage())
                                <li><a href="{{ $announcements->url($x) }}" class="paginate_button active">{{ $x }}</a></li>
                            @else
                                <li><a href="{{ $announcements->url($x) }}" class="paginate_button">{{ $x }}</a></li>
                            @endif
                        @endfor
                        <li><a href="{{ $announcements->nextPageUrl() }}">&raquo;</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection