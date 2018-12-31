@extends('layouts.general')

@section('pagetitle', 'NetworkManager Settings')
@section('pagedescription', 'Manage your NetworkManager Settings')
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

        @if(!isset($infoMessage))
            <div class="col-md-12">
                <div class="info-box">
                    <!-- Apply any bg-* class to to the icon to color it -->
                    <span class="info-box-icon bg-red"><i class="fa fa-exclamation-circle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-number">WARNING</span>
                        <span class="info-box-number">Saving settings can be heavy on your database! This will be resolved!</span>
                    </div>
                </div>
                <!-- /.info-box-content -->
            </div>
        @endif
        <div class="col-md-12">
            <form method="post" action="{{ route('networkmanagerSettingsUpdate') }}">
                @csrf
                <div class="box">
                    <div class="box-header with-border">

                        <h3 class="box-title">NetworkManager Settings</h3>

                        <div class="box-tools">
                            <input type="submit" class="btn btn-sm btn-primary" value="Save">
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
                                                    <input type="hidden" value="{{ $nmSetting['settingTotalName'] }}"
                                                           name="setting{{ $nmSetting['settingTotalName'] }}[setting]">
                                                    <input type="text" class="form-control"
                                                           value="{{ $nmSetting['value'] }}"
                                                           name="setting{{ $nmSetting['settingTotalName'] }}[value]">
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
                                                <td>
                                                    <input type="hidden" value="{{ $nmSetting['settingTotalName'] }}"
                                                           name="setting{{ $nmSetting['settingTotalName'] }}[setting]">
                                                    <input type="text" class="form-control"
                                                           value="{{ $nmSetting['value'] }}"
                                                           name="setting{{ $nmSetting['settingTotalName'] }}[value]">
                                                </td>
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
                                                <td>
                                                    <input type="hidden" value="{{ $nmSetting['settingTotalName'] }}"
                                                           name="setting{{ $nmSetting['settingTotalName'] }}[setting]">
                                                    <input type="text" class="form-control"
                                                           value="{{ $nmSetting['value'] }}"
                                                           name="setting{{ $nmSetting['settingTotalName'] }}[value]">
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection