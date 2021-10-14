@php
use App\Models\Transaksi;
use App\Models\Data_komisi;
@endphp

@extends('layouts.app')
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
@endpush
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <div class="content-body">
                {{-- <div class="row">
                    <div class="col-12">
                        <div class="alert alert-primary" role="alert">
                            <div class="alert-body"><strong>Info:</strong> Please check the&nbsp;<a class="text-primary"
                                    href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation/documentation-layout-without-menu.html"
                                    target="_blank">Layout without menu documentation</a>&nbsp; for more details.</div>
                        </div>
                    </div>
                </div><!-- Dashboard Ecommerce Starts --> --}}
                <section id="dashboard-ecommerce">
                    <div class="row justify-content-center mb-1">
                        {{-- <button class="btn btn-primary btn-icon round" data-toggle="modal" data-target="#filter"><i
                                data-feather="filter"></i> <span
                                class="align-middle d-sm-inline-block d-none">Filter</span></button> --}}
                        <h3>Total pengiriman minggu ini : {{ $tottransaksi }}</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    Senin, {{ date('Y-m-d', strtotime('monday this week', strtotime($date))) }}
                                    {{-- Selasa, {{ date('Y-m-d', strtotime('tuesday this week', strtotime($date))) }}
                                    Rabu, {{ date('Y-m-d', strtotime('wednesday this week', strtotime($date))) }}
                                    Kamis, {{ date('Y-m-d', strtotime('thursday this week', strtotime($date))) }}
                                    Jumat, {{ date('Y-m-d', strtotime('friday this week', strtotime($date))) }}
                                    Sabtu, {{ date('Y-m-d', strtotime('saturday this week', strtotime($date))) }}
                                    Minggu, {{ date('Y-m-d', strtotime('sunday this week', strtotime($date))) }} --}}
                                </div>
                                @php
                                    $d = date('Y-m-d', strtotime('monday this week', strtotime($date)));
                                    $trx = Transaksi::where('tanggal', date('Y-m-d', strtotime('monday this week', strtotime($date))))->get();
                                    $trxh = Transaksi::where('tanggal', date('Y-m-d', strtotime('monday this week', strtotime($date))))->count();
                                    // dd($trxh);
                                @endphp
                                @if ($trx)
                                    <div class="table-responsive">
                                        <table class="table table-sm table-hover-animation">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Sales</th>
                                                    <th>Toko</th>
                                                    <th>Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($trx as $no => $t)
                                                    <tr>
                                                        <td>{{ $no + 1 }}</td>
                                                        <td>{{ $t->users->name }}</td>
                                                        <td>{{ $t->data_toko->nama_toko }}</td>
                                                        <td>{{ $t->qty }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                                @if ($user->user_role->id == 1)
                                    @if ($trxh < 10)
                                        <div class="row justify-content-center my-1">
                                            <a href="{{ url('/transaksi/create/' . $d) }}"
                                                class="btn btn-primary btn-sm round"><i data-feather="plus"></i>
                                                Tambah</a>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    {{-- Senin, {{ date('Y-m-d', strtotime('monday this week', strtotime($date))) }} --}}
                                    Selasa, {{ date('Y-m-d', strtotime('tuesday this week', strtotime($date))) }}
                                    {{-- Rabu, {{ date('Y-m-d', strtotime('wednesday this week', strtotime($date))) }}
                                    Kamis, {{ date('Y-m-d', strtotime('thursday this week', strtotime($date))) }}
                                    Jumat, {{ date('Y-m-d', strtotime('friday this week', strtotime($date))) }}
                                    Sabtu, {{ date('Y-m-d', strtotime('saturday this week', strtotime($date))) }}
                                    Minggu, {{ date('Y-m-d', strtotime('sunday this week', strtotime($date))) }} --}}
                                </div>
                                @php
                                    $d = date('Y-m-d', strtotime('tuesday this week', strtotime($date)));
                                    $trx = Transaksi::where('tanggal', date('Y-m-d', strtotime('tuesday this week', strtotime($date))))->get();
                                    $trxh = Transaksi::where('tanggal', date('Y-m-d', strtotime('tuesday this week', strtotime($date))))->count();
                                    // dd($trxh);
                                @endphp
                                @if ($trx)
                                    <div class="table-responsive">
                                        <table class="table table-sm table-hover-animation">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Sales</th>
                                                    <th>Toko</th>
                                                    <th>Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($trx as $no => $t)
                                                    <tr>
                                                        <td>{{ $no + 1 }}</td>
                                                        <td>{{ $t->users->name }}</td>
                                                        <td>{{ $t->data_toko->nama_toko }}</td>
                                                        <td>{{ $t->qty }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                                @if ($user->user_role->id == 1)
                                    @if ($trxh < 10)
                                        <div class="row justify-content-center my-1">
                                            <a href="{{ url('/transaksi/create/' . $d) }}"
                                                class="btn btn-primary btn-sm round"><i data-feather="plus"></i>
                                                Tambah</a>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    {{-- Senin, {{ date('Y-m-d', strtotime('monday this week', strtotime($date))) }}
                                    Selasa, {{ date('Y-m-d', strtotime('tuesday this week', strtotime($date))) }} --}}
                                    Rabu, {{ date('Y-m-d', strtotime('wednesday this week', strtotime($date))) }}
                                    {{-- Kamis, {{ date('Y-m-d', strtotime('thursday this week', strtotime($date))) }}
                                    Jumat, {{ date('Y-m-d', strtotime('friday this week', strtotime($date))) }}
                                    Sabtu, {{ date('Y-m-d', strtotime('saturday this week', strtotime($date))) }}
                                    Minggu, {{ date('Y-m-d', strtotime('sunday this week', strtotime($date))) }} --}}
                                </div>
                                @php
                                    $d = date('Y-m-d', strtotime('wednesday this week', strtotime($date)));
                                    $trx = Transaksi::where('tanggal', date('Y-m-d', strtotime('wednesday this week', strtotime($date))))->get();
                                    $trxh = Transaksi::where('tanggal', date('Y-m-d', strtotime('wednesday this week', strtotime($date))))->count();
                                    // dd($trxh);
                                @endphp
                                @if ($trx)
                                    <div class="table-responsive">
                                        <table class="table table-sm table-hover-animation">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Sales</th>
                                                    <th>Toko</th>
                                                    <th>Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($trx as $no => $t)
                                                    <tr>
                                                        <td>{{ $no + 1 }}</td>
                                                        <td>{{ $t->users->name }}</td>
                                                        <td>{{ $t->data_toko->nama_toko }}</td>
                                                        <td>{{ $t->qty }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                                @if ($user->user_role->id == 1)
                                    @if ($trxh < 10)
                                        <div class="row justify-content-center my-1">
                                            <a href="{{ url('/transaksi/create/' . $d) }}"
                                                class="btn btn-primary btn-sm round"><i data-feather="plus"></i>
                                                Tambah</a>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    {{-- Senin, {{ date('Y-m-d', strtotime('monday this week', strtotime($date))) }}
                                    Selasa, {{ date('Y-m-d', strtotime('tuesday this week', strtotime($date))) }}
                                    Rabu, {{ date('Y-m-d', strtotime('wednesday this week', strtotime($date))) }} --}}
                                    Kamis, {{ date('Y-m-d', strtotime('thursday this week', strtotime($date))) }}
                                    {{-- Jumat, {{ date('Y-m-d', strtotime('friday this week', strtotime($date))) }}
                                    Sabtu, {{ date('Y-m-d', strtotime('saturday this week', strtotime($date))) }}
                                    Minggu, {{ date('Y-m-d', strtotime('sunday this week', strtotime($date))) }} --}}
                                </div>
                                @php
                                    $d = date('Y-m-d', strtotime('thursday this week', strtotime($date)));
                                    $trx = Transaksi::where('tanggal', date('Y-m-d', strtotime('thursday this week', strtotime($date))))->get();
                                    $trxh = Transaksi::where('tanggal', date('Y-m-d', strtotime('thursday this week', strtotime($date))))->count();
                                    // dd($trxh);
                                @endphp
                                @if ($trx)
                                    <div class="table-responsive">
                                        <table class="table table-sm table-hover-animation">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Sales</th>
                                                    <th>Toko</th>
                                                    <th>Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($trx as $no => $t)
                                                    <tr>
                                                        <td>{{ $no + 1 }}</td>
                                                        <td>{{ $t->users->name }}</td>
                                                        <td>{{ $t->data_toko->nama_toko }}</td>
                                                        <td>{{ $t->qty }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                                @if ($user->user_role->id == 1)
                                    @if ($trxh < 10)
                                        <div class="row justify-content-center my-1">
                                            <a href="{{ url('/transaksi/create/' . $d) }}"
                                                class="btn btn-primary btn-sm round"><i data-feather="plus"></i>
                                                Tambah</a>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    {{-- Senin, {{ date('Y-m-d', strtotime('monday this week', strtotime($date))) }}
                                    Selasa, {{ date('Y-m-d', strtotime('tuesday this week', strtotime($date))) }}
                                    Rabu, {{ date('Y-m-d', strtotime('wednesday this week', strtotime($date))) }}
                                    Kamis, {{ date('Y-m-d', strtotime('thursday this week', strtotime($date))) }} --}}
                                    Jumat, {{ date('Y-m-d', strtotime('friday this week', strtotime($date))) }}
                                    {{-- Sabtu, {{ date('Y-m-d', strtotime('saturday this week', strtotime($date))) }}
                                    Minggu, {{ date('Y-m-d', strtotime('sunday this week', strtotime($date))) }} --}}
                                </div>
                                @php
                                    $d = date('Y-m-d', strtotime('friday this week', strtotime($date)));
                                    $trx = Transaksi::where('tanggal', date('Y-m-d', strtotime('friday this week', strtotime($date))))->get();
                                    $trxh = Transaksi::where('tanggal', date('Y-m-d', strtotime('friday this week', strtotime($date))))->count();
                                    // dd($trxh);
                                @endphp
                                @if ($trx)
                                    <div class="table-responsive">
                                        <table class="table table-sm table-hover-animation">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Sales</th>
                                                    <th>Toko</th>
                                                    <th>Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($trx as $no => $t)
                                                    <tr>
                                                        <td>{{ $no + 1 }}</td>
                                                        <td>{{ $t->users->name }}</td>
                                                        <td>{{ $t->data_toko->nama_toko }}</td>
                                                        <td>{{ $t->qty }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                                @if ($user->user_role->id == 1)
                                    @if ($trxh < 10)
                                        <div class="row justify-content-center my-1">
                                            <a href="{{ url('/transaksi/create/' . $d) }}"
                                                class="btn btn-primary btn-sm round"><i data-feather="plus"></i>
                                                Tambah</a>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    {{-- Senin, {{ date('Y-m-d', strtotime('monday this week', strtotime($date))) }}
                                    Selasa, {{ date('Y-m-d', strtotime('tuesday this week', strtotime($date))) }}
                                    Rabu, {{ date('Y-m-d', strtotime('wednesday this week', strtotime($date))) }}
                                    Kamis, {{ date('Y-m-d', strtotime('thursday this week', strtotime($date))) }}
                                    Jumat, {{ date('Y-m-d', strtotime('friday this week', strtotime($date))) }} --}}
                                    Sabtu, {{ date('Y-m-d', strtotime('saturday this week', strtotime($date))) }}
                                    {{-- Minggu, {{ date('Y-m-d', strtotime('sunday this week', strtotime($date))) }} --}}
                                </div>
                                @php
                                    $d = date('Y-m-d', strtotime('saturday this week', strtotime($date)));
                                    $trx = Transaksi::where('tanggal', date('Y-m-d', strtotime('saturday this week', strtotime($date))))->get();
                                    $trxh = Transaksi::where('tanggal', date('Y-m-d', strtotime('saturday this week', strtotime($date))))->count();
                                    // dd($trxh);
                                @endphp
                                @if ($trx)
                                    <div class="table-responsive">
                                        <table class="table table-sm table-hover-animation">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Sales</th>
                                                    <th>Toko</th>
                                                    <th>Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($trx as $no => $t)
                                                    <tr>
                                                        <td>{{ $no + 1 }}</td>
                                                        <td>{{ $t->users->name }}</td>
                                                        <td>{{ $t->data_toko->nama_toko }}</td>
                                                        <td>{{ $t->qty }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                                @if ($user->user_role->id == 1)
                                    @if ($trxh < 10)
                                        <div class="row justify-content-center my-1">
                                            <a href="{{ url('/transaksi/create/' . $d) }}"
                                                class="btn btn-primary btn-sm round"><i data-feather="plus"></i>
                                                Tambah</a>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    {{-- Senin, {{ date('Y-m-d', strtotime('monday this week', strtotime($date))) }}
                                    Selasa, {{ date('Y-m-d', strtotime('tuesday this week', strtotime($date))) }}
                                    Rabu, {{ date('Y-m-d', strtotime('wednesday this week', strtotime($date))) }}
                                    Kamis, {{ date('Y-m-d', strtotime('thursday this week', strtotime($date))) }}
                                    Jumat, {{ date('Y-m-d', strtotime('friday this week', strtotime($date))) }}
                                    Sabtu, {{ date('Y-m-d', strtotime('saturday this week', strtotime($date))) }} --}}
                                    Minggu, {{ date('Y-m-d', strtotime('sunday this week', strtotime($date))) }}
                                </div>
                                @php
                                    $d = date('Y-m-d', strtotime('sunday this week', strtotime($date)));
                                    $trx = Transaksi::where('tanggal', date('Y-m-d', strtotime('sunday this week', strtotime($date))))->get();
                                    $trxh = Transaksi::where('tanggal', date('Y-m-d', strtotime('sunday this week', strtotime($date))))->count();
                                    // dd($trxh);
                                @endphp
                                @if ($trx)
                                    <div class="table-responsive">
                                        <table class="table table-sm table-hover-animation">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Sales</th>
                                                    <th>Toko</th>
                                                    <th>Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($trx as $no => $t)
                                                    <tr>
                                                        <td>{{ $no + 1 }}</td>
                                                        <td>{{ $t->users->name }}</td>
                                                        <td>{{ $t->data_toko->nama_toko }}</td>
                                                        <td>{{ $t->qty }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                                @if ($user->user_role->id == 1)
                                    @if ($trxh < 10)
                                        <div class="row justify-content-center my-1">
                                            <a href="{{ url('/transaksi/create/' . $d) }}"
                                                class="btn btn-primary btn-sm round"><i data-feather="plus"></i>
                                                Tambah</a>
                                        </div>
                                    @endif
                                @endif
                            </div>

                        </div>
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>


    <div class="modal modal-slide-in sidebar-todo-modal fade" id="filter">
        <div class="modal-dialog sidebar-lg">
            <div class="modal-content p-0">
                <div class="modal-header align-items-center mb-1">
                    <h5 class="modal-title">Filter</h5>
                    <div class="todo-item-action justify-content-end">
                        <button type="button" class="close font-large-1 font-weight-normal py-0" data-dismiss="modal"
                            aria-label="Close">
                            ×
                        </button>
                    </div>
                </div>
                <form action="{{ url('home') }}" method="POST">
                    @csrf
                    @method('POST')
                    {{-- <input type="hidden" name="type" value="toko"> --}}
                    <div class="modal-body flex-grow-1 pb-sm-0 pb-3">

                        <div class="action-tags">
                            <div class="form-group">
                                <label for="todoTitleAdd" class="form-label">Dari tanggal</label>
                                <input type="date" id="todoTitleAdd" name="dari" class="new-todo-item-title form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="todoTitleAdd" class="form-label">Ke tanggal</label>
                                <input type="date" id="todoTitleAdd" name="ke" class="new-todo-item-title form-control"
                                    required>
                            </div>

                        </div>
                        <div class="form-group my-1">
                            <button type="submit" class="btn btn-primary add-todo-item mr-1">Filter</button>
                            <button type="button" class="btn btn-outline-secondary add-todo-item" data-dismiss="modal">
                                Cancel
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal modal-slide-in sidebar-todo-modal fade" id="addtransaksi">
        <div class="modal-dialog sidebar-lg">
            <div class="modal-content p-0">
                <div class="modal-header align-items-center mb-1">
                    <h5 class="modal-title">Filter</h5>
                    <div class="todo-item-action justify-content-end">
                        <button type="button" class="close font-large-1 font-weight-normal py-0" data-dismiss="modal"
                            aria-label="Close">
                            ×
                        </button>
                    </div>
                </div>
                <form action="{{ url('home') }}" method="POST">
                    @csrf
                    @method('POST')
                    {{-- <input type="hidden" name="type" value="toko"> --}}
                    <div class="modal-body flex-grow-1 pb-sm-0 pb-3">

                        <div class="action-tags">
                            <div class="form-group">
                                <label for="todoTitleAdd" class="form-label">Dari tanggal</label>
                                <input type="date" id="todoTitleAdd" name="dari" class="new-todo-item-title form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="todoTitleAdd" class="form-label">Ke tanggal</label>
                                <input type="date" id="todoTitleAdd" name="ke" class="new-todo-item-title form-control"
                                    required>
                            </div>

                        </div>
                        <div class="form-group my-1">
                            <button type="submit" class="btn btn-primary add-todo-item mr-1">Filter</button>
                            <button type="button" class="btn btn-outline-secondary add-todo-item" data-dismiss="modal">
                                Cancel
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection


@push('script')


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>
    <script src="{{ asset('/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('/js/core/app.min.js') }}"></script>
    <script src="{{ asset('/js/scripts/customizer.min.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('/js/scripts/forms/form-wizard.min.js') }}"></script>

@endpush
