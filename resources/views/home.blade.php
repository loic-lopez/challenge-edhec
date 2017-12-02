@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <script src="/assets/plugins/gridstack/lodash.js"></script>
        <script src="/assets/plugins/jquery/jquery.min.js"></script>
        <style>
            .tweet {
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                margin-bottom: 20px;
            }
        </style>
        <script>

            function getData() {
                $.get( "/data/get", function( data ) {
                    $("#temp_value").html(data.temperature + "<sup> °C</sup>");
                    $("#humidity_value").html(data.humidity + "<label>%</label>");
                    $("#time_value").html(data.time);
                    $("#date_value").html(data.date);
                });
            }
            getData();
            setInterval(getData, 3000);
            (function(w,d,t,f){  w[f]=w[f]||function(c,k,n){s=w[f],k=s['k']=(s['k']||(k?('&k='+k):''));s['c']=
                c=(c  instanceof  Array)?c:[c];s['n']=n=n||0;L=d.createElement(t),e=d.getElementsByTagName(t)[0];
                L.async=1;L.src='//feed.aqicn.org/feed/'+(c[n].city)+'/'+(c[n].lang||'')+'/feed.v1.js?n='+n+k;
                e.parentNode.insertBefore(L,e);  };  })(  window,document,'script','_aqiFeed'  );
        </script>
        <!-- Row -->
        <div class="row page-titles"></div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <style>
                .col-md-12 {
                    white-space: nowrap !important;
                    max-width: 100%;
                    overflow: auto;
                }
            </style>
            <!-- Row -->
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">@lang('general.air_quality')</h4>
                        </div>
                        <div class="card-body">
                            <hr>
                            <div class="col-md-12">
                                <div  id='my-container' class="text-center"></div>
                            </div>
                            <script  type="text/javascript"  charset="utf-8">
                                _aqiFeed({  city:"{{ \Illuminate\Support\Facades\Auth::user()->city_name }}",
                                    lang:"{{ app()->getLocale() }}",  callback:function(aqi){
                                        $("#my-container").html(aqi.details);
                                    }});
                            </script>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">@lang('general.weather')</h4>
                            <label>@lang('general.signboard')</label>
                            <hr>
                            <div class="col-md-12">
                                <h4><b>@lang('general.temperature')</b> <label id="temp_value"></label></h4>
                            </div>
                            <div class="col-md-12">
                                <h4><b>@lang('general.humidity')</b> <label id="humidity_value"></label></h4>
                            </div>
                            <div class="col-md-12">
                                <h4><b>@lang('general.time')</b> <label id="time_value"></label></h4>
                            </div>
                            <div class="col-md-12">
                                <h4><b>@lang('general.date')</b> <label id="date_value"></label></h4>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">@lang('general.Twitter.feed')</h4>
                            <ul class="feeds" id="tweeter-feed">
                                <hr>
                                @if (empty($tweets))
                                    <h4>@lang('general.twitter.error')</h4>
                                @endif
                                @foreach($tweets as $tweet)
                                    <div class="tweet row">
                                        <div class="col-xs-8">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img class="img-thumbnail media-object" src="{{ $tweet->user->profile_image_url_https }}" alt="Avatar">
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">{{ '@' . $tweet->user->screen_name }}</h4>
                                                    <p>{{ $tweet->text }}</p>
                                                    <p><a target="_blank" href="https://twitter.com/{{ $tweet->user->screen_name }}/status/{{ $tweet->id }}">
                                                            View on Twitter
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">@lang('general.Twitter.add.tweet')</h4>
                        </div>
                        <div class="card-body">
                            <hr>
                            <table class="table no-border lite-padding">
                                <tbody>
                                <tr>
                                    @if (empty($tweets))
                                        <h4>@lang('general.twitter.error')</h4>
                                    @else
                                        <form class="form-horizontal form-material" action="/twitter/tweet" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label class="col-md-12">@lang('general.Twitter.tweet.description')</label>
                                                <div class="col-md-12">
                                                    <input type="text" required=required name="tweet" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">@lang('general.Twitter.tweet')</button>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
                                </tr>
                                </tbody>
                            </table>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row -->
            <!-- Row -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer"> © 2017 {{ config('app.name') }} </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
@endsection
