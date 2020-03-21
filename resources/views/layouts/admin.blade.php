<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TAS - @yield('title')</title>

	<!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

	<!-- Styles -->
    <link href="{{ asset('asset') }}/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('asset') }}/css/lib/themify-icons.css" rel="stylesheet">
    <link href="{{ asset('asset') }}/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="{{ asset('asset') }}/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="{{ asset('asset') }}/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="{{ asset('asset') }}/css/lib/mmc-chat.css" rel="stylesheet" />
    <link href="{{ asset('asset') }}/css/lib/sidebar.css" rel="stylesheet">
    <link href="{{ asset('asset') }}/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('asset') }}/css/lib/simdahs.css" rel="stylesheet">
    <link href="{{ asset('asset') }}/css/style.css" rel="stylesheet">

    <style>
        thead tr th:last-child {
            text-align: left;
        }

        tbody tr td:last-child {
            text-align: left;
        }
    </style>


</head>

<body>

    @include('includes.side_menu')

    @include('includes.header')

    @include('includes.chat_sidebar')

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>@yield('page-name')</h1>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-4 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">@yield('page-name')</a></li>
                                    <li class="active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div><!-- /# row -->
                <div class="main-content">

                        @yield('content')

				</div><!-- /# main content -->
            </div><!-- /# container-fluid -->
        </div><!-- /# main -->

        @include('includes.footer')

    </div><!-- /# content wrap -->

    <script src="{{ asset('asset') }}/js/lib/jquery.min.js"></script><!-- jquery vendor -->
    <script src="{{ asset('asset') }}/js/lib/jquery.nanoscroller.min.js"></script><!-- nano scroller -->
    <script src="{{ asset('asset') }}/js/lib/sidebar.js"></script><!-- sidebar -->
    <script src="{{ asset('asset') }}/js/lib/bootstrap.min.js"></script><!-- bootstrap -->
    <script src="{{ asset('asset') }}/js/lib/mmc-common.js"></script>
    <script src="{{ asset('asset') }}/js/lib/mmc-chat.js"></script>
	<!--  Chart js -->
	<script src="{{ asset('asset') }}/js/lib/chart-js/Chart.bundle.js"></script>
	<script src="{{ asset('asset') }}/js/lib/chart-js/chartjs-init.js"></script>
	<!-- // Chart js -->


    <script src="{{ asset('asset') }}/js/lib/sparklinechart/jquery.sparkline.min.js"></script><!-- scripit init-->
    <script src="{{ asset('asset') }}/js/lib/sparklinechart/sparkline.init.js"></script><!-- scripit init-->

	<!--  Datamap -->
    <script src="{{ asset('asset') }}/js/lib/datamap/d3.min.js"></script>
    <script src="{{ asset('asset') }}/js/lib/datamap/topojson.js"></script>
    <script src="{{ asset('asset') }}/js/lib/datamap/datamaps.world.min.js"></script>
    <script src="{{ asset('asset') }}/js/lib/datamap/datamap-init.js"></script>
	<!-- // Datamap -->-->
    <script src="{{ asset('asset') }}/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="{{ asset('asset') }}/js/lib/weather/weather-init.js"></script>
    <script src="{{ asset('asset') }}/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="{{ asset('asset') }}/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="{{ asset('asset') }}/js/scripts.js"></script><!-- scripit init-->
</body>

</html>
