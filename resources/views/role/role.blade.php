@extends('layouts.app')
@section('content')
<div class="app-content content ecommerce-application">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="row">
      <div class="col-12">
        <h2 class="content-header-title float-left mb-0">{{$title}}</h2>
        <div class="breadcrumb-wrapper">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="#">Forms</a>
            </li>
            <li class="breadcrumb-item active">Form Wizard
            </li>
          </ol>
        </div>
      </div>

    </div>
    <!-- DataTales Example -->
    <div class="card mt-2">
      <div class="card-header">
        <h3>Data Role & Access Users</h3>
        {{-- <button type="button" class="badge badge-primary" data-toggle="modal" data-target="#exampleModal">
          Tambah
        </button> --}}
      </div>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Role</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $no => $roles)
            <tr>
              <td>{{$no+1}}</td>
              <td>{{$roles->role}}</td>
              <td>
                <a href="#" class="btn btn-primary btn-link" data-toggle="modal" data-target="#access{{$roles->id}}"><i
                    class="fas fa-user-tag"></i> Access</a>

                <a href="#" class="btn btn-success btn-link" data-toggle="modal"
                  data-target="#exampleModal{{$roles->id}}"><i class="fas fa-edit"></i> edit</a>

                <!-- <a href="#" class="btn btn-primary btn-sm btn-round" data-toggle="modal" data-target="#hapus{{$roles->id}}">hapus</a> -->
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('role')}}" method="POST">
          @csrf
          <div class="form-group">
            <label>Role :</label>

            <input type="text" class="form-control form-control-user" id="exampleInputEmail"
              aria-describedby="emailHelp" placeholder="Nama role.." maxlength="50" name="role">

          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>





@foreach($data as $no => $m)

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$m->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('role')}}/{{$m->id}}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <div class="row col-lg-12">
              <label>Role :</label>
              <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                aria-describedby="emailHelp" value="{{$m->role}}" placeholder="Nama role.." maxlength="50" name="role">

            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
    </div>
  </div>
</div>
</form>



<!-- Modal -->
<div class="modal fade" id="hapus{{$m->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('role')}}/{{$m->id}}" method="POST">
          @csrf
          @method('DELETE')
          <h1>Anda Yakin Ingin Menghapus Role {{$m->role}}?</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Hapus</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- Modal -->
<div class="modal fade" id="access{{$m->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Role Access</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('access')}}" method="POST">
          @csrf
          <div class="container">
            @foreach($menu as $mn)
            <div class="row">
              <div class="col-lg-6">
                <label>{{$mn->menu}}</label>
              </div>
              <div class="col-lg-6">
                <?php $menuaccess = DB::table('user_access_menu')->where([
                      ['user_role_id', '=', $m->id],
                      ['user_menu_id', '=', $mn->id],
                  ])->first(); 
                  
                  ?>
                @if($menuaccess)
                <input type="checkbox" value="{{$mn->id}}" name="menu{{$mn->id}}"
                  aria-label="Checkbox for following text input" checked="">
                @else
                <input type="checkbox" value="{{$mn->id}}" name="menu{{$mn->id}}"
                  aria-label="Checkbox for following text input">

                @endif
              </div>
            </div>
            @endforeach

            <input type="hidden" name="id_role" value="{{$m->id}}">
            <br>
            <h6>Catatan :</h6>
            <p>Tekan tombol <i>Save</i> untuk menyimpan setingan.</p>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</form>



@endforeach





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



@endsection