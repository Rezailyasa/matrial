@php
// use App\Models\Data_kelas;
// use App\Models\Setting_kelas_siswa;
// use App\Models\Setting_kontrak_pengajaran;
// use App\Models\Setting_materi_pertemuan;
// use App\Models\Setting_master_materi;
// use App\Models\Data_jawaban_materi_pembelajaran;
@endphp

@extends('layouts.app')
@push('css')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
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
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/plugins/forms/pickers/form-flat-pickr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/pages/app-invoice-print.min.css') }}">
@endpush
@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="invoice-print p-3">
                    <div class="d-flex justify-content-between flex-md-row flex-column pb-2">
                        <div>
                            <div class="d-flex mb-1">
                                <img src="{{ asset('/images/logo/logosmk.png') }}" height="28" width="28" alt="">
                                <h3 class="text-primary font-weight-bold ml-1">UD CIPTA INDAH</h3>
                            </div>
                            <h4 class="card-text mb-25">Distributor Bahan Bangunan</h4>
                            <h4 class="card-text mb-25">Desa Kalipasung Dusun 04 RT 01 RW 07 Kec. Gebang
                                Kab.
                                Cirebon</h4>
                            <h4 class="card-text mb-0">082127059313</h4>
                        </div>
                        <div class="mt-md-0 mt-2">
                            <h4 class="font-weight-bold text-right mb-1">INVOICE #{{ $trx->no_invoice }}</h4>
                            <div class="invoice-date-wrapper mb-50">
                                <h4 class="invoice-date-title">Tanggal:</h4>
                                <h4 class="font-weight-bold"> {{ $trx->tanggal }}</h4>
                            </div>
                        </div>
                    </div>

                    <hr class="my-2">

                    <div class="row pb-2">
                        <div class="col-sm-6">
                            <h3 class="mb-2">Toko:</h3>
                            <h3 class="mb-25">{{ $trx->data_toko->nama_toko }}</h3>
                            <h4 class="mb-25">{{ $trx->data_toko->alamat }}</h4>
                            <h4 class="mb-25">{{ $trx->data_toko->nama_pemilik }}</h4>
                            <h4 class="mb-25">{{ $trx->data_toko->no_tlp }}</h4>
                        </div>

                        <div class="col-sm-6 mt-sm-0 mt-2">
                            <h3 class="mb-2">Sales:</h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="pr-1">
                                            <h4>Sales:</h4>
                                        </td>
                                        <td>
                                            <h4 class="font-weight-bold">{{ $trx->users->name }}</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <h3 class="mb-25 mt-2">Tipe Pembayaran:</h3>
                            <h4 class="card-text mb-25">{{ $trx->type_pembayaran }},
                                {{ $trx->is_lunas }}</h4>
                        </div>
                    </div>

                    <div class="table-responsive mt-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="py-1">
                                        <h4> Nama Barang</h4>
                                    </th>
                                    <th class="py-1">
                                        <h4>Harga</h4>
                                    </th>
                                    <th class="py-1">
                                        <h4>Qty</h4>
                                    </th>
                                    <th class="py-1">
                                        <h4>Total</h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-1">
                                        <h4 class="font-weight-bold">{{ $trx->data_barang->nama_barang }} -
                                            {{ $trx->data_barang->ukuran }}</h4>
                                    </td>
                                    <td class="py-1">
                                        {{-- @php
                                            $h = $trx->data_komisi->margin + $trx->kelebihankomisi + $harga->harga;
                                        @endphp --}}
                                        <h4 class="font-weight-bold">Rp.
                                            {{ number_format($trx->harga_jual, 0, '', '.') }} <u> X
                                                12,6</u></h4>
                                    </td>
                                    <td class="py-1">
                                        <h4 class="font-weight-bold">{{ $trx->qty }}</h4>
                                    </td>
                                    <td class="py-1">
                                        <h4 class="font-weight-bold">Rp.
                                            {{ number_format($trx->total, 0, '', '.') }}</h4>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <div class="row invoice-sales-total-wrapper mt-3">
                        <div class="col-md-4 order-md-1 order-2 mt-md-0 mt-3">
                        </div>
                        <div class="col-md-8 d-flex justify-content-end order-md-2 order-4">
                            <div class="invoice-total-wrapper">
                                <div class="invoice-total-item">
                                    <h4 class="invoice-total-title">Harga:</h4>
                                    <h4 class="invoice-total-amount">Rp.
                                        {{ number_format($trx->harga_jual, 0, '', '.') }}</h4>
                                </div>
                                <div class="invoice-total-item">
                                    <h4 class="invoice-total-title">Qty:</h4>
                                    <h4 class="invoice-total-amount">{{ $trx->qty }}</h4>
                                </div>
                                <hr class="my-50">
                                <div class="invoice-total-item">
                                    <h4 class="invoice-total-title">Total: Rp.</h4>
                                    <h4 class="invoice-total-amount">{{ number_format($trx->total, 0, '', '.') }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-2">

                    <div class="row">
                        <div class="col-12">
                            <h3 class="font-weight-bold">Catatan:</h3>
                            <h4>{{ $trx->catatan }}</h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->

    @php
    $r = json_encode($tokos);
    // dd($r);
    @endphp
@endsection


@push('script')


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('/js/core/app.min.js') }}"></script>
    <script src="{{ asset('/js/scripts/customizer.min.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->

    <script src="{{ asset('/js/scripts/pages/app-invoice-print.min.js') }}"></script>

@endpush
