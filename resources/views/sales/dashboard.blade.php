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
                        <button class="btn btn-primary btn-icon round" data-toggle="modal" data-target="#filter"><i
                                data-feather="filter"></i> <span
                                class="align-middle d-sm-inline-block d-none">Filter</span></button>
                    </div>
                    <div class="row justify-content-center mb-1">
                        @if ($dari == date('Y-m-d') && $ke == date('Y-m-d'))
                            <span class="badge badge-pill badge-light-primary mr-1">Komisi hari ini</span>
                        @else
                            <span class="badge badge-pill badge-light-primary mr-1">Komisi tanggal {{ $dari }} -
                                {{ $ke }}</span>
                        @endif
                    </div>
                    <div class="pricing-free-trial">
                        <table class="table table-sm table-hover-animation">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No Invoice</th>
                                    <th>Tanggal</th>
                                    <th>Nama Toko</th>
                                    <th>Qty</th>
                                    <th>Harga jual</th>
                                    <th>Komisi</th>
                                    <th>Komisi Tambahan</th>
                                    <th>Total</th>
                                    {{-- <th>Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalkomisi = 0;
                                    $totkel = 0;
                                @endphp
                                @foreach ($transaksii as $no => $trk)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>
                                            <span class="font-weight-bold">{{ $trk->no_invoice }}</span>
                                        </td>
                                        <td>{{ $trk->tanggal }}</td>
                                        <td>{{ $trk->data_toko->nama_toko }}</td>
                                        <td>{{ $trk->qty }}</td>
                                        <td>Rp.
                                            {{ number_format($trk->data_komisi->margin + $trk->kelebihankomisi + $trk->data_harga->harga, 0, '', '.') }}
                                        </td>
                                        <td>Rp. {{ number_format($trk->data_komisi->komisi, 0, '', '.') }}</td>
                                        <td>Rp. {{ number_format($trk->kelebihankomisi, 0, '', '.') }}</td>
                                        <td>Rp. {{ number_format($trk->total, 0, '', '.') }}</td>
                                    </tr>
                                    @php
                                        $totalkomisi = $totalkomisi + $trk->data_komisi->komisi + $trk->kelebihankomisi;
                                        $totkel = $totkel + $trk->data_toko->data_biaya_kirim->biaya_kirim + $trk->data_komisi->komisi + $trk->kelebihankomisi * 12.6;
                                    @endphp
                                @endforeach

                                <tr>
                                    <td colspan="8" class="text-right"><B>Total Komisi</B></td>
                                    <td class="text-left"><B>Rp.
                                            {{ number_format($totalkomisi, 0, '', '.') }}</B></td>
                                </tr>

                            </tbody>
                        </table>
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
