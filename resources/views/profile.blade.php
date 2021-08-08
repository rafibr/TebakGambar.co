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
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> <small>Profile</small> {{ Auth::user()->name }} </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('cabang') }}">Cabang</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset('dist/img/user4-128x128.jpg') }}" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                                <p class="text-muted text-center">{{ Auth::user()->email }}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b><i class="fas fa-user"></i> Penebak</b> <a class="float-right"><span
                                                class="badge badge-info right">1,322</span></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b><i class="fas fa-check-circle" style="color:#20c997"></i> Berhasil</b> <a
                                            class="float-right"><span class="badge badge-success right">522</span></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b><i class="fas fa-times-circle" style="color:#dc3545"></i> Gagal</b> <a
                                            class="float-right"><span class="badge badge-danger right">2,551</span></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-10 ccol ">
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

                                <table id="tablePenebak" width="100%"
                                    class="table table-hover table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Address</th>
                                            <th>State</th>
                                            <th>Age</th>
                                            <th>Pembayaran</th>
                                            <th>No. Pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Address</th>
                                            <th>State</th>
                                            <th>Age</th>
                                            <th>Pembayaran</th>
                                            <th>No. Pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
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
    <script>
        var api_url = "{{ url('api/cabang') . '/' . Request::segment(2) }}";
        var base_url = "{{ url('') }}";

        var idena_identity = "{{ 'https://scan.idena.org/identity/' }}";
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#tablePenebak tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');
            });


            $("#tablePenebak").DataTable({
                dom: 'Bfrtip',
                processing: true,
                serverSide: true,
                "ajax": api_url,
                "columns": [{
                        "data": "name"
                    },
                    {
                        "data": "alamat_idena"
                    },
                    // TODO : get age dan state
                    {
                        "data": "alamat_idena",
                        render: function(data, type, row) {
                            $.get("https://api.idena.io/api/Identity/" + data, function(data,
                                status) {
                                return data.state;
                            });
                        }
                    },
                    {
                        "data": "alamat_idena",
                        render: function(data, type, row) {
                            $.get("https://api.idena.io/api/Identity/" + data, function(data,
                                status) {
                                return data.state;
                            });
                        }
                    },
                    {
                        "data": "tipe_pembayaran"
                    },
                    {
                        "data": "no_hp_pembayaran"
                    },
                    {
                        "data": "id",
                        render: function(data, type, row) {
                            return '<div class="text-center"><a href = "' + base_url +
                                '/profile/" class = "btn btn-primary" > Detail </a><a href = "' +
                                idena_identity + '' + row.alamat_idena +
                                '" class = "btn btn-success" > Identity </a></div> '
                        }
                    }
                ],
                initComplete: function() {
                    // Apply the search
                    this.api().columns().every(function() {
                        var that = this;

                        $('input', this.footer()).on('keyup change clear', function() {
                            if (that.search() !== this.value) {
                                that
                                    .search(this.value)
                                    .draw();
                            }
                        });
                    });
                },
                "responsive": true,
                "lengthChange": false,
                "autoWidth": true,
                "buttons": ["pageLength", "copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tablePenebak_wrapper .col-md-6:eq(0)');
        });
    </script>

@endsection
