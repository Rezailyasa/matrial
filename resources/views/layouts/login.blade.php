<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="SIDU Sistem Informasi Terpadu SMK Bina Cendekia Cirebon">
    <meta name="keywords" content="Sekolah, smk, sekolah menengah">
    <meta name="author" content="Sunset Orange">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{ asset('/images/logo/logosmk.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/images/logo/logosmk.png') }}">
    <link href="../../../../../css2.css?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    @stack('css')
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static   menu-collapsed"
    data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    @if (session('status'))
        <div class="toast toast-basic position-fixed fade show" id="toast" role="status" aria-live="polite"
            aria-atomic="true" data-delay="1000" style="top: 1rem; right: 1rem;" data-autohide="true">
            <div class="toast-header">
                <img src="{{ asset('/images/logo/logosmk.png') }}" class="mr-1" alt="Toast image" height="25"
                    width="25">
                <strong class="mr-5">
                    @if ($user->name ?? '')
                        {{ $user->name }}
                    @else
                        UD CIPTA INDAH
                    @endif
                </strong>
                <small class="text-muted ml-5">0 mins ago</small>
                <button type="button" onclick="myFunction()" class=" ml-1 close" data-dismiss="toast"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                <div class="badge badge-pill badge-light-{{ session('warna') }}">{{ session('status') }}
                </div>
            </div>
        </div>
    @endif
    @yield('content')

    @stack('script')

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    <script>
        function myFunction() {
            var x = document.getElementById("toast");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
</body>

</html>
