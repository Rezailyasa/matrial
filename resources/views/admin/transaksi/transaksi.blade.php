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
                    <form action="{{ url('transaksi') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-12">
                                <div class="card" style="background-color: rgb(139, 139, 187)">
                                    <div class="card-body">
                                        <h4 class="text-white">Harga Modal saat ini: Rp. {{ $harga->harga }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row invoice-add">
                            <!-- Invoice Add Left starts -->
                            <div class="col-xl-9 col-md-8 col-12">
                                <div class="card invoice-preview-card">
                                    <!-- Header starts -->
                                    <div class="card-body invoice-padding pb-0">
                                        <div
                                            class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                            <div>
                                                <div class="logo-wrapper">
                                                    <img src="{{ asset('/images/logo/logosmk.png') }}" height="28"
                                                        width="28" alt="">

                                                    <h3 class="text-primary invoice-logo">UD CIPTA INDAH</h3>
                                                </div>
                                                <p class="card-text mb-25">Distributor Bahan Bangunan</p>
                                                <p class="card-text mb-25">Desa Kalipasung Dusun 04 RT 01 RW 07 Kec. Gebang
                                                    Kab.
                                                    Cirebon</p>
                                                <p class="card-text mb-0">082127059313</p>
                                            </div>
                                            <div class="invoice-number-date mt-md-0 mt-2">
                                                <div class="d-flex align-items-center justify-content-md-end mb-1">
                                                    <h4 class="invoice-title">Invoice</h4>
                                                    <div class="input-group input-group-merge invoice-edit-input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i data-feather="hash"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text" name="no_invoice"
                                                            class="form-control invoice-edit-input @error('no_invoice') is-invalid @enderror"
                                                            placeholder="265"
                                                            value="{{ $trx ? ($trx->no_invoice += 1) : 1 }}" required>
                                                        @error('no_invoice')
                                                            <div class="alert alert-danger text-sm">No Invoice sudah di gunakan.
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <span class="title"> Tanggal:</span>
                                                    <h5 for="">{{ $tglll }}</h5>
                                                    @if ($tglll == null)
                                                        <input type="date" name="tanggal"
                                                            class="form-control invoice-edit-input" required>
                                                    @else
                                                        <input type="hidden" name="tanggal"
                                                            class="form-control invoice-edit-input"
                                                            value="{{ $tglll }}" required>
                                                    @endif
                                                </div>
                                                {{-- <div class="d-flex align-items-center">
                                                <span class="title">Due Date:</span>
                                                <input type="text" class="form-control invoice-edit-input due-date-picker">
                                            </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Header ends -->

                                    <hr class="invoice-spacing">

                                    <!-- Address and Contact starts -->
                                    <div class="card-body pt-0">
                                        <div class="row ">
                                            <div class="col-xl-8">
                                                <h6>Toko :</h6>
                                                <select class="form-control tokos" id="tokos" name="data_toko_id"
                                                    data-live-search="true" required>
                                                    <option></option>
                                                    @foreach ($tokos as $no => $toko)
                                                        <option data-tokens="{{ $toko->nama_toko }}"
                                                            value="{{ $toko->id }}"><strong>{{ $toko->users->name }}
                                                                -
                                                            </strong>{{ $toko->nama_toko }} -
                                                            {{ $toko->alamat }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col-xl-4 pr-0 mt-xl-0 mt-2 hasil" id="hasil">

                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-xl-8">
                                                {{-- <label>Sales :</label>
                                                <select class="select2 form-control" name="users_id" id="" required>
                                                    <option></option>
                                                    @foreach ($sales as $no => $sls)
                                                        <option value="{{ $sls->id }}">{{ $sls->name }}
                                                        </option>
                                                    @endforeach
                                                </select> --}}
                                                <label>Komisi :</label>
                                                <select class="form-control komisi" name="data_komisi_id" id="komisi"
                                                    required disabled>
                                                    <option></option>
                                                    @foreach ($komisis as $no => $komisi)
                                                        <option value="{{ $komisi->id }}">
                                                            Komisi: Rp. {{ $komisi->komisi }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div id="tambahkomisi" style="display: none">
                                                    <label>kelebihan komisi :</label>
                                                    <input type="number" class="form-control" name="tambahankomisi"
                                                        id="tambahankomisi">
                                                    {{-- <input type="text" name="tokoss" id="tokoss"> --}}
                                                </div>
                                            </div>
                                            <div class="col-xl-4 pr-0 mt-xl-0 mt-2 hide" name="">
                                                <input type="hidden" name="komisival" id="komisival">
                                                <input type="hidden" name="sementara" id="sementara">
                                                <input type="hidden" name="margin" id="margin">
                                                <input type="hidden" name="totalkomisi" id="totalkomisi">
                                                <input type="hidden" name="totalqty" id="totalqty">
                                                <input type="hidden" name="data_harga_id" id="data_harga_id"
                                                    value="{{ $harga->id }}">
                                                <input type="hidden" name="users_id" id="users_id">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Address and Contact ends -->

                                    <!-- Product Details starts -->
                                    <div class=" card-body invoice-padding invoice-product-details">
                                        <form class="source-item">
                                            <div data-repeater-list="group-a">
                                                <div class="repeater-wrapper" data-repeater-item="">
                                                    <div class="row">
                                                        <div
                                                            class="col-12 d-flex product-details-border position-relative pr-0">
                                                            <div class="row w-100 pr-lg-0 pr-1 py-2">
                                                                <div class="col-lg-5 col-12 mb-lg-0 mb-2 mt-lg-0 mt-2">
                                                                    <p class="card-text col-title mb-md-50 mb-0">
                                                                        Item</p>
                                                                    <select name="data_barang_id" id=""
                                                                        class="select2 form-group" required>
                                                                        <option></option>
                                                                        @foreach ($barangs as $barang)
                                                                            <option value="{{ $barang->id }}">
                                                                                {{ $barang->nama_barang }} -
                                                                                {{ $barang->tipe_barang }} -
                                                                                {{ $barang->ukuran }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-2 col-12 my-lg-0 my-2">
                                                                    <p class="card-text col-title mb-md-2 mb-0">Qty
                                                                    </p>
                                                                    <input type="number" name="qty" id="qty"
                                                                        class="form-control" required>
                                                                </div>
                                                                <div class="col-lg-3 col-12 my-lg-0 my-2">
                                                                    <div class="input-group">
                                                                        <p class="card-text col-title mb-md-2 mb-0">
                                                                            Harga
                                                                        </p>
                                                                        <input type="text" class="form-control ongkir"
                                                                            id="hargaaa" name="harga_jual" required>
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"
                                                                                id="basic-addon2">X 12,6</span>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" class="form-control ongkir"
                                                                        id="ongkir" readonly>
                                                                </div>
                                                                <div class="col-lg-2 col-12 mt-lg-0 mt-2">
                                                                    <p class="card-text col-title mb-md-50 mb-0">
                                                                        Harga total
                                                                    </p>
                                                                    {{-- <input type="text" name="total" class="form-control"
                                                                        id="total" readonly> --}}
                                                                    <div class="toth" id="toth2"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- Product Details ends -->

                                    <!-- Invoice Total starts -->
                                    <div class="card-body invoice-padding">
                                        <div class="row invoice-sales-total-wrapper">
                                            <div class="col-md-12 d-flex justify-content-end order-md-2 order-1">
                                                <div class="invoice-total-wrapper">
                                                    <div class="invoice-total-item">
                                                        <p class="invoice-total-title">Harga:</p>
                                                        <div class="hargam" id="hargam"></div>

                                                    </div>
                                                    <div class="invoice-total-item">
                                                        <p class="invoice-total-title">Qty:</p>
                                                        <div class="qtyy" id="qtyy"></div>
                                                        {{-- <div class="bkir" id="bkir"></div> --}}
                                                    </div>
                                                    <hr class="my-50">
                                                    <div class="invoice-total-item">
                                                        <p class="invoice-total-title">Total:</p>
                                                        <div class="toth" id="toth"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Invoice Total ends -->

                                    <hr class="invoice-spacing mt-0">

                                    <div class="card-body invoice-padding py-0">
                                        <!-- Invoice Note starts -->
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group mb-2">
                                                    <label for="note" class="form-label font-weight-bold">Note:</label>
                                                    <textarea class="form-control" name="catatan" rows="2" id="note"
                                                        placeholder="Catatan"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Invoice Note ends -->
                                    </div>
                                </div>
                            </div>
                            <!-- Invoice Add Left ends -->

                            <!-- Invoice Add Right starts -->
                            <div class="col-xl-3 col-md-4 col-12">
                                <div class="mt-1">
                                    <p class="mb-50">Tipe pembayaran</p>
                                    <select class="form-control" name="type_pembayaran">
                                        <option value="Cash">Cash</option>
                                        <option value="Transfer Bank">Transfer Bank</option>
                                        <option value="Tempo">Tempo</option>
                                    </select>
                                    <div class="invoice-terms mt-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="invoice-terms-title mb-0" for="paymentTerms">Lunas</label>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" checked=""
                                                    id="paymentTerms" name="is_lunas">
                                                <label class="custom-control-label" for="paymentTerms"></label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card mt-2">
                                    <div class="card-body">
                                        {{-- <button class="btn btn-primary btn-block mb-75" disabled="">Kirim Invoice</button> --}}
                                        {{-- <a href="app-invoice-preview.html"
                                            class="btn btn-outline-primary btn-block mb-75">Preview</a> --}}
                                        <div class="custom-control custom-control-primary custom-checkbox mb-1">
                                            <input type="checkbox" class="custom-control-input" id="colorCheck3" required>
                                            <label class="custom-control-label" for="colorCheck3">Konfirmasi jadwal
                                                pengiriman</label>
                                        </div>
                                        <button type="submit" class="btn btn-outline-primary btn-block">Simpan
                                            Jadwal</button>
                                    </div>
                                </div>

                            </div>
                            <!-- Invoice Add Right ends -->
                        </div>
                    </form>
                    <!-- Add New Customer Sidebar -->
                    <div class="modal modal-slide-in fade" id="add-new-customer-sidebar" aria-hidden="true">
                        <div class="modal-dialog sidebar-lg">
                            <div class="modal-content p-0">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">×</button>
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
                    </div>
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
    <script src="{{ asset('/js/scripts/forms/form-select2.min.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script type='text/javascript'>
        var json_data = <?= $r ?>;
        var harga = <?= $harga ?>;

        const tokos = document.querySelector('#tokos');
        const hasil = document.querySelector('#hasil');
        const ongkir = document.querySelector('#ongkir');
        const hargaaa = document.querySelector('#hargaaa');
        const bkir = document.querySelector('#bkir');
        const hargam = document.querySelector('#hargam');
        const toth = document.querySelector('#toth');
        const komisi = document.querySelector('#komisi');
        const qty = document.querySelector('#qty');
        const qtyy = document.querySelector('#qtyy');
        const users_id = document.querySelector('#users_id');
        const komisival = document.querySelector('#komisival');
        const sementara = document.querySelector('#sementara');
        const margin = document.querySelector('#margin');
        const total = document.querySelector('#total');
        const tambahkomisi = document.getElementById('tambahkomisi');
        const tambahankomisi = document.getElementById('tambahankomisi');
        tokos.addEventListener('change', function() {

            fetch('/transaksi/' + tokos.value + '/edit')
                .then(response => response.json())
                .then(response => {
                    const hasill = response;
                    const result =
                        `<h5 class="mt-1">Data Toko:</h5><hr><span>${hasill.nama_toko}<br>Nama pemilik:${hasill.nama_pemilik?hasill.nama_pemilik:'-'}<br>No Tlp:${hasill.no_tlp?hasill.no_tlp:'-'}<br>${hasill.alamat}</span><br><span><strong>Sales: ${hasill.users.name}</strong></span>`;
                    const r2 = hasill.data_biaya_kirim.biaya_kirim;
                    const z = hasill.users_id;
                    hasil.innerHTML = result;
                    ongkir.value = r2;

                    const b = `<p class="invoice-total-amount">Rp. ${r2}</p>`;
                    console.log(z);
                    // bkir.innerHTML = b;


                    // sementara.value = (parseInt(harga.harga) * 12.6) - parseInt(ongkir.value);
                    // sementara.value = parseInt(harga.harga) * 12.6;
                    users_id.value = z;

                })
                .then(function() {
                    // console.log('disa');
                    document.getElementById("komisi").disabled = false;
                });
        });
        komisi.addEventListener('change', function() {
            fetch('/transaksi/' + komisi.value)
                .then(response => response.json())
                .then(response => {
                    const kom = response;
                    const komis = kom.komisi;
                    const marg = kom.margin;

                    komisival.value = komis;
                    margin.value = marg;
                })
                .then(function() {
                    //     console.log(sementara.value);
                    //     console.log(komisival.value)

                    //     // const tot = parseInt(sementara.value);

                    //     const har = parseInt(harga.harga) + parseInt(margin.value);
                    //     // hargam.innerHTML = `<p class = "invoice-total-amount">Rp. ${har}</p>`
                    //     var tot = har * 12.6;
                    //     total.value = tot;
                    //     sementara.value = tot;
                    //     hargaaa.value = har;

                    //     console.log(tot);
                    //     toth.innerHTML = `<p class = "invoice-total-amount">Rp. ${tot}</p>`
                    tambahkomisi.style.display = "block";
                });
        });

        tambahankomisi.addEventListener('change', function() {
            const totalkomisi = parseInt(tambahankomisi.value) + parseInt(komisival.value);
            // hargam.innerHTML = `<p class = "invoice-total-amount">Rp. ${har}</p>`
            // var tot = har * 12.6;
            // toth.innerHTML = `<p class = "invoice-total-amount">Rp. ${tot}</p>`
            // total.value = tot;
            // sementara.value = tot;
            totalkomisi.value = totalkomisi;
        });
        qty.addEventListener('change', function() {
            var f = qty.value;
            totalqty.value = f;
            const total = parseInt(hargaaa.value) * 12.6 * parseInt(totalqty.value);

            hargam.innerHTML = `<p class = "invoice-total-amount">Rp. ${hargaaa.value}</p>`
            // var tot = har * 12.6;
            // total.value = tot;
            qtyy.innerHTML = `<p class = "invoice-total-amount"> ${totalqty.value}</p>`;
            toth.innerHTML = `<p class = "invoice-total-amount">Rp. ${(total).toFixed(2)}</p>`
            toth2.innerHTML = `<p class = "invoice-total-amount">Rp. ${total}</p>`

            total.value = total;
            // sementara.value = total;
            hargaaa.value = hargaaa.value;

        });

        hargaaa.addEventListener('change', function() {
            const total = parseInt(hargaaa.value) * 12.6 * parseInt(totalqty.value);
            hargam.innerHTML = `<p class = "invoice-total-amount">Rp. ${hargaaa.value}</p>`
            // var tot = har * 12.6;
            qtyy.innerHTML = `<p class = "invoice-total-amount"> ${totalqty.value}</p>`;
            toth.innerHTML = `<p class = "invoice-total-amount">Rp. ${total}</p>`
            toth2.innerHTML = `<p class = "invoice-total-amount">Rp. ${total}</p>`
            total.value = total;
            // sementara.value = total;
            // console.log(total);
            hargaaa.value = hargaaa.value;
        });
        // .then(function() {

        //     const total = parseInt(hargaaa.value) * 12.6 * parseInt(totalqty.value);
        //     total.value = total;


        //     console.log(total);
        //     //     toth.innerHTML = `<p class = "invoice-total-amount">Rp. ${tot}</p>`
        //     //     tambahkomisi.style.display = "block";
        // });
    </script>
    // <script src="{{ asset('/js/scripts/pages/app-invoice.min.js') }}"></script>

@endpush
