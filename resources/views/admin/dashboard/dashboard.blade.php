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
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/plugins/charts/chart-apex.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/pages/app-invoice-list.min.css') }}">
@endpush
@section('content')

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                {{-- <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            <div class="alert-body">
                                <strong>Info:</strong> Tahun ajaran aktif saat ini adalah&nbsp;
                                pilih
                                untuk
                                merubah
                                tahun ajaran aktif. Tahun ajaran yang
                                dipilih
                                saat ini <strong class="text-primary">.</strong>
                                Pilih
                                tombol
                                <strong><u>Pilih tahun
                                        ajaran</u></strong>
                                untuk melakukan setting kelas siswa.
                            </div>
                        </div>
                    </div>
                </div> --}}
                <section id="dashboard-analytics">
                    <div class="row match-height">
                        <!-- Greetings Card starts -->
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="card card-congratulations">
                                <div class="card-body text-center">
                                    <img src="{{ asset('/images/elements/decore-left.png') }}"
                                        class="congratulations-img-left" alt="card-img-left">
                                    <img src="{{ asset('/images/elements/decore-right.png') }}"
                                        class="congratulations-img-right" alt="card-img-right">
                                    <div class="avatar avatar-xl bg-primary shadow">
                                        <div class="avatar-content">
                                            <img src="{{ asset('/images/profile_user/' . $user->image) }}" alt="">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <h1 class="mb-1 text-white">Welcome {{ $user->name }},</h1>
                                        <p class="card-text m-auto w-75">
                                            Dashboard keseluruhan informasi UD CIPTA INDAH.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Greetings Card ends -->

                        <!-- Subscribers Chart Card starts -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header flex-column align-items-start pb-0">
                                    <div class="avatar bg-light-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <i data-feather="users" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder mt-1">{{ $sales }}</h2>
                                    <p class="card-text">Total sales</p>
                                </div>
                                <div id="gained-chart"></div>
                            </div>
                        </div>
                        <!-- Subscribers Chart Card ends -->

                        <!-- Orders Chart Card starts -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header flex-column align-items-start pb-0">
                                    <div class="avatar bg-light-warning p-50 m-0">
                                        <div class="avatar-content">
                                            <i data-feather="package" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder mt-1">{{ $transaksi }}</h2>
                                    <p class="card-text">Total Transaksi</p>
                                </div>
                                <div id="order-chart"></div>
                            </div>
                        </div>
                        <!-- Orders Chart Card ends -->
                    </div>


                    <div class="row match-height">
                        <!-- Timeline Card -->
                        <div class="col-lg-4 col-12">
                            <div class="card card-user-timeline">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <i data-feather="list" class="user-timeline-title-icon"></i>
                                        <h4 class="card-title">Tiga Transaksi Terakhir</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="timeline ml-50">
                                        @foreach ($trk as $item)

                                            <li class="timeline-item">
                                                <span
                                                    class="timeline-point timeline-point-success timeline-point-indicator"></span>
                                                <div class="timeline-event">
                                                    <h6>{{ $item->users->name }}</h6>
                                                    <p>Toko: {{ $item->data_toko->nama_toko }}</p>
                                                    <div class="media align-items-center">
                                                        <div class="avatar mr-50">
                                                            <img src="{{ asset('/images/profile_user/' . $item->users->image) }}"
                                                                alt="Avatar" width="38" height="38">
                                                        </div>
                                                        <div class="media-body">
                                                            <h6 class="mb-0">Total: Rp. {{ $item->total }}</h6>
                                                            <p class="mb-0">Komisi: Rp.
                                                                {{ $item->data_komisi->komisi }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--/ Timeline Card -->

                        <!-- Sales Stats Chart Card starts -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-start pb-1">
                                    <div>
                                        <h4 class="card-title mb-25"></h4>
                                        {{-- <p class="card-text">Last 6 months</p> --}}
                                    </div>
                                    {{-- <div class="dropdown chart-dropdown">
                                        <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"
                                            data-toggle="dropdown"></i>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="card-body">
                                    {{-- <div id="chart" style="height: 300px;"></div> --}}
                                    <div id="containerr"></div>

                                </div>
                            </div>
                        </div>
                        <!-- Sales Stats Chart Card ends -->

                        <!-- App Design Card -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card card-app-design">
                                <div class="card-body">
                                    <div class="badge badge-light-primary">Tanggal: {{ date('d-M-Y') }}</div>
                                    <h4 class="card-title mt-1 mb-75 pt-25">Harga saat ini</h4>
                                    <p class="card-text font-small-2 mb-2">
                                        Daftar harga dan komisi yang aktif saat ini
                                    </p>
                                    <div class="row p-1 mt-0">
                                        <div class="design-group mb-2 pt-50">
                                            <h6 class="section-label">Harga:</h6>
                                            <div class="badge badge-light-warning mr-1">Rp.
                                                {{ $harga ? $harga->harga : '' }}
                                            </div>
                                        </div>
                                        <div class="design-group mb-2 pt-50">
                                            <h6 class="section-label">Komisi:</h6>
                                            @foreach ($komisis as $komisi)
                                                <div class="badge badge-light-primary mr-1 my-50">Margin Rp.
                                                    {{ $komisi->margin }} | Komisi Rp. {{ $komisi->komisi }}
                                                </div><br>
                                                {{-- <div class="badge badge-light-primary">Wireframe</div> --}}
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="design-group pt-25">
                                        <h6 class="section-label">Sales</h6>
                                        @foreach ($saless as $u)
                                            <div class="avatar">
                                                <img src="{{ asset('/images/profile_user/' . $u->image) }}" width="34"
                                                    height="34" alt="Avatar">
                                            </div>
                                        @endforeach
                                    </div>
                                    {{-- <div class="design-planning-wrapper mb-2 py-75">
                                        <div class="design-planning">
                                            <p class="card-text mb-25">Due Date</p>
                                            <h6 class="mb-0">12 Apr, 21</h6>
                                        </div>
                                        <div class="design-planning">
                                            <p class="card-text mb-25">Budget</p>
                                            <h6 class="mb-0">$49251.91</h6>
                                        </div>
                                        <div class="design-planning">
                                            <p class="card-text mb-25">Cost</p>
                                            <h6 class="mb-0">$840.99</h6>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-block">Join Team</button> --}}
                                </div>
                            </div>
                        </div>
                        <!--/ App Design Card -->
                    </div>


                </section>

            </div>
        </div>

        </section>
        <!-- users edit ends -->

    </div>



@endsection


@push('script')


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->

    <script src="{{ asset('/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="{{ asset('/vendors/js/extensions/moment.min.js') }}"></script>
    <script src="{{ asset('/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/vendors/js/tables/datatable/responsive.bootstrap.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('/js/core/app.min.js') }}"></script>
    <script src="{{ asset('/js/scripts/customizer.min.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('/js/scripts/pages/dashboard-analytics.min.js') }}"></script>
    <script src="{{ asset('/js/scripts/pages/app-invoice-list.min.js') }}"></script>
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>

    {{-- <script>
        $(window).on('load', function() {
            const chart = new Chartisan({
                el: '#chart',
                url: "@chart('sample_chart')",
            });
            console.log('kebuka');
        })
    </script> --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        var users = <?php echo json_encode($users); ?>;

        Highcharts.chart('containerr', {
            title: {
                text: 'Total Penjualan Perbulan'
            },
            subtitle: {
                text: 'Source: Transaksi'
            },
            xAxis: {
                categories: ['Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu']
            },
            yAxis: {
                title: {
                    text: 'Jumlah Penjualan'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'Transaksi',
                data: users
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 200
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    </script>
@endpush
