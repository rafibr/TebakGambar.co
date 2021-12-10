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
                        <h1 class="m-0"> Rules Pembayaran </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Rules Pembayaran</li>
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
                    <div class="col">
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <h5 class="card-title">Rules</h5>

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

                                <table id="tableRule" class="display table table-hover table-bordered table-striped"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Jumlah Bayar</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody id="tableRule-body">

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Jumlah Bayar</th>
                                            <th>Keterangan</th>
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

        {{-- Modal edit --}}
        <div class="modal fade" id="modalEditRule" role="dialog" aria-labelledby="modalEditRuleTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditRuleTitle">Edit Rule</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="formEditRule" method="POST">
                        <div class="modal-body">
                            <input type="hidden" class="inputIdRule" id="inputIdRule" name="inputIdRule">
                            <div class="form-group row">
                                <label for="inputJlhBayar" class="col-sm-4 col-form-label">Jumlah Bayar</label>
                                <div class="col-sm-8">
                                    <input type="text" name="inputJlhBayar" class="form-control" id="inputJlhBayar"
                                        placeholder="Input Jumlah Bayar">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" form="formEditRule" class="btn btn-success">Simpan</button>
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
    <script src="{{ asset('dist/js/rupiah.js') }}"></script>
    <script>
        var api_url = "{{ url('api/rules') }}";
        var base_url = "{{ url('') }}";
        $(document).ready(function() {

            // Setup - add a text input to each footer cell
            $('#tableRule tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');
            });


            $("#tableRule").DataTable({
                dom: 'Bfrtip',
                processing: true,
                serverSide: true,
                "ajax": api_url,
                "columns": [{
                        "data": "kode_rule"
                    },
                    {
                        "data": "nama_rule"
                    },

                    {
                        "data": "jlh_bayar",
                        render: function(data, type, row) {

                            if (data != null) {
                                return convertToRupiah(data);
                            } else {
                                return "";
                            }
                        }
                    },
                    {
                        "data": "keterangan"
                    },
                    {
                        "data": "id",
                        render: function(data, type, row) {
                            let jlhBayar = "'" + row.jlh_bayar + "'";
                            return '<div class="text-center"><a href = "#" class = "btn btn-info" onclick="editRule(' +
                                data + ', ' + (jlhBayar) +
                                ')" > Edit </a></div> '
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
            }).buttons().container().appendTo('#tableCabang_wrapper .col-md-6:eq(0)');
        });

        function editRule(id, jlhBayarRule) {
            $('#modalEditRule').modal('show')
            $("#inputIdRule").val(id);
            $("#inputJlhBayar").val(jlhBayarRule);
        }
        $("#formEditRule").submit(function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            console.log(data);
            $.ajax({
                type: 'POST',
                data: data,
                url: "{{ url('api/edit_rules') }}",
                success: function(data) {

                    alert(data['success']);
                    $('#modalEditRule').modal('hide')
                    var table = $('#tableRule').DataTable();
                    table.ajax.reload(null, false);
                }
            });
        });
    </script>

@endsection
