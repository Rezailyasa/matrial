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
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/pages/app-invoice.min.css') }}">
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
                <section class="invoice-add-wrapper">
                    <div class="row invoice-preview">
                        <!-- Invoice -->
                        <div class="col-xl-9 col-md-8 col-12">
                            <div class="card invoice-preview-card">
                                <div class="card-body invoice-padding pb-0">
                                    <!-- Header starts -->
                                    <div
                                        class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                        <div>
                                            <div class="logo-wrapper">
                                                <img src="{{ asset('/images/logo/logosmk.png') }}" height="28" width="28"
                                                    alt="">
                                                <h3 class="text-primary invoice-logo">UD CIPTA INDAH</h3>
                                            </div>
                                            <p class="card-text mb-25">Distributor Bahan Bangunan</p>
                                            <p class="card-text mb-25">Desa Kalipasung Dusun 04 RT 01 RW 07 Kec. Gebang
                                                Kab.
                                                Cirebon</p>
                                            <p class="card-text mb-0">082127059313</p>
                                        </div>
                                        <div class="mt-md-0 mt-2">
                                            <h4 class="invoice-title">
                                                Invoice
                                                <span class="invoice-number">#{{ $trx->no_invoice }}</span>
                                            </h4>
                                            <div class="invoice-date-wrapper">
                                                <p class="invoice-date-title">Tanggal:</p>
                                                <p class="invoice-date">{{ $trx->tanggal }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Header ends -->
                                </div>

                                <hr class="invoice-spacing">

                                <!-- Address and Contact starts -->
                                <div class="card-body invoice-padding pt-0">
                                    <div class="row invoice-spacing">
                                        <div class="col-xl-8 p-0">
                                            <h6 class="mb-2">Toko:</h6>
                                            <h6 class="mb-25">{{ $trx->data_toko->nama_toko }}</h6>
                                            <p class="card-text mb-25">{{ $trx->data_toko->nama_pemilik }}</p>
                                            <p class="card-text mb-25">{{ $trx->data_toko->alamat }}</p>
                                            <p class="card-text mb-25">{{ $trx->data_toko->no_tlp }}</p>
                                        </div>
                                        <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                            <h6 class="mb-2">Sales:</h6>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="pr-1">Sales:</td>
                                                        <td><span class="font-weight-bold">{{ $trx->users->name }}</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <h6 class="mb-25 mt-2">Tipe Pembayaran:</h6>
                                            <p class="card-text mb-25">{{ $trx->type_pembayaran }},
                                                {{ $trx->is_lunas }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Address and Contact ends -->

                                <!-- Invoice Description starts -->
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="py-1">Nama Barang</th>
                                                <th class="py-1">Qty</th>
                                                <th class="py-1">Harga</th>
                                                <th class="py-1">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="py-1">
                                                    <span class="font-weight-bold">{{ $trx->data_barang->nama_barang }} -
                                                        {{ $trx->data_barang->ukuran }}</span>
                                                </td>
                                                <td class="py-1">
                                                    <span class="font-weight-bold">{{ $trx->qty }}</span>
                                                </td>
                                                <td class="py-1">
                                                    @php
                                                        $h = $trx->data_komisi->margin + $trx->kelebihankomisi + $harga->harga;
                                                    @endphp
                                                    <span class="font-weight-bold">Rp.
                                                        {{ number_format($trx->harga_jual, 0, '', '.') }} <u> X
                                                            12,6</u></span>
                                                </td>
                                                <td class="py-1">
                                                    <span class="font-weight-bold">Rp.
                                                        {{ number_format($trx->total, 0, '', '.') }}</span>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="card-body invoice-padding pb-0">
                                    <div class="row invoice-sales-total-wrapper">
                                        <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                                            {{-- <p class="card-text mb-0">
                                                <span class="font-weight-bold">Salesperson:</span> <span class="ml-75">Alfie
                                                    Solomons</span>
                                            </p> --}}
                                        </div>
                                        <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
                                            <div class="invoice-total-wrapper">
                                                <div class="invoice-total-item">
                                                    <p class="invoice-total-title">Harga:</p>
                                                    <p class="invoice-total-amount">Rp.
                                                        {{ number_format($trx->harga_jual, 0, '', '.') }}</p>
                                                </div>
                                                <div class="invoice-total-item">
                                                    <p class="invoice-total-title">Qty:</p>
                                                    <p class="invoice-total-amount">{{ $trx->qty }}</p>
                                                </div>
                                                <hr class="my-50">
                                                <div class="invoice-total-item">
                                                    <p class="invoice-total-title">Total:</p>
                                                    <p class="invoice-total-amount">Rp.
                                                        {{ number_format($trx->total, 0, '', '.') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Invoice Description ends -->

                                <hr class="invoice-spacing">

                                <!-- Invoice Note starts -->
                                <div class="card-body invoice-padding pt-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="font-weight-bold">Catatan:</span>
                                            <span>{{ $trx->catatan }}</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Invoice Note ends -->
                            </div>
                        </div>
                        <!-- /Invoice -->

                        <!-- Invoice Actions -->
                        <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <button class="btn btn-primary btn-block mb-75" data-toggle="modal"
                                        data-target="#send-invoice-sidebar">
                                        Kirim email
                                    </button>
                                    {{-- <button
                                        class="btn btn-outline-secondary btn-block btn-download-invoice mb-75">Download</button> --}}
                                    <a class="btn btn-outline-secondary btn-block mb-75"
                                        href="{{ url('/printinvoice/' . $trx->id) }}" target="_blank">
                                        Print
                                    </a>
                                    <a href="{{ url('/acc/' . $trx->id) }}" class="btn btn-success btn-block mb-75">
                                        Acc Pengiriman
                                    </a>
                                    {{-- <button class="btn btn-success btn-block" data-toggle="modal"
                                        data-target="#add-payment-sidebar">
                                        Add Payment
                                    </button> --}}
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Actions -->
                    </div>
                    <!-- Add New Customer Sidebar -->
                    {{-- <div class="modal modal-slide-in fade" id="add-new-customer-sidebar" aria-hidden="true">
                        <div class="modal-dialog sidebar-lg">
                            <div class="modal-content p-0">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title">
                                        <span class="align-middle">Add Customer</span>
                                    </h5>
                                </div>
                                <div class="modal-body flex-grow-1">
                                    <form>
                                        <div class="form-group">
                                            <label for="customer-name" class="form-label">Customer Name</label>
                                            <input type="text" class="form-control" id="customer-name"
                                                placeholder="John Doe">
                                        </div>
                                        <div class="form-group">
                                            <label for="customer-email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="customer-email"
                                                placeholder="example@domain.com">
                                        </div>
                                        <div class="form-group">
                                            <label for="customer-address" class="form-label">Customer Address</label>
                                            <textarea class="form-control" id="customer-address" cols="2" rows="2"
                                                placeholder="1307 Lady Bug Drive New York"></textarea>
                                        </div>
                                        <div class="form-group position-relative">
                                            <label for="customer-country" class="form-label">Country</label>
                                            <select class="form-control" id="customer-country" name="customer-country">
                                                <option label="select country"></option>
                                                <option value="Australia">Australia</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Russia">Russia</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United States of America">United States of America
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="customer-contact" class="form-label">Contact</label>
                                            <input type="number" class="form-control" id="customer-contact"
                                                placeholder="763-242-9206">
                                        </div>
                                        <div class="form-group d-flex flex-wrap mt-2">
                                            <button type="button" class="btn btn-primary mr-1"
                                                data-dismiss="modal">Add</button>
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- /Add New Customer Sidebar -->
                </section>

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

    <script src="{{ asset('/js/scripts/pages/app-invoice.min.js') }}"></script>

@endpush
