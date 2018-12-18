@extends('layouts.general')

@section('pagetitle')
    User info
@endsection

@section('pagedescription')
    Reviewing user: {{ $user->name }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="box box-default">
                <div class="box-header with-border">

                    <h3 class="box-title">User Skin</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <img class="center-block"
                         src="https://crafatar.com/renders/body/{{ $user->mc_uuid }}?overlay">
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">

                    <h3 class="box-title">User info</h3>

                </div>
                <div class="box-body no-padding">
                    <table class="table">
                        <tr>
                            <td>Username</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td>Useruuid</td>
                            <td>{{ $user->mc_uuid }}</td>
                        </tr>
                        <tr>
                            <td>Role</td>
                            <td>{{ $user->name343443 }}</td>
                        </tr>
                        <tr>
                            <td>User created at</td>
                            <td>{{ $user->created_at }}</td>
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
                        <tr>
                            <td>&nbsp</td>
                            <td>&nbsp</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection