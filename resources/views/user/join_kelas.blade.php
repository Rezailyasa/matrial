@extends('layouts.app')
@section('content')

<div class="container-fluid mt-5 text-center">
  <h1>Selamat datang di Aplikasi Sistem Informasi Sekolah Terpadu <br>
    SMK Bina Cendekia Cirebon</h1>
  <br>
  <div class="row">
    <div class="col-lg-6">

      <img src="{{asset('/img/lock.svg')}}" class="img-fluid">

    </div>
    <div class="col-lg-6">
      <br>
      <h4>Pemberitahuan</h4>
      <h5>Akun sedang dalam proses verifikasi oleh petugas, silahkan tunggu beberapa saat atau menghubungi petugas untuk
        proses verifikasi akun oleh petugas.
        <br>
        ---- TERIMAKASIH ----
      </h5>

      {{-- <form action="{{url('/join_kelas')}}" method="POST">
      @csrf
      @method('POST') --}}
      {{-- <div class="form-group">
               <div class="input-group mb-3">
                 <input type="hidden" class="base_url" value="{{url('/join_kelas')}}">
      <input type="text" class="form-control" name="kode_kelas" placeholder="Contoh : {{time()}}"
        aria-label="Recipient's username" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button type="submit" class="btn btn-primary" id="basic-addon2">Cek Kode</button>
      </div>
    </div>
  </div> --}}
  {{-- </form> --}}
  {{-- <div id="hasil">

           </div> --}}
</div>

</div>
</div>


@endsection
@push('scripts')
<script>
  const button = document.querySelector('#basic-addon2');
  button.addEventListener('click', async function name(){
    const inputValue = document.querySelector('.form-control');
    
    
    hasilInput = await getHasil(inputValue);
    
    // console.log(hasilInput);
    if(hasilInput == null){
      alert('Tidak ditemukan Kelas dengan kode '+ inputValue.value);
    }else{
      getTM(hasilInput);
    }
  });

  function getHasil(inputValue){
    const base_url = document.querySelector('.base_url');
    return fetch( base_url.value + '/' + inputValue.value)
      .then(response => response.json());
  }
  function getTM(hasilInput)
  {
    let cards = `<div class="col-md-12 my-3">
                <div class="card">
                <img class="card-img-top" src="" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">${hasilInput.nama_kelas}</h5>
                    <p class="card-subtitle mb-2  text-muted"></p>
                    <a href="#" class="btn btn-primary>Join Kelas</a>
                </div>
                </div>
            </div>`;
        const hasil = document.querySelector('#hasil');
        hasil.innerHTML = cards; 
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