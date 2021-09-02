@extends('core.app')

@section('upper')

@endsection

@section('content')

    <!-- Navbar -->
    @include('layouts.nav')
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> <small>Cabang</small> <span
                                class="profile_name">{{ Auth::user()->name }}</span>
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('cabang') }}">Cabang</a></li>
                            <li class="breadcrumb-item active">Balance</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{ Auth::user()->name }}
                                    <small class="text-secondary">{{ Auth::user()->email }}</small></span>
                                <span class="info-box-number">
                                    <span id="jlh_penebak">1</span>
                                    <small class="text-secondary">(Penebak)</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                </div>
                <div class="row">
                    <div class="col-md-12 col ">
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <h5 class="card-title">Daftar Penebak</h5>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col d-flex justify-content-center">
                                        <div id="demo"></div>

                                        <table id="tablePenebak"
                                            class="table table-responsive table-hover table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Address</th>
                                                    <th>Balance</th>
                                                    <th>Stake</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>

                            </div>
                            <div id="loaderSync" class="overlay hide">
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    <div class="row">
                                        <div class="spinner-border text-dark" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                    <div class="row text-dark">
                                        <strong id="textLoader">Collecting data</strong>
                                    </div>
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

@section('custom-js')
    {{-- Script only for this page --}}
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('dist/js/rupiah.js') }}"></script>
    <script>
        var api_url = "{{ url('api/cabang') . '/' . Request::segment(2) }}";
        var base_url = "{{ url('') }}";
        var jumlah_url = "{{ url('api/penebakcount') . '/' . Request::segment(2) }}";
        var cabang_url = "{{ url('api/cabang_profile') . '/' . Request::segment(2) }}";
        var get_balance = "https://api.idena.io/api/Address/";

        var idena_identity_url = "{{ 'https://scan.idena.org/identity/' }}";
        var image_url = "{{ url('storage/SSDompet') . '/' }}";
        var totalJumBayar = 0;

        $(function() {
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });

        $(document).ready(function() {
            $("#loaderSync").hide();

            $('#inputKepalaCabang').val({{ Request::segment(2) }});
            $('#inputKepalaCabang').select2().trigger('change');
            cabang_profile(cabang_url);
            load_data_jlh(jumlah_url);
            load_data(api_url);
        });


        function load_data(url) {

            $("#tablePenebak").DataTable({
                dom: 'Bfrtip',
                processing: true,
                serverSide: true,
                "ajax": api_url,
                "columns": [{
                        "data": "name_penebak"
                    },
                    {
                        "data": "alamat_idena",
                        render: function(data, type, row) {
                            return '<a href = "' +
                                idena_identity_url + '' + data +
                                '" class = "btn btn-success" target="_blank"> ' + data + ' </a>'
                        }
                    },

                    {
                        "data": "alamat_idena",
                        render: function(data, type, row) {
                            return '<div class="text-center"><a class = "btn btn-warning" onclick="getBalance(\'' +
                                data +
                                '\')" > Show Balance </a></div>';
                        }
                    },
                    {
                        "data": "alamat_idena",
                        render: function(data, type, row) {
                            return '<div class="text-center"><a class = "btn btn-info" onclick="getStake(\'' +
                                data +
                                '\')" > Show Stake </a></div>';
                        }
                    }

                ],
                "responsive": false,
                "lengthChange": false,
                "autoWidth": false,
                "paging": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tablePenebak_wrapper .col-md-6:eq(0)');
        }

        $.fn.dataTable.Api.register('column().data().sum()', function() {
            return this.reduce(function(a, b) {
                var x = parseFloat(a) || 0;
                var y = parseFloat(b) || 0;
                return x + y;
            });
        });

        function load_data_jlh(url) {
            $.get(url, function(data, status) {
                $("#jlh_penebak").text(data);
            });
        }

        function cabang_profile(url) {
            $.get(url, function(data, status) {
                $(".profile_name").text(data.name);
                $(".profile_email").text(data.email);

                $("#inputidUser").val(data.id)
                $("#inputNamaProfile").val(data.name)
                $("#inputEmailProfile").val(data.email)
            });
        }

        function getBalance(idna_address) {
            urlBal = get_balance + idna_address;
            $.get(urlBal, function(dataBal, status) {
                alert("Balance: " + (dataBal.result.balance) + " iDNA coin");
            });
        }

        function getStake(idna_address) {
            urlBal = get_balance + idna_address;
            $.get(urlBal, function(dataBal, status) {
                alert("Stake: " + (dataBal.result.stake) + " iDNA coin");
            });
        }
    </script>

@endsection
