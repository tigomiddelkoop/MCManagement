@extends('layouts.general')

@section('pagetitle')
    Analytics
@endsection

@section('pagedescription')
    Andvanced Analytics about your server
@endsection

@section('requiredCSS')
    <link rel="stylesheet" href="{{ url('/') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
@endsection

@section('requiredJS')
    <!-- jvectormap -->
    <script src="{{ url('/') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{ url('/') }}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script>
        var visitorsData = {
            US: 398, // USA
            SA: 400, // Saudi Arabia
            CA: 1000, // Canada
            DE: 500, // Germany
            FR: 760, // France
            CN: 300, // China
            AU: 700, // Australia
            BR: 600, // Brazil
            IN: 800, // India
            GB: 320, // Great Britain
            RU: 3000 // Russia
        };

        $('#world-map').vectorMap({
            map: 'world_mill_en',
            backgroundColor: 'transparent',
            regionStyle: {
                initial: {
                    fill: '#e4e4e4',
                    'fill-opacity': 1,
                    stroke: 'none',
                    'stroke-width': 0,
                    'stroke-opacity': 1
                }
            },
            series: {
                regions: [
                    {
                        values: visitorsData,
                        scale: ['#92c1dc', '#ebf4f9'],
                        normalizeFunction: 'polynomial'
                    }
                ]
            },
            onRegionLabelShow: function (e, el, code) {
                if (typeof visitorsData[code] != 'undefined')
                    el.html(el.html() + ': ' + visitorsData[code] + ' players');
            }
        });
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-solid bg-purple-gradient">
            {{--<div class="box box-default">--}}
            <div class="box-header">

                    <i class="fa fa-map-marker"></i>

                    <h3 class="box-title">
                        Player Regions
                    </h3>
                </div>
                {{--<div class="col-md-4">--}}
                    <div class="box-body">
                        <div id="world-map" style="height: 250px; width: 100%;"></div>
                    </div>
                {{--</div>--}}
            </div>
        </div>
    </div>
    </div>
@endsection