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
                        <h1 class="m-0"> <small>Cabang</small> <span class="profile_name">{{ Auth::user()->name }}</span>
                        </h1>
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
                                <div class="row mb-2 text-right ">
                                    <div class="col">

                                        <a class="btn btn-info justify-content-center" target="__blank" data-toggle="modal"
                                            data-target="#modalEditSS">Tambah Penebak</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col d-flex justify-content-center">
                                        <table id="tablePenebak" width="100%"
                                            class="table table-responsive table-hover table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Address</th>
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
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->

        </div>
        <!-- /.content -->

        {{-- Modal --}}
        <div class="modal fade" id="modalEditSS" role="dialog" aria-labelledby="modalEditSSTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditSSTitle">Edit Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="formTambahPenebak" method="POST">
                        <div class="modal-body">
                            <input type="hidden" class="idPenebak" id="idPenebak" name="idPenebak">
                            <div class="form-group row">
                                <label for="inputNama" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" name="inputNama" class="form-control" id="inputNama"
                                        placeholder="Input Nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputKepalaCabang" class="col-sm-4 col-form-label">Kepala Cabang</label>
                                <div class="col-sm-8">
                                    <select name="inputKepalaCabang" class="form-control select2bs4" id="inputKepalaCabang">
                                        <option disabled selected>Pilih Kepala Cabang</option>
                                        @foreach ($data as $m)

                                            <option value="{{ $m->id }}">{{ $m->name }}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputAddress" class="col-sm-4 col-form-label">Idna Address</label>
                                <div class="col-sm-8">
                                    <textarea name="inputAddress" class="form-control" id="inputAddress"
                                        placeholder="Input Idena Address"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputJenisPembayaran" class="col-sm-4 col-form-label">Jenis
                                    Pembayaran</label>
                                <div class="col-sm-8">
                                    <select name="inputJenisPembayaran" class="form-control select2bs4"
                                        id="inputJenisPembayaran">
                                        <option disabled selected>Pilih Pembayaran</option>
                                        @foreach ($dataDompet as $m)

                                            <option value="{{ $m->id }}">{{ $m->nama_dompet }}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputNoPembayaran" class="col-sm-4 col-form-label">No.
                                    Pembayaran</label>
                                <div class="col-sm-8">
                                    <input type="number" name="inputNoPembayaran" class="form-control"
                                        id="inputNoPembayaran" placeholder="Input No.Pembayaran">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" form="formTambahPenebak" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- <div class="modal fade" id="modalEditProfile" role="dialog" aria-labelledby="modalEditProfileTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditProfileTitle">Edit Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="formEditProfile" method="POST">
                        <div class="modal-body">
                            <input type="hidden" class="inputidUser" id="inputidUser" name="inputidUser">
                            <div class="form-group row">
                                <label for="inputNamaProfile" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" name="inputNamaProfile" class="form-control" id="inputNamaProfile"
                                        placeholder="Input Nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmailProfile" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="text" name="inputEmailProfile" class="form-control" id="inputEmailProfile"
                                        placeholder="Input Email">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" form="formEditProfile" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}

        <div class="modal fade" id="warningDelete" role="dialog" aria-labelledby="warningDeleteTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="warningDeleteTitle">Edit Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="formDeletePenebak" method="POST">
                        <div class="modal-body">
                            <input type="text" class="inputidPenebak" id="inputidPenebak" name="inputidPenebak">
                            <h3>Yakin ingin menghapus penebak ini?</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" form="formDeletePenebak" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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
        var jumlah_url = "{{ url('api/penebakcount') . '/' . Request::segment(2) }}";
        var cabang_url = "{{ url('api/cabang_profile') . '/' . Request::segment(2) }}";

        var idena_identity_url = "{{ 'https://scan.idena.org/identity/' }}";

        $(function() {
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });

        $(document).ready(function() {
            cabang_profile(cabang_url);
            load_data_jlh(jumlah_url);
            load_data(api_url);

        });


        function load_data(url) {
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
                        "data": "alamat_idena",
                        render: function(data, type, row) {
                            return '<a href = "' +
                                idena_identity_url + '' + data +
                                '" class = "btn btn-success" > ' + data + ' </a>'
                        }
                    },
                    {
                        "data": "dompet_digital.nama_dompet",
                        render: function(data, type, row) {
                            return row.nama_dompet;
                        }
                    },
                    {
                        "data": "no_hp_pembayaran"
                    },
                    {
                        "data": "penebak.id",
                        render: function(data, type, row) {
                            return '<div class="text-center"><a href = "' + base_url +
                                '/penebak/' + row.penebak_id +
                                '" class = "btn btn-primary" onclick="getPenebak(' + row
                                .penebak_id +
                                ')" > Detail </a>&nbsp<a href = "#" class = "btn btn-danger" onclick="deletePenebak(' +
                                row.penebak_id +
                                ')" > Hapus </a></div> '
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
                "responsive": false,
                "lengthChange": false,
                "autoWidth": true,
                "paging": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tablePenebak_wrapper .col-md-6:eq(0)');

        }

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

        $("#formTambahPenebak").submit(function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                type: 'POST',
                data: data,
                url: "{{ url('api/add_penebak') }}",
                success: function(data) {
                    load_data_jlh(jumlah_url);

                    alert(data['success']);
                    $("#modalEditSS").modal('hide');
                    location.reload();

                }
            });
        });

        $("#formEditProfile").submit(function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                type: 'POST',
                data: data,
                url: "{{ url('api/save_cabang_profile') }}",
                success: function(data) {
                    cabang_profile(cabang_url);
                    alert(data['success']);
                    $("#modalEditProfile").modal('hide');
                }
            });
        });
        $("#formDeletePenebak").submit(function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                type: 'POST',
                data: data,
                url: "{{ url('api/delete_penebak') }}",
                success: function(data) {
                    alert(data['success']);
                    location.reload();
                }
            });
        });

        function deletePenebak(id) {
            $('#warningDelete').modal('show')
            $("#inputidPenebak").val(id);

        }
    </script>

@endsection
