@extends('layouts.general')


<?php use App\Http\Controllers\Tools\FormSelectSelectedController; ?>

@section('pagetitle')
    Editting Announcement
@endsection

@section('pagedescription')
    Currently editting: {{ $announcement->id }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        Editting Announcement: {{ $announcement->id }}
                    </h3>
                </div>
                <div class="box-body">

                    {{--These are for me to quicklty get the variables--}}
                    {{--{{ $announcement->id }}--}}
                    {{--{{ $announcement->type }}--}}
                    {{--{{ $announcement->message }}--}}
                    {{--{{ $announcement->server }}--}}
                    {{--{{ $announcement->active }}--}}

                    <form action="{{ route('networkmanagerAnnouncementsUpdate', ['id' => $announcement->id ]) }}"
                          method="post">
                        @csrf

                        <label for="type">Announcement Type:</label>
                        <select name="type"  class="form-control">
                            <option {{ FormSelectSelectedController::selected(1, $announcement->type ) }} value="1">[Chat] All Servers</option>
                            <option {{ FormSelectSelectedController::selected(2, $announcement->type ) }} value="2">[Chat] Only specified Servers</option>
                            <option {{ FormSelectSelectedController::selected(3, $announcement->type ) }} value="3">[Chat] All Servers except the servers specified</option>
                            <option {{ FormSelectSelectedController::selected(4, $announcement->type ) }} value="4">[ActionBar] All Servers</option>
                            <option {{ FormSelectSelectedController::selected(5, $announcement->type ) }} value="5">[ActionBar] Only specified Servers</option>
                            <option {{ FormSelectSelectedController::selected(6, $announcement->type ) }} value="6">[ActionBar] All Servers except the servers specified</option>
                            <option {{ FormSelectSelectedController::selected(7, $announcement->type ) }} value="7">[Title] All Servers</option>
                            <option {{ FormSelectSelectedController::selected(8, $announcement->type ) }} value="8">[Title] Only specified Servers</option>
                            <option {{ FormSelectSelectedController::selected(9, $announcement->type ) }} value="9">[Title] All Servers except the servers specified</option>
                        </select>

                        <br />

                        <label for="message">Announcement Message:</label>
                        <textarea type="text" name="message" id="message"
                                  class="form-control">{{ $announcement->message }}</textarea>

                        <br/>

                        <label for="server">Server:</label>
                        <input type="text" class="form-control" name="server" id="server"
                               value="{{ $announcement->server }}">

                        <br/>

                        <label for="active">Active:</label>

                        @switch($announcement->active)

                            @case(0) <input type="checkbox" name="active" id="active"> @break
                            @case(1) <input type="checkbox" name="active" id="active" checked> @break


                    @endswitch
                </div>
                <div class="box-footer">
                    <input class="btn btn-primary" type="submit" value="Save">
                </div>
                </form>
            </div>

        </div>
    </div>
    </div>
@endsection