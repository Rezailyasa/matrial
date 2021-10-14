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
                <div class="invoice-print p-1">
                    <div class="d-flex justify-content-between flex-md-row flex-column pb-2">
                        <div>
                            <div class="d-flex mb-1">
                                <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                    <defs>
                                        <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%"
                                            y2="89.4879456%">
                                            <stop stop-color="#000000" offset="0%"></stop>
                                            <stop stop-color="#FFFFFF" offset="100%"></stop>
                                        </lineargradient>
                                        <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%"
                                            x2="37.373316%" y2="100%">
                                            <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                            <stop stop-color="#FFFFFF" offset="100%"></stop>
                                        </lineargradient>
                                    </defs>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                            <g id="Group" transform="translate(400.000000, 178.000000)">
                                                <path class="text-primary" id="Path"
                                                    d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                                    style="fill: currentColor"></path>
                                                <path id="Path1"
                                                    d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                                    fill="url(#linearGradient-1)" opacity="0.2"></path>
                                                <polygon id="Path-2" fill="#000000" opacity="0.049999997"
                                                    points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325">
                                                </polygon>
                                                <polygon id="Path-21" fill="#000000" opacity="0.099999994"
                                                    points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338">
                                                </polygon>
                                                <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994"
                                                    points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288">
                                                </polygon>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <h3 class="text-primary font-weight-bold ml-1">UD CIPTA INDAH</h3>
                            </div>
                            <h3 class="card-text mb-25">Distributor Bahan Bangunan</h3>
                            <h3 class="card-text mb-25">Desa Kalipasung Dusun 04 RT 01 RW 07 Kec. Gebang
                                Kab.
                                Cirebon</h3>
                            <h3 class="card-text mb-0">082127059313</h3>
                        </div>
                        <div class="mt-md-0 mt-2">
                            {{-- <h4 class="font-weight-bold text-right mb-1">INVOICE #{{ $trx->no_invoice }}</h4> --}}
                            <div class="invoice-date-wrapper mb-50">
                                <span class="invoice-date-title">Tanggal:</span>
                                <span class="font-weight-bold"> {{ date('d-m-Y') }}</span>
                            </div>
                            <div class="invoice-date-wrapper mb-50">
                                <span class="invoice-date-title">Laporan:</span>
                                <span class="font-weight-bold">{{ $dari }} - {{ $ke }}</span>
                                {{-- <span class="font-weight-bold">Ke Tanggal: </span> --}}
                            </div>
                        </div>
                    </div>

                    <hr class="my-2">

                    <div class="table-responsive">
                        <table class="table table-sm table-hover-animation">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No Invoice</th>
                                    <th>Tanggal</th>
                                    <th>Nama Toko</th>
                                    <th>Tipe pembayaran</th>
                                    <th>Lunas</th>
                                    {{-- <th>Catatan</th> --}}
                                    <th>Sales</th>
                                    <th>Qty</th>
                                    <th>Harga modal</th>
                                    <th>Harga jual</th>
                                    <th>Komisi</th>
                                    <th>Komisi Tambahan</th>
                                    <th>Biaya Kirim</th>
                                    <th>Total</th>
                                    {{-- <th>Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalongkir = 0;
                                    $totalkom = 0;
                                    $totalm = 0;
                                @endphp
                                @foreach ($transaksi as $no => $trk)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>
                                            <span class="font-weight-bold">{{ $trk->no_invoice }}</span>
                                        </td>
                                        <td>{{ $trk->tanggal }}</td>
                                        <td>{{ $trk->data_toko->nama_toko }}</td>
                                        <td>{{ $trk->type_pembayaran }}</td>
                                        <td>
                                            @if ($trk->is_lunas == 'Lunas')
                                                <span
                                                    class="badge badge-pill badge-light-success mr-1">{{ $trk->is_lunas }}</span>
                                            @else
                                                <span
                                                    class="badge badge-pill badge-light-danger mr-1">{{ $trk->is_lunas }}</span>

                                            @endif
                                        </td>
                                        {{-- <td>{{ $trk->catatan }}</td> --}}
                                        <td>{{ $trk->users->name }}</td>
                                        <td>{{ $trk->qty }}</td>
                                        <td>Rp. {{ number_format($trk->data_harga->harga, 0, '', '.') }}</td>
                                        <td>Rp.
                                            {{ number_format($trk->harga_jual, 0, '', '.') }}
                                        </td>
                                        <td>Rp. {{ number_format($trk->data_komisi->komisi, 0, '', '.') }}</td>
                                        <td>Rp. {{ number_format($trk->kelebihankomisi, 0, '', '.') }}</td>
                                        <td>{{ $trk->data_toko->data_biaya_kirim->daerah }} - Rp.
                                            {{ number_format($trk->data_toko->data_biaya_kirim->biaya_kirim, 0, '', '.') }}
                                        </td>
                                        <td>Rp. {{ number_format($trk->total, 0, '', '.') }}</td>
                                        {{-- <td>
                                            <a href="{{ url('/noinvoice/' . $trk->id) }}"
                                                class="btn btn-success round btn-icon"><i data-feather="eye"></i></a>
                                            <a href="{{ url('/editinvoice/' . $trk->id) }}"
                                                class="btn btn-primary round btn-icon"><i data-feather="edit-2"></i></a>
                                            <button class="btn btn-danger round btn-icon"><i data-feather="trash"
                                                    data-toggle="modal"
                                                    data-target="#deletetrk{{ $trk->id }}"></i></button>
                                        </td> --}}
                                    </tr>
                                    @php
                                        $totalm = $totalm + $trk->data_harga->harga * $trk->qty * 12.6;
                                        $totalkom = $totalkom + $trk->data_komisi->komisi + $trk->kelebihankomisi;
                                        $totalongkir = $totalongkir + $trk->data_toko->data_biaya_kirim->biaya_kirim;
                                    @endphp
                                @endforeach
                                <tr>
                                    <td colspan="13" class="text-right"><B>Total Akhir</B></td>
                                    <td colspan="2" class="text-right"><B>Rp.
                                            {{ number_format($totalakhir, 0, '', '.') }}</B></td>
                                </tr>
                                <hr>
                                <tr>
                                    <td colspan="13" class="text-right"><B>Total Modal</B></td>
                                    <td colspan="2" class="text-right"><B>Rp.
                                            {{ number_format($totalm, 0, '', '.') }}</B></td>
                                </tr>
                                <tr>
                                    <td colspan="13" class="text-right"><B>Total Komisi</B></td>
                                    <td colspan="2" class="text-right"><B>Rp.
                                            {{ number_format($totalkom, 0, '', '.') }}</B></td>
                                </tr>
                                <tr>
                                    <td colspan="13" class="text-right"><B>Total Biaya Kirim</B></td>
                                    <td colspan="2" class="text-right"><B>Rp.
                                            {{ number_format($totalongkir, 0, '', '.') }}</B></td>
                                </tr>
                                <tr>
                                    <hr>
                                    <td colspan="13" class="text-right"><B>Total Laba</B></td>
                                    <td colspan="2" class="text-right"><B>Rp.
                                            {{ number_format($totalakhir - $totalm - $totalkom - $totalongkir, 0, '', '.') }}</B>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
