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
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-primary" role="alert">
                            <div class="alert-body">
                                <strong>Info:</strong> Daftar transaksi yang sudah dilakukan dan memfilter transaksi. Filter
                                berdasarkan
                                @if ($dari == null && $ke == null)
                                    <strong>Hari ini</strong>
                                @elseif ($dari == date('Y-m-d') && $ke == date('Y-m-d'))
                                    <strong>Hari ini</strong>
                                @else
                                    <strong>dari tanggal {{ $dari }} ke tanggal {{ $ke }}</strong>
                                @endif
                                {{-- @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">

                    <div class="row p-2 justify-content-between">
                        <div class="col-lg-6 col-sm-4">
                            <h4>Daftar Transaksi</h4>
                        </div>
                        <div class="col-lg-6 col-sm-8 text-right content-justify-end">
                            <a href="{{ url('/print/' . $dari . '/' . $ke) }}" target="_blank"
                                class="btn btn-success round btn-icon"><i data-feather="printer"></i> <span
                                    class="align-middle d-sm-inline-block d-none">Print</span></a>
                            <button class="btn btn-primary btn-icon round" data-toggle="modal" data-target="#filter"><i
                                    data-feather="filter"></i> <span
                                    class="align-middle d-sm-inline-block d-none">Filter</span></button>
                        </div>
                    </div>
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

        </section>
        <!-- users edit ends -->

    </div>

    @foreach ($transaksi as $trk)
        <div class="modal fade modal-danger text-left" id="deletetrk{{ $trk->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel120" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel120">Delete transaksi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('transaksi') }}/{{ $trk->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="type" value="kirim">

                        <div class="modal-body">
                            Anda akan menghapus:
                            <br>
                            <br>
                            <strong>Toko: {{ $trk->data_toko->nama_toko }}</strong><br>
                            <strong>Sales: {{ $trk->users->name }}</strong><br>
                            <strong>Total: Rp. {{ $trk->total }}</strong>
                            <br>
                            <br>
                            Pastikan data yang akan dihapus tidak digunakan lagi!
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach


    {{-- modal filter --}}
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
                <form action="{{ url('laporan') }}" method="POST">
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
