@extends('layouts.login')
@section('title')
    Forgot Password
@endsection
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo--><a class="brand-logo" href="javascript:void(0);">
                            <div class="row mx-1 mt-1">
                                <img class="" src="{{ asset('/images/logo/logosmk.png') }}" height="40" width="40">
                                <h2 class="brand-text text-primary ml-1 mt-50">CIPTA INDAH</h2>
                            </div>
                        </a>
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img
                                    class="img-fluid" src="{{ asset('/images/pages/forgot-password-v2.svg') }}"
                                    alt="Login V2">
                            </div>
                        </div>
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title font-weight-bold mb-1">Konfirmasi email! 🔒</h2>
                                <p class="card-text mb-2">Masukkan Kode Akses, Silahkan cek email
                                    kamu</p>
                                <form action="{{ url('password/forgot_password') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="avatar avatar-xl mb-1">
                                                <img src="{{ asset('/images/profile_user/' . $user->image) }}" alt="..."
                                                    class="avatar-img">
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <label>{{ $user->name }}</label><br>
                                            <label>{{ $user->email }}</label><br>
                                            <label>Akses : {{ $user->user_role->role }}</label>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <div class="form-group form-floating-label text-left">
                                            <input id="inputFloatingLabel" type="number" name="kode"
                                                class="form-control input-border-bottom" required=""
                                                placeholder="Contoh : 6876465435">
                                        </div>
                                        <div class="text-right mt-1">
                                            <button type="submit"
                                                class="btn btn-primary btn-round btn-block">Verify</button>
                                </form>
                                <p class="text-center mt-2"><a href="/login"><i data-feather="chevron-left"></i> Back to
                                        login</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
@push('css')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/vendors/css/pickers/pickadate/pickadate.css') }}">
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
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/pages/page-auth.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
@endpush


@push('script')


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('/js/core/app.min.js') }}"></script>
    <script src="{{ asset('/js/scripts/customizer.min.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('/js/scripts/pages/page-auth-register.min.js') }}">
    </script>
@endpush
