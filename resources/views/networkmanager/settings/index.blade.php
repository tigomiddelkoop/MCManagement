@extends('layouts.general')

@section('pagetitle', 'NetworkManager Settings')
@section('pagedescription', 'Manage your NetworkManager Settings')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">

                    <h3 class="box-title">NetworkManager Settings</h3>

                    <div class="box-tools">
                        <a class="btn btn-sm btn-primary">Save</a>
                        <div class="btn-group">
                            <a href="#modules" class="btn btn-sm btn-default active" data-toggle="tab">Modules</a>
                            <a href="#commands" class="btn btn-sm btn-default" data-toggle="tab">Commands</a>
                            <a href="#settings" class="btn btn-sm btn-default" data-toggle="tab">Settings</a>
                        </div>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <div class="tab-content">
                        <div class="tab-pane active" id="modules">
                            <table class="table table-hover">
                                <thead>
                                <th>Setting</th>
                                <th>Value</th>
                                </thead>
                                @foreach($nmSettings as $nmSetting)
                                    @if($nmSetting['category'] == "module")
                                        <tr>
                                            <td>{{ $nmSetting['setting'] }}</td>
                                            <td>

                                                @if($nmSetting['value'])
                                                    <input type="checkbox" checked
                                                           name="{{ $nmSetting['settingTotalName'] }}">
                                                @else
                                                    <input type="checkbox"
                                                           name="{{ $nmSetting['settingTotalName'] }}">
                                                @endif

                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="commands">
                            <table class="table table-hover">
                                <thead>
                                <th>Setting</th>
                                <th>Value</th>
                                </thead>
                                @foreach($nmSettings as $nmSetting)
                                    @if($nmSetting['category'] == "command")
                                        <tr>
                                            <td>{{ $nmSetting['setting'] }}</td>
                                            <td>{{ $nmSetting['value'] }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="settings">
                            <table class="table table-hover">
                                <thead>
                                <th>Setting</th>
                                <th>Value</th>
                                </thead>
                                @foreach($nmSettings as $nmSetting)
                                    @if($nmSetting['category'] == "setting")
                                        <tr>
                                            <td>{{ $nmSetting['setting'] }}</td>
                                            <td>{{ $nmSetting['value'] }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection