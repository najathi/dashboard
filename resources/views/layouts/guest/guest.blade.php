<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>SLBI - @yield('title')</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    @include('layouts.guest.stylesheets')

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="60">


<!-- HK Wrapper -->
<div class="hk-wrapper hk-alt-nav hk-landing">
    <!-- Top Navbar -->
    @include('layouts.guest.navbar')
    <!-- /Top Navbar -->

    <!-- Main Content -->
    <div class="hk-pg-wrapper">
        <!-- Container -->
        <div class="container">
            <section class="hk-landing-sec pb-0">
                @yield('content')
            </section>
        </div>
        <!-- /Container -->
        <!-- Footer -->
        @include('layouts.guest.footer')
        <!-- /Footer -->
    </div>
    <!-- /Main Content -->

</div>
<!-- /HK Wrapper -->

@include('layouts.guest.scripts')
@yield('scripts')
</body>

</html>
