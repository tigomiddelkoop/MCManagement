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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>

    <script>
        var visitorsData = {
        @foreach($regions as $region) {{ $region["country"] }}: {{ $region["amount"] }},@endforeach
        }
        ;

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
    <script>
        var ctx = document.getElementById("playerRegionBars");

        let chart = new Chart(ctx, {
            type: 'horizontalBar',
            data: {
                {{--labels: [@foreach($regions as $region) "{{ App\Http\Controllers\Tools\CountryController::convert($region["country"]) }}", @endforeach],--}}
                labels: [@foreach($regions as $region) " {{$region["country"] }}", @endforeach],
                datasets: [{
                    data: [@foreach($regions as $region) {{ $region["amount"] }}, @endforeach],
                    // backgroundColor: [
                    //     'rgba(255, 99, 132, 1)',
                    //     'rgba(54, 162, 235, 1)',
                    //     'rgba(255, 206, 86, 1)',
                    //     'rgba(75, 192, 192, 1)',
                    //     'rgba(153, 102, 255, 1)',
                    //     'rgba(255, 159, 64, 1)'

                    // ],
                }],
            },
            options: {
                scaleFontColor: 'red',
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                },
                legend: {
                    display: false,
                    boxWidth: 80,
                },
                tooltips: {
                    enabled: true
                }
            }
        });
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="box box-default">
                <div class="box-header with-border">

                    <h3 class="box-title">
                        Player Regions Bars
                    </h3>
                </div>
                <div class="box-body no-padding">
                    <canvas id="playerRegionBars" style="height: 500px; width: 100%;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box box-solid bg-purple-gradient">
                <div class="box-header">

                    <i class="fa fa-map-marker"></i>

                    <h3 class="box-title">
                        Player Regions Map
                    </h3>
                </div>
                <div class="box-body no-padding">
                    <div id="world-map" style="height: 500px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
@endsection