@extends('layouts.general')

@section('pagetitle')
    Creating Announcement
@endsection

@section('pagedescription')
    Add an announcement to the network.
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        Creating announcement
                    </h3>
                </div>
                <div class="box-body">

                    {{--These are for me to quicklty get the variables--}}
                    {{--{{ $announcement->id }}--}}
                    {{--{{ $announcement->type }}--}}
                    {{--{{ $announcement->message }}--}}
                    {{--{{ $announcement->server }}--}}
                    {{--{{ $announcement->active }}--}}

                    <form action="{{ route('networkmanagerAnnouncementsCreate') }}"
                          method="post">
                        @csrf
                        <label for="type">Announcement Type:</label>
                        <select name="type" class="form-control">
                            <option value="1">[Chat] All Servers</option>
                            <option value="2">[Chat] Only specified Servers</option>
                            <option value="3">[Chat] All Servers except the servers specified</option>
                            <option value="4">[ActionBar] All Servers</option>
                            <option value="5">[ActionBar] Only specified Servers</option>
                            <option value="6">[ActionBar] All Servers except the servers specified</option>
                            <option value="7">[Title] All Servers</option>
                            <option value="8">[Title] Only specified Servers</option>
                            <option value="9">[Title] All Servers except the servers specified</option>
                        </select>

                        <br/>

                        <label for="message">Announcement Message:</label>
                        <textarea type="text" name="message" id="message"
                                  class="form-control" value="{{ old('message') }}"></textarea>

                        <br/>

                        <label for="server">Server:</label>
                        <input type="text" class="form-control" name="server" id="server" value="{{ old('server') }}">

                        <br/>

                        <label for="active">Active:</label>

                            <input type="checkbox" name="active" id="active" >

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