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
                        <h1 class="m-0"> <small>Dompet Digital</small>
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dompet</li>
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
                                <h5 class="card-title">Daftar Dompet</h5>

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
                                            data-target="#modalTambah">Tambah Dompet</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col d-flex justify-content-center">
                                        <table id="tableDompet" width="100%"
                                            class="table table-responsive table-hover table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Dompet</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Dompet</th>
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

                    <form id="formTambahDompet" method="POST">
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="inputNamaDompet" class="col-sm-4 col-form-label">Nama Dompet</label>
                                <div class="col-sm-8">
                                    <input type="text" name="inputNamaDompet" class="form-control" id="inputNamaDompet"
                                        placeholder="Input Nama Dompet">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" form="formTambahDompet" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Modal edit --}}
        <div class="modal fade" id="modalEditDompet" role="dialog" aria-labelledby="modalEditDompetTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditDompetTitle">Edit Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="formEditDompet" method="POST">
                        <div class="modal-body">
                            <input type="hidden" class="inputeditiddompet" id="inputeditiddompet" name="inputeditiddompet">
                            <div class="form-group row">
                                <label for="inputeditNamaDompet" class="col-sm-4 col-form-label">Nama Dompet</label>
                                <div class="col-sm-8">
                                    <input type="text" name="inputeditNamaDompet" class="form-control"
                                        id="inputeditNamaDompet" placeholder="Input Nama Dompet">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" form="formEditDompet" class="btn btn-success">Simpan</button>
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
                        <h5 class="modal-title" id="warningDeleteTitle">Hapus Dompet</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="formDeleteDompet" method="POST">
                        <div class="modal-body">
                            <input type="hidden" class="inputDeleteIdDompet" id="inputDeleteIdDompet"
                                name="inputDeleteIdDompet">
                            <h3>Yakin ingin menghapus dompet ini?</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" form="formDeleteDompet" class="btn btn-success">Simpan</button>
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
        var api_url = "{{ url('api/dompet') }}";
        var base_url = "{{ url('') }}";

        $(function() {
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });

        $(document).ready(function() {
            load_data(api_url);
        });


        function load_data(url) {
            // Setup - add a text input to each footer cell
            $('#tableDompet tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');
            });

            $("#tableDompet").DataTable({
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
                        "data": "nama_dompet"
                    },
                    {
                        "data": "id",
                        render: function(data, type, row) {
                            let namaDompet = "'" + row.nama_dompet + "'";
                            return '<div class="text-center"><a href = "#" class = "btn btn-info" onclick="editDompet(' +
                                data + ', ' + (namaDompet) +
                                ')" > Edit </a>&nbsp<a href = "#" class = "btn btn-danger" onclick="deleteDompet(' +
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
                "responsive": false,
                "lengthChange": false,
                "autoWidth": true,
                "paging": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tableDompet_wrapper .col-md-6:eq(0)');
        }

        $("#formTambahDompet").submit(function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                type: 'POST',
                data: data,
                url: "{{ url('api/add_dompet') }}",
                success: function(data) {

                    alert(data['success']);
                    location.reload();

                }
            });
        });

        $("#formEditDompet").submit(function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                type: 'POST',
                data: data,
                url: "{{ url('api/edit_dompet') }}",
                success: function(data) {

                    alert(data['success']);
                    location.reload();

                }
            });
        });

        $("#formDeleteDompet").submit(function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                type: 'POST',
                data: data,
                url: "{{ url('api/delete_dompet') }}",
                success: function(data) {

                    alert(data['success']);
                    location.reload();

                }
            });
        });

        function editDompet(id, namaDompet) {
            $('#modalEditDompet').modal('show')
            $("#inputeditiddompet").val(id);
            $("#inputeditNamaDompet").val(namaDompet);

        }

        function deleteDompet(id) {
            $('#warningDelete').modal('show')
            $("#inputDeleteIdDompet").val(id);

        }
    </script>

@endsection
