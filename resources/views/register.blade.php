@extends('layouts.login')

@section('title')
    Registration Account
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
                                    class="img-fluid" src="{{ asset('/images/pages/register-v2.svg') }}" alt="Login V2">
                            </div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Login-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title font-weight-bold mb-1">Adventure starts here 🚀</h2>
                                <p class="card-text mb-2">Start your jouurney with us!</p>
                                <form method="POST" action="{{ route('register') }}" role="form">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group">
                                        <label class="form-label" for="login-email">Full Name</label>
                                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                                            class="form-control form-control-user" required="" id="exampleFirstName"
                                            placeholder="Name...">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="login-email">Email</label>
                                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                                            class="form-control form-control-user" required="" id="exampleFirstName"
                                            placeholder="Email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">

                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" id="pw1" name="password"
                                                class="form-control form-control-user" id="exampleInputPassword"
                                                placeholder="Password" minlength="8" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i>
                                                </span>
                                                @error('password')
                                                    <span>
                                                        <strong class="text-danger"> &nbsp;{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" id="pw2" name="password_confirmation"
                                                class="form-control form-control-user" id="exampleRepeatPassword"
                                                placeholder="Repeat Password" minlength="8" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">

                                    <label class="form-label" for="login-email">Ajukan akun sebagai</label>
                                    <div class="input-group">
                                        <br>
                                        <select class="select2 form-control form-control-user" id="basicSelect"
                                            name="pengajuan" required>
                                            <option value="">--- Pilih ---</option>
                                            <option value="Staf">Staf</option>
                                            <option value="Teacher">Teacher</option>
                                            <option value="Student">Student</option>
                                        </select>
                                    </div>
                                </div> --}}

                                    <button type="submit" class="btn btn-primary btn-block" tabindex="4">Sign up</button>
                                </form>
                                <p class="text-center mt-2"><span>Already have an account?</span><a
                                        href="/login"><span>&nbsp;Sign in
                                            instead</span></a></p>
                            </div>
                        </div>
                        <!-- /Login-->
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

@push('css')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/vendors/css/vendors.min.css') }}">
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
    <script src="{{ asset('/js/scripts/pages/page-auth-login.js') }}">
    </script>
    <script type="text/javascript">
        window.onload = function() {
            document.getElementById("pw1").onchange = validatePassword;
            document.getElementById("pw2").onchange = validatePassword;
        }

        function validatePassword() {
            var pass2 = document.getElementById("pw2").value;
            var pass1 = document.getElementById("pw1").value;
            if (pass1 != pass2)
                document.getElementById("pw2").setCustomValidity(
                    "Passwords Tidak Sama, Coba Lagi");
            else
                document.getElementById("pw2").setCustomValidity('');
        }
    </script>
@endpush
