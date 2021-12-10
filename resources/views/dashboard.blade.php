@extends('core.app')

@section('content')

    <!-- Navbar -->
    @include('layouts.nav')
    <!-- /.navbar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> <small>Dashboard</small></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container">

                @if (Auth::user()->level == 99)
                <div class="row">
                    <div class="col">
                        <div class="alert alert-warning" role="alert">
                            <h4 class="alert-heading">Perhatian!</h4>
                            <p>Harap mengisi "Rules Pembayaran" yang berada pada <a href="{{ url('rules') }}" class="alert-link">Admin
                                    Menu</a>.</p>
                                    <hr>
                                    <p class="mb-0">Abaikan pesan ini jika sudah mengisi "Rules Pembayaran".</p>
                        </div>
                    </div>
                </div>
                @endif


                <div class="row">
                    <div class="col-md-5">

                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Ticker List</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body bg-dark">
                                <script src="https://widgets.coingecko.com/coingecko-coin-market-ticker-list-widget.js"></script>
                                <coingecko-coin-market-ticker-list-widget coin-id="idena" currency="idr" locale="en">
                                </coingecko-coin-market-ticker-list-widget>
                            </div>
                            <!-- /.card-body -->
                        </div>


                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h3 class="card-title">Idena Price</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                        <!-- /.card-tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body bg-dark">
                                        <script src="https://widgets.coingecko.com/coingecko-coin-price-static-headline-widget.js"></script>
                                        <coingecko-coin-price-static-headline-widget coin-ids="bitcoin,idena" currency="idr"
                                            locale="en">
                                        </coingecko-coin-price-static-headline-widget>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h3 class="card-title">Idena Chart</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                        <!-- /.card-tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body bg-dark">
                                        <script src="https://widgets.coingecko.com/coingecko-coin-compare-chart-widget.js"></script>
                                        <coingecko-coin-compare-chart-widget coin-ids="bitcoin,idena,ethereum"
                                            currency="idr" locale="en"></coingecko-coin-compare-chart-widget>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    @include('layouts.controlbar')
    <!-- /.control-sidebar -->

    <!-- Admin Footer -->
    @include('layouts.footer')

@endsection
