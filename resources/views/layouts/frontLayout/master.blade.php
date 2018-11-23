<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    @include('layouts.frontLayout.inc.style')
    @yield('title')
    <link rel="shortcut icon" href="https://png.icons8.com/color/50/000000/icons8-logo.png" type="image/x-icon"> {{--
    <title>Home | E-Shopper</title> --}}

</head>

<!--/head-->

<body>
    <!--header-->
    @include('layouts.frontLayout.header')
    <!--/header-->
    <!--content-->
    @yield('content')
    <!--/content-->
    

    <!--Footer-->
    @include('layouts.frontLayout.footer')
    <!--/Footer-->



    @include('layouts.frontLayout.inc.script')
</body>

</html>
