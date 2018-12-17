@extends('layouts.general')
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

                    These are for me to quicklty get the variables
                    {{ $announcement->id }}
                    {{ $announcement->type }}
                    {{ $announcement->message }}
                    {{ $announcement->server }}
                    {{ $announcement->active }}

                    <form action="{{ route('networkmanagerAnnouncementsUpdate', ['id' => $announcement->id ]) }}" method="post">
                        <label for="message">Announcement Message:</label>
                        <textarea type="text" name="message" id="message" class="form-control">{{ $announcement->message }}</textarea>

                        <br />

                        <label for="server">Server:</label>
                        <input type="text" class="form-control" name="server" id="server" value="{{ $announcement->server }}">

                        <br />

                        <label for="active">Active:</label>

                        @switch($announcement->active)

                            @case(0) <input type="checkbox" name="active" id="active"> @break
                            @case(1) <input type="checkbox" name="active" id="active" checked> @break


                        @endswitch
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection