@php
use App\Models\Users;
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
                        <!-- Greetings Card starts -->
                        <?php

                        //fungsi untuk merubah nama hari menjadi hari indonesia
                        function hari_ini()
                        {
                            switch (date('D')) {
                                case 'Sun':
                                    $hari = 'Minggu';
                                    break;
                                case 'Mon':
                                    $hari = 'Senin';
                                    break;
                                case 'Tue':
                                    $hari = 'Selasa';
                                    break;
                                case 'Wed':
                                    $hari = 'Rabu';
                                    break;
                                case 'Thu':
                                    $hari = 'Kamis';
                                    break;
                                case 'Fri':
                                    $hari = 'Jum\'at';
                                    break;
                                case 'Sat':
                                    $hari = 'Sabtu';
                                    break;

                                default:
                                    $hari = 'Hari tidak diketahui';
                                    break;
                            }

                            return $hari;
                        }

                        //fungsi untuk merubah format tanggal menjadi tanggal indonesia
                        function tanggal_indo()
                        {
                            $bulan  = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                            $exp    = explode('-', date('d-m-Y'));

                            return $exp[0] . ' ' . $bulan[(int) $exp[1]] . ' ' . $exp[2];
                        }

                        ?>
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
                                        <p class="mb-0 text-right"><b><i class="fa fa-calendar"></i> <?= hari_ini(); ?>, <?= tanggal_indo(); ?></b></p>
                                        <hr>
                                        <h4 class="alert-heading"><i class="fa fa-info-circle"></i><b>WELCOME TO WEBSITE WARUNG FROZEN FOOD</b></h4>
                                        <p class="mb-5" style="font-size: 16px;">Now You Are Login As <b>{{ $user->name }}</b> With Level <b>ADMIN</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Greetings Card ends -->

                    <!-- Dashboard Ecommerce Starts -->
                    <section id="dashboard-ecommerce">
                        <div class="pricing-free-trial">
                            <table class="table table-sm table-hover-animation">
                                <thead>
                                    <tr>
                                        <th>ID User</th>
                                        <th>Nama User</th>
                                        <th>Profil User</th>
                                        <th>Email User</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                               @foreach($users as $item)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td class="@if($item->id==$user->id) text text-danger @else text text-warning @endif">{{$item->id}}</td>
                                        <td class="@if($item->name==$user->name) text text-danger @else text text-warning @endif">{{$item->name}}</td>
                                        <td class="@if($item->email==$user->email) text text-danger @else text text-warning @endif">{{$item->email}}</td>
                                        <td class="@if($item->created_at==$user->created_at) text text-danger @else text text-warning @endif">{{$item->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                    <!-- Dashboard Ecommerce ends -->
                    </div>

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
