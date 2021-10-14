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
                    <div class="row match-height">
                        <!-- User Card starts-->
                        <div class="col-xl-9 col-lg-8 col-md-7 ">
                            <div class="card user-card">
                                {{-- <form action="{{url('user/'.$user->id)}}" method="POST" enctype="multipart/form-data">
								@csrf
								@method('PUT') --}}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-5 col-lg-12 media mb-2">
                                            <img src="{{ asset('/images/profile_user/' . $sales->image) }}"
                                                alt="users avatar"
                                                class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer"
                                                height="90" width="90">
                                            <div class="media-body mt-50">
                                                <h4>{{ $sales->name }}</h4>
                                                <div class="col-12 d-flex mt-1 px-0">
                                                    {{-- <label class="btn btn-primary mr-75 mb-0" for="change-picture">
                                                        <span class="d-none d-sm-block">Change</span>
                                                        <input class="form-control" type="file" id="change-picture"
                                                            hidden="" accept="image/png, image/jpeg, image/jpg" name="file"
                                                            required>
                                                        <span class="d-block d-sm-none">
                                                            <i class="mr-0" data-feather="edit"></i>
                                                        </span>
                                                    </label> --}}

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-xl-7 col-lg-12 mt-2 mt-xl-0">
                                            <div class="user-info-wrapper">
                                                <div class="d-flex flex-wrap">
                                                    <div class="user-info-title">
                                                        <i data-feather="user" class="mr-1"></i>
                                                        <span
                                                            class="card-text user-info-title font-weight-bold mb-0">Nama</span>
                                                    </div>
                                                    <p class="card-text mb-0">
                                                        {{ $sales->name }}</p>
                                                </div>
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="mail" class="mr-1"></i>
                                                        <span
                                                            class="card-text user-info-title font-weight-bold mb-0">Email</span>
                                                    </div>
                                                    <p class="card-text mb-0">
                                                        {{ $sales->email }}</p>
                                                </div>
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="check" class="mr-1"></i>
                                                        <span
                                                            class="card-text user-info-title font-weight-bold mb-0">Status</span>
                                                    </div>
                                                    <p class="card-text mb-0">Active</p>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="row ml-2 mt-1">
                                            <button class="btn btn-success btn-icon"><i data-feather="save"></i>
                                                Save
                                                change</button>
                                        </div> --}}
                                    </div>
                                </div>
                                {{-- </form> --}}
                            </div>
                        </div>
                        <!-- /User Card Ends-->

                        <!-- Plan Card starts-->
                        <div class="col-xl-3 col-lg-4 col-md-5">
                            <div class="card plan-card border-primary">
                                <div class="card-header d-flex justify-content-between align-items-center pt-75 pb-1">
                                    <h5 class="mb-0">Total Penjualan </h5>
                                    <span class="badge badge-light-secondary" data-toggle="tooltip" data-placement="top"
                                        title="Expiry Date">{{ date('Y-m-d') }}<span class="nextYear"></span>
                                    </span>
                                </div>
                                <div class="card-body text-center">
                                    <h4>{{ $transaksi }}</h2>
                                </div>
                            </div>
                            <div class="card plan-card border-primary">
                                <div class="card-header d-flex justify-content-between align-items-center pt-75 pb-1">
                                    <h5 class="mb-0">Total Komisi </h5>
                                    <span class="badge badge-light-secondary" data-toggle="tooltip" data-placement="top"
                                        title="Expiry Date">{{ date('Y-m-d') }}<span class="nextYear"></span>
                                    </span>
                                </div>
                                <div class="card-body text-center">
                                    <h4>Rp. {{ $totalkomisi }}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- /Plan CardEnds -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    @if ($dari == null && $ke == null)
                                        <h4><i> Hari ini:</i></h4>
                                    @elseif ($dari == date('d-m-Y') && $ke == date('d-m-Y'))
                                        <h4><i> Hari ini:</i></h4>
                                    @else
                                        <h4><i> Dari tanggal {{ $dari }} ke tanggal
                                                {{ $ke }}:</i></h4>
                                    @endif
                                    <button class="btn btn-primary btn-icon round" data-toggle="modal"
                                        data-target="#filter"><i data-feather="filter"></i> <span
                                            class="align-middle d-sm-inline-block d-none">Filter</span></button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover-animation">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Toko</th>
                                                <th>Tanggal</th>
                                                <th>Wilayah</th>
                                                <th>Harga Dasar</th>
                                                <th>Harga Margin</th>
                                                <th>Biaya Kirim</th>
                                                <th>Komisi</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaksis as $no => $trx)
                                                <tr>
                                                    <td>{{ $no + 1 }}</td>
                                                    <td>{{ $trx->data_toko->nama_toko }}</td>
                                                    <td>{{ $trx->tanggal }}</td>
                                                    <td>{{ $trx->data_toko->data_biaya_kirim->daerah }}</td>
                                                    <td>Rp. {{ $trx->data_harga->harga }}</td>
                                                    <td>Rp. {{ $trx->data_komisi->margin }}</td>
                                                    <td>Rp. {{ $trx->data_toko->data_biaya_kirim->biaya_kirim }}</td>
                                                    <td>Rp. {{ $trx->data_komisi->komisi }}</td>
                                                    <td>Rp. {{ $trx->total }}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td class="text-right" colspan="7"><strong>Total:</strong></td>
                                                <td>Rp. {{ $komisi }}</td>
                                                <td>Rp. {{ $totalakhir }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

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
                <form action="{{ url('salesdetail') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="id" value="{{ $sales->id }}">
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
