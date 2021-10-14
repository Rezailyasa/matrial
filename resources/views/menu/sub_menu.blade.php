@extends('layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    @include('layouts.alert')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h6 class="m-0 font-weight-bold text-primary">Data Sub Menu</h6>
                    </div>
                    <div class="col-lg-6 text-right">
                        <button type="button" class="badge badge-primary" data-toggle="modal"
                            data-target="#exampleModal">
                            Tambah
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Menu</th>
                            <th>Url</th>
                            <th>Icon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($submenu as $no => $m)
                        <tr>
                            <th>{{ $no+1 }}</th>
                            <th>{{ $m->title }}</th>
                            <th>{{ $m->user_menu->menu }}</th>

                            <th>{{ $m->url }}</th>
                            <th>{{ $m->icon }}</th>
                            <th><a href="#" data-toggle="modal" data-target="#exampleModal{{ $m->id }}">edit</a> /

                                <a href="#" data-toggle="modal" data-target="#hapus{{ $m->id }}">hapus</a>

                            </th>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>




<!-- tambah -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('sub_menu') }}" method="POST">
                    @csrf

                    <div class="from-group">
                        <label>Title :</label>
                        <input type="text" class="form-control" name="title" placeholder="Title..." required="">
                    </div>
                    <hr class="sidebar-divider mt-3">
                    <label>Menu :</label>

                    <div class="input-group mb-3">
                        <select class="custom-select" name="menu" id="inputGroupSelect01" required="">
                            <option selected>Pilih...</option>
                            @foreach($menu as $m)
                            <option value="{{ $m->id }}">{{ $m->menu }}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="sidebar-divider mt-3">

                    <div class="from-group">
                        <label>URL :</label>

                        <input type="text" class="form-control" name="url" placeholder="URL..." required="">
                    </div>
                    <hr class="sidebar-divider mt-3">
                    <div class="from-group">
                        <label>Icon FontAwesome :</label>
                        <input type="text" class="form-control" name="icon" placeholder="Icon..." required="">
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



<!-- endtambah -->

<!-- edit -->
@foreach($submenu as $no => $m)

<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $m->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('sub_menu') }}/{{ $m->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="from-group">
                        <label>Title :</label>
                        <input type="text" class="form-control" name="title" placeholder="Title..."
                            value="{{ $m->title }}" required="">
                    </div>
                    <hr class="sidebar-divider mt-3">
                    <label>Menu :</label>

                    <div class="input-group mb-3">
                        <select class="custom-select" name="menu" id="inputGroupSelect01" required="">
                            <option selected value="{{ $m->user_menu_id }}">
                                <strong>{{ $m->user_menu->menu }}</strong></option>
                            @foreach($menu as $e)
                            <option value="{{ $e->id }}">{{ $e->menu }}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr class="sidebar-divider mt-3">

                    <div class="from-group">
                        <label>URL :</label>

                        <input type="text" class="form-control" name="url" placeholder="URL..." value="{{ $m->url }}"
                            required="">
                    </div>
                    <hr class="sidebar-divider mt-3">
                    <div class="from-group">
                        <label>Icon FontAwesome :</label>
                        <input type="text" class="form-control" name="icon" placeholder="Icon..." value="{{ $m->icon }}"
                            required="">
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





<!-- Modal -->
<div class="modal fade" id="hapus{{ $m->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('sub_menu') }}/{{ $m->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <h1>Anda Yakin Ingin Menghapus Menu {{ $m->title }}?</h1>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Hapus</button>
            </div>
        </div>
    </div>
</div>
</form>


@endforeach


<!-- endedit -->






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