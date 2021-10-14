@extends('layouts.login')
@section('title')
Forgot Password
@endsection
@section('content')
<!-- Begin Page Content -->
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
              <img class="" src="{{asset('/images/logo/logosmk.png')}}" height="40" width="40">
              <h2 class="brand-text text-primary ml-1 mt-50">Toko ...</h2>
            </div>
          </a>
          <!-- /Brand logo-->
          <!-- Left Text-->
          <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid"
                src="{{asset('/images/pages/forgot-password-v2.svg')}}" alt="Login V2">
            </div>
          </div>
          <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
              <h2 class="card-title font-weight-bold mb-1">Reset Password! 🔒</h2>
              <p class="card-text mb-2">Password baru kamu harus berbeda dengan password lama kamu!</p>
              <form class="user" action="/password/{{$user->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <div class="d-flex justify-content-between">
                    <label for="reset-password-new">New Password</label>
                  </div>
                  <div class="input-group input-group-merge form-password-toggle">
                    <input class="form-control form-control-merge" id="pw1" type="password" name="password"
                      placeholder="············" aria-describedby="reset-password-new" autofocus="" tabindex="1"
                      required>
                    <div class="input-group-append"><span class="input-group-text cursor-pointer"><i
                          data-feather="eye"></i></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="d-flex justify-content-between">
                    <label for="reset-password-confirm">Confirm Password</label>
                  </div>
                  <div class="input-group input-group-merge form-password-toggle">
                    <input class="form-control form-control-merge" id="pw2" type="password"
                      name="reset-password-confirm" placeholder="············" aria-describedby="reset-password-confirm"
                      tabindex="2" required>
                    <div class="input-group-append"><span class="input-group-text cursor-pointer"><i
                          data-feather="eye"></i></span>
                    </div>
                  </div>
                </div>
                {{-- <div class="form-group">
                  <input type="password" class="form-control form-control-user" aria-describedby="emailHelp" id="pw1"
                    name="password" placeholder="Enter a new password...">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" aria-describedby="emailHelp" id="pw2"
                    placeholder="Enter the new password confirmation...">
                </div> --}}
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Set New Password</button>
              </form>

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
<link rel="stylesheet" type="text/css" href="{{asset('/vendors/css/vendors.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/vendors/css/pickers/pickadate/pickadate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
<!-- END: Vendor CSS-->

<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-extended.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/colors.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/components.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/themes/dark-layout.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/themes/bordered-layout.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/themes/semi-dark-layout.min.css')}}">

<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('/css/core/menu/menu-types/vertical-menu.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/plugins/forms/form-validation.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/pages/page-auth.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/style.css')}}">
@endpush
@push('script')

<script type="text/javascript">
  window.onload = function () {
                document.getElementById("pw1").onchange = validatePassword;
                document.getElementById("pw2").onchange = validatePassword;
            }
            function validatePassword(){
                var pass2=document.getElementById("pw2").value;
                var pass1=document.getElementById("pw1").value;
                if(pass1!=pass2)
                    document.getElementById("pw2").setCustomValidity("Passwords Are Not the Same, Try Again");
                else
                    document.getElementById("pw2").setCustomValidity('');
            }
</script>
<!-- BEGIN: Vendor JS-->
<script src="{{asset('/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('/vendors/js/forms/wizard/bs-stepper.min.js')}}"></script>
<script src="{{asset('/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('/js/core/app-menu.min.js')}}"></script>
<script src="{{asset('/js/core/app.min.js')}}"></script>
<script src="{{asset('/js/scripts/customizer.min.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('/js/scripts/forms/form-wizard.min.js')}}"></script>
<script src="{{asset('/js/scripts/pages/page-auth-reset-password.min.js')}}"></script>
@endpush