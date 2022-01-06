@php
use App\Models\User;
@endphp

@extends('layouts.app3')
@push('css')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/vendors/css/forms/wizard/bs-stepper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/vendors/css/forms/select/select2.min.css') }}">
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
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/plugins/forms/form-wizard.min.css') }}">
@endpush
@section('content')
<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow">
        </div>
        <div class="content-wrapper">
        <div class="row">
            <div class="col">
                <img src="{{ asset('/images/welcome.png') }}" class="mr-1" alt="Welcome Image" height="400"
                width="700">
            </div>
            <div class="col">
                <div class="content-body">
                    {{-- <div class="row">
                        <div class="col-12">
                            <div class="alert alert-primary" role="alert">
                                <div class="alert-body"><strong>Info:</strong> Please check the&nbsp;<a class="text-primary"
                                        href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation/documentation-layout-without-menu.html"
                                        target="_blank">Layout without menu documentation</a>&nbsp; for more details.</div>
                            </div>
                        </div>
                    </div><!-- Dashboard Ecommerce Starts --> --}}
                    <section id="dashboard-ecommerce">
                        <div class="pricing-free-trial">
                            <img src="{{ asset('/images/logo/logosmk.png') }}" height="100" width="100">
                            <h1 class="brand-text">UD CIPTA INDAH</h1>
                        </div>
                        <br><br><br><br>
                        <div class="pricing-free-trial">
                            <h1 class="brand-text">S.E.L.A.M.A.T~~~D.A.T.A.N.G</h1>
                        </div>
                    </section>
                    <!-- Dashboard Ecommerce ends -->

                </div>
            </div>
        </div>
        </div>
    </div>
@endsection


@push('script')


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>
    <script src="{{ asset('/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('/js/core/app.min.js') }}"></script>
    <script src="{{ asset('/js/scripts/customizer.min.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('/js/scripts/forms/form-wizard.min.js') }}"></script>

@endpush
