@extends('layouts.general')

@section('pagetitle', 'Editing Changelog entry')
@section('pagedescription', 'Currently editing: ' . $changelog['serverversion'])

@section('requiredJS')
    <script src="{{ asset('js/changelog.js') }}">

    </script>
@endsection

@section('content')

    <div class="row">
        <form action="{{ route('changelogUpdate', ['id' => $changelog['id']]) }}" method="post">
            @csrf
            <div class="col-md-3">
                <div class="box">
                    <div class="box-header with-border">

                        <h3 class="box-title">Changelog Info</h3>
                        <input type="submit">


                    </div>
                </div>
            </div>
            @foreach($changelog['changelog'] as $dataChangelog)
                <div class="col-md-3">
                    <div class="box">
                        <div class="box-header with-border">

                            <h3 class="box-title">{{ $dataChangelog['section'] }}</h3>

                        </div>
                        <div class="box-body">
                            {{--<input type="text" class="form-control" value="{{ $dataChangelog['section'] }}">--}}
                            <label for="entries">Entries</label>
                            <div id="{{ $dataChangelog['section'] }}">
                                @foreach($dataChangelog['data'] as $data)
                                    <div class="input-group" id="{{ $data }}" name="entries">
                                        <input type="text" class="form-control" value="{{ $data }}"
                                               name="{{ $dataChangelog['section'] }}[]">
                                        <span class="input-group-btn">
                                            <button type="button" id="{{ $data }}" class="btn btn-danger btn-flat"
                                                    title="Remove the entry" onclick="removeEntry('{{ $data }}')">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                            <br/>

                            <label for="add">Add an entry</label>
                            <div class="input-group" name="add">
                                <input type="text" id="{{ $dataChangelog['section'] }}NEW" class="form-control">
                                <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat"
                                                onclick="addEntry('{{ $dataChangelog['section'] }}')">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </span>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">

                        <h3 class="box-title">Add Section</h3>

                    </div>
                    <div class="box-body">
                        <div class="input-group" name="add">
                            <input type="text" id="addSection" class="form-control"
                                   placeholder="Type in the name of the new section">
                            <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat"
                                                onclick="addSection()">
                                            <i class="fa fa-plus"></i>
                                        </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
