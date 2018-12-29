@extends('layouts.general')

@section('pagetitle', 'Add a Server Group')
@section('pagedescription', 'Add a server group to your Network')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('networkmanagerServerStoreServerGroup') }}">
                <div class="box box-default">
                    <div class="box-header with-border">

                        <h3 class="box-title">Add a Server Group</h3>

                        <div class="box-tools">
                            <input type="submit" class="btn btn-primary btn-sm" value="Save Server Group">
                        </div>

                    </div>
                    <div class="box-body">
                        @csrf
                        <label for="groupname">Server Group Name</label>
                        <input name="groupname" type="text" class="form-control">
                        <br/>
                        <label for="serverids">Server IDs</label>
                        <input name="serverids" type="text" class="form-control">

                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary btn-sm" value="Save Server Group">

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection