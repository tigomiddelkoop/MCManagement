<?php use \App\Http\Controllers\Tools\CountryController; ?>

@extends('layouts.general')

@section('pagetitle')
    All Announcements
@endsection

@section('pagedescription')
    A list of all your announcements
@endsection

<?php
if (session()->has('infoMessage')) {
$infoMessage = session('infoMessage');
}
?>

@section('content')
    <div class="row">
        @if(isset($infoMessage))
            <div class="col-md-12">
                <div class="info-box">
                    <!-- Apply any bg-* class to to the icon to color it -->
                    @switch($infoMessage['code'])
                        @case(0) <span class="info-box-icon bg-red"><i
                                    class="fa fa-exclamation-circle"></i></span> @break
                        @case(1) <span class="info-box-icon bg-green"><i class="fa fa-check-circle"></i></span> @break
                    @endswitch
                    <div class="info-box-content">
                        @switch($infoMessage['code'])
                            @case(0) <span class="info-box-number">Failed</span> @break
                            @case(1) <span class="info-box-number">Success</span> @break
                        @endswitch
                        <span class="info-box-number">{{ $infoMessage['message'] }}</span>
                    </div>
                </div>
            </div>
        @endif

        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Announcements</h3>
                    <div class="box-tools">
                        <a href="{{ route('networkmanagerAnnouncementsCreate') }}" class="btn btn-primary btn-sm">Create
                            Announcement</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <th style="width: 25px;">ID</th>
                        <th>Type</th>
                        <th>Message</th>
                        <th>Servers</th>
                        <th>Active</th>
                        <th></th>
                        </thead>
                        <tbody id="players">
                        @foreach($announcements as $announcement)
                            <tr>
                                <td>{{ $announcement->id }}</td>
                                <td>
                                    @switch($announcement->type)

                                        @case(1)[Chat] All Servers @break
                                        @case(2)[Chat] Only specified Servers @break
                                        @case(3)[Chat] All Servers except the servers specified @break
                                        @case(4)[ActionBar] All Servers @break
                                        @case(5)[ActionBar] Only specified Servers @break
                                        @case(6)[ActionBar] All Servers except the servers specified @break
                                        @case(7)[Title] All Servers @break
                                        @case(8)[Title] Only specified Servers @break
                                        @case(9)[Title] All Servers except the servers specified @break

                                    @endswitch
                                </td>
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
                                       class="btn btn-xs btn-block btn-primary">Edit</a>
                                    <form action="{{ route('networkmanagerAnnouncementsDelete', ['id' => $announcement->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-danger btn-xs" value="Delete">
                                    </form>
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
                                <li><a href="{{ $announcements->url($x) }}" class="paginate_button active">{{ $x }}</a>
                                </li>
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