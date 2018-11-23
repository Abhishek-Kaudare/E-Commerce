<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Commerce</title>
    <link rel="shortcut icon" href="https://png.icons8.com/color/50/000000/icons8-logo.png" type="image/x-icon">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    @yield('styles')
</head>

<body>
    {{-- header --}}
    @include('layouts.adminLayout.header')
    {{-- header --}}
    <!--sidebar-menu-->

    <!--sidebar-menu-->
    @include('layouts.adminLayout.sidebar')

    @yield('content')


    <!--Footer-part-->

    @include('layouts.adminLayout.footer')

    <!--end-Footer-part-->
    {{-- script --}}
    @yield('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


    <!-- <script>
        var nav = document.getElementById('nav'),
        anchor = nav.getElementsByTagName('a'),
        current = window.location.pathname.split('/')[1];
        for (var i = 0; i < anchor.length; i++) {
            if (anchor[i].href == current) {
                anchor[i].className = "active";
            }
        }

    </script> -->
    {{-- script --}}
</body>

</html>
