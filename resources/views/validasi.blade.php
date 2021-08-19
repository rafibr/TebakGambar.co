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
                        <h1 class="m-0"> <small>Jadwal Validasi</small>
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Validasi</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container">

                <div class="row">
                    <div class="col-md-12 col ">
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <h5 class="card-title">Daftar Validasi</h5>

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
                                <div class="row mb-2  ">
                                    <div class="col-md-8 text-left">
                                        <h6 class="m-0">Validasi Berikutnya : <small
                                                class="badge badge-secondary nextValidation">Jadwal
                                                Validasi</small>
                                        </h6>
                                    </div>
                                    <div class="col-md-4 text-right">

                                        <a class="btn btn-info justify-content-center" target="__blank" data-toggle="modal"
                                            data-target="#modalTambah">Tambah Jadwal</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col d-flex justify-content-center">
                                        <table id="tableValidasi" width="100%"
                                            class="table table-responsive table-hover table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal Validasi</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal Validasi</th>
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
            </div><!-- /.container -->

        </div>
        <!-- /.content -->

        {{-- Modal tambah --}}
        <div class="modal fade" id="modalTambah" role="dialog" aria-labelledby="modalTambahTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahTitle">Edit Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="formTambahValidasi" method="POST">
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-sm-8 text-left">
                                    <h6 class="m-0">Validasi Berikutnya : <small
                                            class="badge badge-secondary nextValidation">Jadwal
                                            Validasi</small>
                                    </h6>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputTanggalValidasi" class="col-sm-4 col-form-label">Tanggal Validasi</label>
                                <div class="col-sm-8">
                                    <input type="date" name="inputTanggalValidasi" class="form-control"
                                        id="inputTanggalValidasi" placeholder="Input Tanggal Validasi">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" form="formTambahValidasi" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Modal edit --}}
        <div class="modal fade" id="modalEditValidasi" role="dialog" aria-labelledby="modalEditValidasiTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditValidasiTitle">Tambah jadwal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="formEditValidasi" method="POST">
                        <div class="modal-body">
                            <input type="hidden" class="inputeditidValidasi" id="inputeditidValidasi"
                                name="inputeditidValidasi">
                            <div class="form-group row">
                                <label for="inputeditTanggalValidasi" class="col-sm-4 col-form-label">Tanggal
                                    Validasi</label>
                                <div class="col-sm-8">
                                    <input type="date" name="inputeditTanggalValidasi" class="form-control"
                                        id="inputeditTanggalValidasi" placeholder="Input Tanggal Validasi">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" form="formEditValidasi" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Modal hapus --}}
        <div class="modal fade" id="warningDelete" role="dialog" aria-labelledby="warningDeleteTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="warningDeleteTitle">Hapus Validasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="formDeleteValidasi" method="POST">
                        <div class="modal-body">
                            <input type="hidden" class="inputDeleteIdValidasi" id="inputDeleteIdValidasi"
                                name="inputDeleteIdValidasi">
                            <h3>Yakin ingin menghapus Validasi ini?</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" form="formDeleteValidasi" class="btn btn-success">Simpan</button>
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
    <script src="{{ asset('dist/js/tanggal.js') }}"></script>
    <script>
        var api_url = "{{ url('api/validasi') }}";
        var base_url = "{{ url('') }}";

        $(document).ready(function() {
            load_data(api_url);
            load_data_nextValidation("https://api.idena.io/api/Epoch/Last");
        });


        function load_data(url) {
            // Setup - add a text input to each footer cell
            $('#tableValidasi tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');
            });

            $("#tableValidasi").DataTable({
                dom: 'Bfrtip',
                processing: true,
                serverSide: true,
                "ajax": api_url,
                "columns": [{
                        "data": "id",
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        "data": "tanggal_validasi",
                        render: function(data, type, row) {
                            return tampilTanggal(data);
                        }
                    },
                    {
                        "data": "id",
                        render: function(data, type, row) {
                            let tanggalValidasi = "'" + row.tanggal_validasi + "'";
                            return '<div class="text-center"><a href = "#" class = "btn btn-info" onclick="editValidasi(' +
                                data + ', ' + (tanggalValidasi) +
                                ')" > Edit </a>&nbsp<a href = "#" class = "btn btn-danger" onclick="deleteValidasi(' +
                                data + ')" > Hapus </a></div> '
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
                "paging": true,
                "buttons": ["pageLength", "copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tableValidasi_wrapper .col-md-6:eq(0)');
        }

        function load_data_nextValidation(url) {
            $.get(url, function(data) {

                var tglValidasi = (new Date(data.result.validationTime));
                var tgl = (tglValidasi.getDate());
                var bulan = (tglValidasi.getMonth());
                var tahun = (tglValidasi.getFullYear());
                var datetime = tahun + "-" + bulan + "-" + tgl;
                var datetimeinput = tglValidasi.toISOString().split('T')[0];;

                $(".nextValidation").html(tampilTanggal(datetime));

                $("#inputTanggalValidasi").val(datetimeinput);
            });
        }
        $("#formTambahValidasi").submit(function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                type: 'POST',
                data: data,
                url: "{{ url('api/add_validasi') }}",
                success: function(data) {

                    alert(data['success']);
                    location.reload();

                }
            });
        });

        $("#formEditValidasi").submit(function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                type: 'POST',
                data: data,
                url: "{{ url('api/edit_validasi') }}",
                success: function(data) {

                    alert(data['success']);
                    location.reload();

                }
            });
        });

        $("#formDeleteValidasi").submit(function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                type: 'POST',
                data: data,
                url: "{{ url('api/delete_validasi') }}",
                success: function(data) {

                    alert(data['success']);
                    location.reload();

                }
            });
        });

        function editValidasi(id, tanggalValidasi) {
            console.log(tanggalValidasi);
            $('#modalEditValidasi').modal('show')
            $("#inputeditidValidasi").val(id);
            $("#inputeditTanggalValidasi").val(tanggalValidasi);

        }

        function deleteValidasi(id) {
            $('#warningDelete').modal('show')
            $("#inputDeleteIdValidasi").val(id);

        }
    </script>

@endsection
