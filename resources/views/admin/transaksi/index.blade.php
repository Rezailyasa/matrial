@php
use App\Models\Data_kelas;
use App\Models\Setting_kelas_siswa;
use App\Models\Setting_kontrak_pengajaran;
use App\Models\Setting_materi_pertemuan;
use App\Models\Setting_master_materi;
use App\Models\Data_jawaban_materi_pembelajaran;
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
                                <strong>Info:</strong> Daftar transaksi yang sudah dilakukan dan menambah transaksi baru,
                                untuk mencetak invoice silahkan buka invoice.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar invoice</h4>
                        <a href="{{ url('transaksi/create') }}" class="btn btn-primary btn-icon"><i
                                data-feather="plus"></i> Add invoice</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover-animation">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No Invoice</th>
                                    <th>Tanggal</th>
                                    <th>Nama Toko</th>
                                    <th>Biaya Kirim</th>
                                    <th>Tipe pembayaran</th>
                                    <th>Lunas</th>
                                    <th>Catatan</th>
                                    <th>Sales</th>
                                    <th>Harga Modal</th>
                                    <th>Harga Jual</th>
                                    <th>Qty</th>
                                    <th>Komisi</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $no => $trk)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>
                                            <span class="font-weight-bold">{{ $trk->no_invoice }}</span>
                                        </td>
                                        <td>{{ $trk->tanggal }}</td>
                                        <td>{{ $trk->data_toko->nama_toko }}</td>
                                        <td>{{ $trk->data_toko->data_biaya_kirim->daerah }} - Rp.
                                            {{ $trk->data_toko->data_biaya_kirim->biaya_kirim }}</td>
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
                                        <td>{{ $trk->catatan }}</td>
                                        <td>{{ $trk->data_toko->users->name }}</td>
                                        <td>Rp. {{ $trk->data_harga->harga }}</td>
                                        <td>Rp. {{ $trk->harga_jual }}</td>
                                        <td>{{ $trk->qty }}</td>
                                        <td>Rp. {{ $trk->data_komisi->komisi + $trk->kelebihankomisi }}</td>
                                        <td>Rp. {{ $trk->total }}</td>
                                        <td>
                                            <a href="{{ url('/noinvoice/' . $trk->id) }}"
                                                class="btn btn-success round btn-icon"><i data-feather="eye"></i></a>
                                            {{-- <a href="{{ url('/editinvoice/' . $trk->id) }}"
                                                class="btn btn-primary round btn-icon"><i data-feather="edit-2"></i></a> --}}
                                            <button class="btn btn-danger round btn-icon"><i data-feather="trash"
                                                    data-toggle="modal"
                                                    data-target="#deletetrk{{ $trk->id }}"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
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
                            <strong>Sales: {{ $trk->data_toko->users->name }}</strong><br>
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
