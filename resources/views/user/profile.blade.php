@php
use App\Models\Tahun_ajaran;
use App\Models\Setting_kelas_siswa;
use App\Models\Setting_jadwal_absen;
use App\Models\Data_absen;
@endphp
@extends('layouts.app')
@section('content')

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="app-user-view">
                    <!-- User Card & Plan Starts -->
                    <div class="row">
                        <!-- User Card starts-->
                        <div class="col-xl-12">
                            <div class="card user-card">
                                <form action="{{ url('user/' . $user->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-5 col-lg-12 media mb-2">
                                                <img src="{{ asset('/images/profile_user/' . $user->image) }}"
                                                    alt="users avatar"
                                                    class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer"
                                                    height="90" width="90">
                                                <div class="media-body mt-50">
                                                    <h4>{{ $user->name }}</h4>
                                                    <div class="col-12 d-flex mt-1 px-0">
                                                        <label class="btn btn-primary mr-75 mb-0" for="change-picture">
                                                            <span class="d-none d-sm-block">Change</span>
                                                            <input class="form-control" type="file" id="change-picture"
                                                                hidden="" accept="image/png, image/jpeg, image/jpg"
                                                                name="file">
                                                            <span class="d-block d-sm-none">
                                                                <i class="mr-0" data-feather="edit"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-7 col-lg-12 mt-2 mt-xl-0">
                                                <div class="row mt-2">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Nama</label>
                                                            <input type="text" class="form-control" placeholder="Username"
                                                                value="{{ $user->name }}" name="name" id="username">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Email</label>
                                                            <input type="email" class="form-control" placeholder="Name"
                                                                value="{{ $user->email }}" name="email" id="name">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ml-2 mt-1">
                                                <button class="btn btn-success btn-icon"
                                                    onclick="return confirm('Profile anda akan dirubah?')"><i
                                                        data-feather="save"></i>
                                                    Save
                                                    change</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /User Card Ends-->

                        <!-- Plan Card starts-->
                        {{-- <div class="col-xl-3 col-lg-4 col-md-5">
                            <div class="card plan-card border-primary">
                                <div class="card-header d-flex justify-content-between align-items-center pt-75 pb-1">
                                    <h5 class="mb-0">Status Kehadiran </h5>
                                    <span class="badge badge-light-secondary" data-toggle="tooltip" data-placement="top"
                                        title="Expiry Date">{{ date('Y-m-d') }}<span class="nextYear"></span>
                                    </span>
                                </div>
                                <div class="card-body text-center">



                                </div>
                            </div>
                        </div> --}}
                        <!-- /Plan CardEnds -->
                    </div>
                    <!-- User Card & Plan Ends -->
                    <!-- pricing free trial -->
                    <div class="pricing-free-trial">
                        <div class="row">
                            <div class="col-12 col-lg-10 col-lg-offset-3 mx-auto">
                                <div class="pricing-trial-content d-flex justify-content-between">
                                    <div class="text-center text-md-left mt-3">
                                        <h3 class="text-primary">Selamat datang di UD CIPTA INDAH. </h5>
                                            <h5>Membangun dengan sepenuh hati. </h5>
                                            {{-- <button class="btn btn-primary mt-2 mt-lg-3">Start 14-day FREE trial</button> --}}
                                    </div>

                                    <!-- image -->
                                    <img src="{{ asset('/images/build.svg') }}" class="pricing-trial-img img-fluid"
                                        width="50%" alt="svg img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ pricing free trial -->
                    <!-- User Timeline & Permissions Starts -->
                    <!-- information starts -->


                </section>

            </div>
        </div>
    </div>
@endsection

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
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/plugins/forms/pickers/form-flat-pickr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/pages/app-user.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/pages/page-pricing.min.css') }}">
@endpush

@push('script')


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>
    <script src="{{ asset('/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('/js/core/app.min.js') }}"></script>
    <script src="{{ asset('/js/scripts/customizer.min.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('/js/scripts/pages/app-user-edit.min.js') }}"></script>
    <script src="{{ asset('/js/scripts/components/components-navs.min.js') }}"></script>
@endpush
