@extends('layouts.app')
@section('content')
<form action="{{url('user')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="container mt-3">

        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <label for="inputFile" class="mt-1">Photo Profile</label>
                    <div class="imgWrap">
                        <img src="{{asset('/img/image.png')}}" id="imgView" class="card-img-top img-fluid">
                    </div>
                    <div class="card-body">
                        <div class="custom-file">
                            <input type="file" id="inputFile" name="file" class="imgFile custom-file-input"
                                aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputFile">Choose Image</label>
                        </div>
                    </div>
                    @error('file')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-8">

                <div class="form-group">
                    <label for="name">Name :</label>
                    <input type="text" class="form-control" name="name" id="name" maxlength="19" @if (old('name'))
                        value="{{old('name')}}" @else value="{{$user->name}}" @endif required>

                </div>
                <div class="form-group">
                    <label for="telepon">Telepon :</label>
                    <input type="number" class="form-control" name="telepon" id="telepon" @if (old('telepon'))
                        value="{{old('telepon')}}" @else value="{{$user->telepon}}" @endif" required>
                    {{-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="5"
                        required>@if(old('alamat')){{old('alamat')}}@else{{$user->alamat}}@endif</textarea>
                </div>
                <div class="form-group">
                    <label for="maps">Link Location :</label>
                    <input type="text" class="form-control" id="maps" name="maps" @if (old('maps'))
                        value="{{old('maps')}}" @else value="{{$user->maps}}" @endif">

                </div>
                <div class="text-right">
                    <button class="btn btn-success" type="submit">
                        <span class="btn-label">
                            <i class="fa fa-save"></i>
                        </span>
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

{{-- <h1>ini halaman edit</h1> --}}
@endsection
@push('css')
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
<style>
    #imgView {
        padding: 5px;
    }

    .loadAnimate {
        animation: setAnimate ease 2.5s infinite;
    }

    @keyframes setAnimate {
        0% {
            color: #000;
        }

        50% {
            color: transparent;
        }

        99% {
            color: transparent;
        }

        100% {
            color: #000;
        }
    }

    .custom-file-label {
        cursor: pointer;
    }
</style>
@endpush


@push('scripts')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> --}}
<script>
    $("#inputFile").change(function(event) {  
      fadeInAdd();
      getURL(this);    
    });

    $("#inputFile").on('click',function(event){
      fadeInAdd();
    });

    function getURL(input) {    
      if (input.files && input.files[0]) {   
        var reader = new FileReader();
        var filename = $("#inputFile").val();
        filename = filename.substring(filename.lastIndexOf('\\')+1);
        reader.onload = function(e) {
          debugger;      
          $('#imgView').attr('src', e.target.result);
          $('#imgView').hide();
          $('#imgView').fadeIn(500);      
          $('.custom-file-label').text(filename);             
        }
        reader.readAsDataURL(input.files[0]);    
      }
      $(".alert").removeClass("loadAnimate").hide();
    }

    function fadeInAdd(){
      fadeInAlert();  
    }
    function fadeInAlert(text){
      $(".alert").text(text).addClass("loadAnimate");  
    }
</script>
@endpush
@push('css')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('/vendors/css/vendors.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/vendors/css/forms/wizard/bs-stepper.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/vendors/css/forms/select/select2.min.css')}}">
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
<link rel="stylesheet" type="text/css" href="{{asset('/css/plugins/forms/form-wizard.min.css')}}">
@endpush

@push('script')


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
@endpush