@extends('layouts.general')

@section('pagetitle')
    Changelog
@endsection

@section('pagedescription')
    All the changes in this changelog
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">

                    <h3 class="box-title">Changelog entries</h3>

                </div>
                <div class="box-body no-padding">
                    <table class="table table-striped no-padding">
                        <thead>
                        <td>Server Version</td>
                        <td>Minecraft Version</td>
                        <td>Released</td>
                        <td></td>
                        </thead>
                        @foreach($changelog as $data)
                            <tr>
                                <td>{{ $data->serverversion }}</td>
                                <td>{{ $data->minecraftversion }}</td>
                                <td>
                                    @switch($data->released)
                                        @case(1) <a class="label label-success">Yes</a> @break
                                        @case(0) <a class="label label-danger">No</a> @break
                                        @default <a class="label label-warning">Unknown, check entry</a> @break
                                    @endswitch
                                </td>
                                <td>
                                        <form action="{{ route('changelogDestroy', ['id' => $data->id]) }}" method="post" class="btn-group">
                                            @method('delete')
                                            @csrf
                                            <a href="{{ route('changelogEdit', ['id' => $data->id ]) }}"
                                               class="btn btn-primary btn-xs">Edit</a>

                                            <button type="submit" class="btn btn-xs btn-danger" value="Remove">Remove</button>

                                        </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection