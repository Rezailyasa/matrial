@extends('layouts.login')

@section('title')
Registration Account
@endsection
@section('content')
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-12 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6 p-5">
                            <img src="{{ asset('/img/undraw_No_data_re_kwbl.svg') }}" class="img-fluid">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Registration Account!</h1>
                                </div>


                                <form method="POST" action="{{ route('register') }}" role="form">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" name="name" id="name" maxlength="19"
                                                value="{{ old('name') }}" class="form-control form-control-user"
                                                required="" minlength="5" maxlength="15" id="exampleFirstName"
                                                placeholder="Full Name">

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                                            class="form-control form-control-user" id="exampleInputEmail"
                                            placeholder="Email Address" required="">
                                        @error('email')
                                        <span>
                                            <strong class="text-danger"> &nbsp;{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" id="pw1" name="password"
                                                class="form-control form-control-user" id="exampleInputPassword"
                                                placeholder="Password" minlength="8" required>

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" id="pw2" name="password_confirmation"
                                                class="form-control form-control-user" id="exampleRepeatPassword"
                                                placeholder="Repeat Password" minlength="8" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <p for="defaultSelect"><i>Ajukan akun sebagai.</i></p>
                                        <select class="form-control form-control" id="defaultSelect" name="pengajuan"
                                            required>
                                            <option value="">--- Pilih ---</option>
                                            <option value="Staf">Staf</option>
                                            <option value="Teacher">Teacher</option>
                                            <option value="Student">Student</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Register Account
                                    </button>

                                </form>

                                <script type="text/javascript">
                                    window.onload = function () {
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

                                <hr>
                                <div class="text-center">
                                </div>
                                <div class="text-center">
                                    <a class="small" href="/login">Already have an account? Login!</a>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection