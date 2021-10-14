
@extends('layouts.app')
@section('content')
 <!-- Begin Page Content -->
   <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Change Your Password?</h1>
                    <p class="mb-4">Enter your current password to change your password to a new one.!</p>
                    @include('layouts.alert')
                  </div>
                  <form class="user" action="/password" method="POST">
                    @csrf
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="password" placeholder="Enter your password...">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Check Password
                    </button>
                  </form>
                  <hr>
                
                </div>
              </div>
            </div>


@endsection