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