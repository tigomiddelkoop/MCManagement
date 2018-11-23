@extends('layouts.general')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Players</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search"
                                   id="search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default" id="submit_search"><i
                                            class="fa fa-search"></i></button>
                                <!--                                        <button type="submit" class="btn btn-default btn" id="submit_search"><i class="reset">Reset View</i></button>-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="table table-responsive no-padding">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <thead>
                            <th>Playername</th>
                            <th>UUID</th>
                            <th>Country</th>
                            <th>Online</th>
                            <th>View</th>
                            </thead>
                        </tr>
                        <tbody id="players">
                        {foreach from=$playerList item=player}
                        <tr>
                            <td>{$player['playername']}</td>
                            <td>{$player['uuid']}</td>
                            <td>{$player['country']}</td>
                            <td>
                                {if $player['online'] == 1}
                                <span class="label label-success">Yes</span>
                                {elseif $player['online'] == 0}
                                <span class="label label-danger">No</span>
                                {else}
                                <span class="label label-info">Unknown Value</span>
                                {/if}
                            </td>
                            <td>
                                <form action="index.php?page=minecraft_playerinfo" method="post"><input type="hidden"
                                                                                                        name="player"
                                                                                                        value="{$player['uuid']}"><input
                                            type="submit" class="btn btn-block btn-primary" value="View"></form>
                            </td>
                        </tr>
                        {/foreach}


                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
@endsection