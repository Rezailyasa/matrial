@php
use App\Models\Data_absen;
use App\Models\Setting_jadwal_absen;
@endphp
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/vendors/css/vendors.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css"
    href="{{asset('/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/colors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/components.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/themes/dark-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/themes/bordered-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/themes/semi-dark-layout.min.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/core/menu/menu-types/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/plugins/forms/pickers/form-flat-pickr.min.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
    <!-- END: Custom CSS-->
</head>

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static   menu-collapsed"
    data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Not authorized-->
                <div class="misc-wrapper">
                    <a class="brand-logo" href="javascript:void(0);">
                        <div class="row mx-4 mt-4">
                            <img class="" src="{{ asset('/images/logo/logosmk.png') }}" height="40" width="40">
                            <h2 class="brand-text text-primary ml-1 mt-50 font-weight-bolder">UD CIPTA INDAH</h2>
                        </div>
                    </a>
                    <div class="misc-inner p-2 p-sm-3">
                        <div class="w-100 text-center">
                            <h2 class="mb-1">Hallo {{ $user->name }}, Akun kamu tidak bisa di gunakan! 🔐</h2>
                            <p class="mb-2">
                                Untuk mengaktifkan akun kamu silahkan hubungi UD CIPTA INDAH.
                            </p>
                            <a class="btn btn-primary mb-1 btn-sm-block" href="/logout">Back to login</a>
                            <img class="img-fluid" src="{{ asset('/images/pages/not-authorized.svg') }}"
                                alt="Not authorized page">
                        </div>
                    </div>
                </div>
                <!-- / Not authorized-->
            </div>
        </div>
    </div>
    <!-- BEGIN: Vendor JS-->

    {{-- <script src="{{asset('/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('/vendors/js/tables/datatable/responsive.bootstrap4.js')}}"></script> --}}
    <script src="{{ asset('/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->

    {{-- <script src="{{asset('/js/scripts/tables/table-datatables-advanced.min.js')}}"></script> --}}
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('/js/core/app.min.js') }}"></script>
    <script src="{{ asset('/js/scripts/customizer.min.js') }}"></script>
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
</body>
<!-- END: Body-->

</html>
