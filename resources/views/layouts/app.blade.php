@php
use Illuminate\Support\Facades\Auth;
use App\Models\User_role;
$role = AUTH::User()->user_role_id;
$roleid = User_role::find($role);
@endphp

<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="UD CIPTA INDAH">
    <meta name="keywords" content="UD, bangunan, cirebon">
    <meta name="author" content="Sunset Orange">
    <title>{{ $title }}</title>
    <link rel="apple-touch-icon" href="{{ asset('/images/logo/logosmk.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/images/logo/logosmk.png') }}">

    @stack('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/plugins/extensions/ext-component-toastr.min.css') }}">
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static   menu-collapsed" data-open="click"
    data-menu="vertical-menu-modern" data-col="">


    @if (session('status'))
        <div class="toast toast-basic position-fixed fade show" id="toast" role="status" aria-live="polite"
            aria-atomic="true" data-delay="1000" style="top: 1rem; right: 1rem;" data-autohide="true">
            <div class="toast-header">
                <img src="{{ asset('/images/logo/logosmk.png') }}" class="mr-1" alt="Toast image" height="25"
                    width="25">
                <strong class="mr-5">{{ $user->name }}</strong>
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



    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon"
                                data-feather="menu"></i></a></li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ml-auto">

                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                        id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span
                                class="user-name font-weight-bolder">{{ $user->name }}</span><span
                                class="user-status">{{ $user->user_role->role }}</span></div><span
                            class="avatar"><img class="round"
                                src="{{ asset('/images/profile_user/' . $user->image) }}" alt="avatar" height="40"
                                width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="/user"><i class="mr-50" data-feather="user"></i>
                            Profile</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout"><i class="mr-50" data-feather="power"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="">
                        <img src="{{ asset('/images/logo/logosmk.png') }}" height="40" width="40">
                        <h3 class="brand-text">CIPTA INDAH</h3>
                    </a></li>
                <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                        <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                        {{-- <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary"
                            data-feather="disc" data-ticon="disc"></i> --}}
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

                <hr>
                @php
                    $menu = DB::select('SELECT m.* FROM user_access_menu u , user_menu m WHERE u.user_menu_id = m.id AND u.user_role_id = :role', ['role' => $user->user_role_id]);
                    // dd($menu);
                @endphp


                @foreach ($menu as $m)

                    {{-- menu 1 --}}
                    @if ($title == $m->title)
                        <li class="active nav-item">
                        @else
                        <li class=" nav-item">
                    @endif

                    <a class="d-flex align-items-center" href="{{ $m->url }}"><i
                            data-feather="{{ $m->icon }}"></i><span class="menu-title text-truncate"
                            data-i18n="Calendar">{{ $m->title }}</span>
                    </a>
                @endforeach

            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    @yield('content')

    <!-- BEGIN: Customizer-->
    {{-- <div class="customizer d-none d-md-block"><a
            class="customizer-toggle d-flex align-items-center justify-content-center" href="javascript:void(0);"><i
                class="spinner" data-feather="settings"></i></a>
        <div class="customizer-content">
            <!-- Customizer header -->
            <div class="customizer-header px-2 pt-1 pb-0 position-relative">
                <h4 class="mb-0">Theme Customizer</h4>
                <p class="m-0">Customize & Preview in Real Time</p>

                <a class="customizer-close" href="javascript:void(0);"><i data-feather="x"></i></a>
            </div>

            <hr>

            <!-- Styling & Text Direction -->
            <div class="customizer-styling-direction px-2">
                <p class="font-weight-bold">Skin</p>
                <div class="d-flex">
                    <div class="custom-control custom-radio mr-1">
                        <input type="radio" id="skinlight" name="skinradio" class="custom-control-input layout-name"
                            checked="" data-layout="">
                        <label class="custom-control-label" for="skinlight">Light</label>
                    </div>
                    <div class="custom-control custom-radio mr-1">
                        <input type="radio" id="skinbordered" name="skinradio" class="custom-control-input layout-name"
                            data-layout="bordered-layout">
                        <label class="custom-control-label" for="skinbordered">Bordered</label>
                    </div>
                    <div class="custom-control custom-radio mr-1">
                        <input type="radio" id="skindark" name="skinradio" class="custom-control-input layout-name"
                            data-layout="dark-layout">
                        <label class="custom-control-label" for="skindark">Dark</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="skinsemidark" name="skinradio" class="custom-control-input layout-name"
                            data-layout="semi-dark-layout">
                        <label class="custom-control-label" for="skinsemidark">Semi Dark</label>
                    </div>
                </div>
            </div>

            <hr>

            <!-- Menu -->
            <div class="customizer-menu px-2">
                <div id="customizer-menu-collapsible" class="d-flex">
                    <p class="font-weight-bold mr-auto m-0">Menu Collapsed</p>
                    <div class="custom-control custom-control-primary custom-switch">
                        <input type="checkbox" class="custom-control-input" id="collapse-sidebar-switch">
                        <label class="custom-control-label" for="collapse-sidebar-switch"></label>
                    </div>
                </div>
            </div>
            <hr>

            <!-- Layout Width -->
            <div class="customizer-footer px-2">
                <p class="font-weight-bold">Layout Width</p>
                <div class="d-flex">
                    <div class="custom-control custom-radio mr-1">
                        <input type="radio" id="layout-width-full" name="layoutWidth" class="custom-control-input"
                            checked="">
                        <label class="custom-control-label" for="layout-width-full">Full Width</label>
                    </div>
                    <div class="custom-control custom-radio mr-1">
                        <input type="radio" id="layout-width-boxed" name="layoutWidth" class="custom-control-input">
                        <label class="custom-control-label" for="layout-width-boxed">Boxed</label>
                    </div>
                </div>
            </div>
            <hr>

            <!-- Navbar -->
            <div class="customizer-navbar px-2">
                <div id="customizer-navbar-colors">
                    <p class="font-weight-bold">Navbar Color</p>
                    <ul class="list-inline unstyled-list">
                        <li class="color-box bg-white border selected" data-navbar-default=""></li>
                        <li class="color-box bg-primary" data-navbar-color="bg-primary"></li>
                        <li class="color-box bg-secondary" data-navbar-color="bg-secondary"></li>
                        <li class="color-box bg-success" data-navbar-color="bg-success"></li>
                        <li class="color-box bg-danger" data-navbar-color="bg-danger"></li>
                        <li class="color-box bg-info" data-navbar-color="bg-info"></li>
                        <li class="color-box bg-warning" data-navbar-color="bg-warning"></li>
                        <li class="color-box bg-dark" data-navbar-color="bg-dark"></li>
                    </ul>
                </div>

                <p class="navbar-type-text font-weight-bold">Navbar Type</p>
                <div class="d-flex">
                    <div class="custom-control custom-radio mr-1">
                        <input type="radio" id="nav-type-floating" name="navType" class="custom-control-input"
                            checked="">
                        <label class="custom-control-label" for="nav-type-floating">Floating</label>
                    </div>
                    <div class="custom-control custom-radio mr-1">
                        <input type="radio" id="nav-type-sticky" name="navType" class="custom-control-input">
                        <label class="custom-control-label" for="nav-type-sticky">Sticky</label>
                    </div>
                    <div class="custom-control custom-radio mr-1">
                        <input type="radio" id="nav-type-static" name="navType" class="custom-control-input">
                        <label class="custom-control-label" for="nav-type-static">Static</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="nav-type-hidden" name="navType" class="custom-control-input">
                        <label class="custom-control-label" for="nav-type-hidden">Hidden</label>
                    </div>
                </div>
            </div>
            <hr>

            <!-- Footer -->
            <div class="customizer-footer px-2">
                <p class="font-weight-bold">Footer Type</p>
                <div class="d-flex">
                    <div class="custom-control custom-radio mr-1">
                        <input type="radio" id="footer-type-sticky" name="footerType" class="custom-control-input">
                        <label class="custom-control-label" for="footer-type-sticky">Sticky</label>
                    </div>
                    <div class="custom-control custom-radio mr-1">
                        <input type="radio" id="footer-type-static" name="footerType" class="custom-control-input"
                            checked="">
                        <label class="custom-control-label" for="footer-type-static">Static</label>
                    </div>
                    <div class="custom-control custom-radio mr-1">
                        <input type="radio" id="footer-type-hidden" name="footerType" class="custom-control-input">
                        <label class="custom-control-label" for="footer-type-hidden">Hidden</label>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}
    <!-- End: Customizer-->

    <!-- Buynow Button-->
    {{-- <div class="buy-now"><a href="../../../../../item/vuexy-vuejs-html-laravel-admin-dashboard-template/23328599.html"
            target="_blank" class="btn btn-danger">Buy Now</a>

    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div> --}}

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy;
                {{ date('Y') }}<a class="ml-25">Sunset Orange</a><span class="d-none d-sm-inline-block">, All
                    rights
                    Reserved</span></span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i
                    data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->

    <script src="{{ asset('/vendors/js/extensions/toastr.min.js') }}"></script>
    @stack('script')
    <script src="{{ asset('/js/scripts/components/components-bs-toast.min.js') }}"></script>
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
<!-- END: Body-->

</html>
