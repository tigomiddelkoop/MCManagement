@extends('layouts.general')

@section('pagetitle', 'Editing role')

@section('pagedescription', 'Are you editing a role?')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header">

                    <h3 class="box-title">Editing role</h3>

                </div>
                <div class="box-body">
                    <form action="{{ route('panelSettingsRoleUpdate', ['id' => $id]) }}" method="post">
                        @foreach($permissions as $permission)
                            <a>{{ $permission['name'] }}</a>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection