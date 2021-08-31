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
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('profile/' . Auth::user()->id) }}">Profile</a>
                            </li>
                            <li class="breadcrumb-item active">Penebak</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="row gutters-sm">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class=" align-items-center text-center">
                                    <table class="table-sm table-bordered table-hover w-100 table-dark" id="table-finance">
                                        <thead>
                                            <tr>

                                                <th>iDNA</th>
                                                <th>Stake 🔒</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                                <td>iDNA <span id="idna"></span></td>
                                                <td>iDNA <span id="idna_stake"></span></td>

                                            </tr>
                                        </tbody>

                                    </table>
                                    <div class="mt-3">
                                        <h4 id="nama_penebak"></h4>
                                        <hr>
                                        <div class="row align-items-center">
                                            <div class="col-sm-5">
                                                <h6 class="mb-0">Kepala Cabang</h6>
                                            </div>
                                            <div class="col-sm-7 text-secondary" id="nama_kepalaCabang">
                                                Kepala Cabang
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row align-items-center">
                                            <div class="col-sm-5">
                                                <h6 class="mb-0">Address</h6>
                                            </div>
                                            <div class="col-sm-7 text-secondary" id="idna_address">
                                                Address
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row align-items-center">
                                            <div class="col-sm-5">
                                                <h6 class="mb-0">Pembayaran</h6>
                                            </div>
                                            <div class="col-sm-7 text-secondary" id="nama_dompet">
                                                Pembayaran
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row align-items-center">
                                            <div class="col-sm-5">
                                                <h6 class="mb-0">No. Pembayaran</h6>
                                            </div>
                                            <div class="col-sm-7 text-secondary" id="no_pembayaran">
                                                No. Pembayaran
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row text-left">
                                            <div class="col-sm-12">
                                                <a class="btn btn-info d-flex justify-content-center" target="__blank"
                                                    data-toggle="modal" data-target="#modalEditPenebak">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <a id="ss_dompet_parent"
                                                    href="{{ url('storage/SSDompet/background.jpg') }}"
                                                    data-toggle="lightbox" data-title="SS Dompet Digital"
                                                    data-gallery="gallery">
                                                    <img id="ss_dompet" src="{{ url('storage/SSDompet/background.jpg') }}"
                                                        class="img-fluid mb-2" alt="SS Dompet Digital" />
                                                </a>
                                                <a class="btn btn-outline-info d-flex justify-content-center"
                                                    target="__blank" data-toggle="modal" data-target="#modalEditSS">Ganti
                                                    Gambar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                    </div>
                    <!-- /.container -->
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card mb-3">
                            <div class="card-body">

                                <div class="card">
                                    <div class="card-header text-center bg-secondary">
                                        <h5 class="card-title">Histori Validasi</h5>

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

                                                <a id="btnModalTambah" class="btn btn-info justify-content-center">Sync
                                                    Data</a>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-auto">
                                                <table id="tableHistory"
                                                    class="display compact table-responsive nowrap table table-sm table-responsive table-hover table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Epoch</th>
                                                            <th>Tgl Validasi</th>
                                                            <th>Age</th>
                                                            <th>Status Nilai</th>
                                                            <th>Nilai</th>
                                                            <th>Pembayaran</th>
                                                            <th>Status Pembayaran</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tableHistory-body">

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
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.content -->

                <!-- Modal edit penebak -->
                <div class="modal fade" id="modalEditPenebak" role="dialog" aria-labelledby="modalEditPenebakTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalEditPenebakTitle">Edit Penebak</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form id="formEditPenebak" method="POST">
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
                                            <select name="inputKepalaCabang" class="form-control select2bs4"
                                                id="inputKepalaCabang">
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

                                                    <option value="{{ $m->id_dompet }}">{{ $m->nama_dompet }}</option>

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
                                    <button type="submit" form="formEditPenebak" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal edit gambar ss dompet-->
                <div class="modal fade" id="modalEditSS" role="dialog" aria-labelledby="modalEditSSTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalEditSSTitle">Edit Penebak</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form id="formEditSS" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <input type="hidden" class="idPenebak" id="idPenebakSS" name="idPenebakSS">
                                    <div class="form-group">
                                        <label for="fileSSDompet">SS Dompet</label>
                                        <input type="file" name="imgupload" class="form-control" id="imgupload"
                                            accept="image/png, image/gif, image/jpeg">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" form="formEditSS" class="btn btn-success">Simpan</button>
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

            <!-- Ekko Lightbox -->
            <script src="{{ asset('plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
            <!-- Filterizr-->
            <script src="{{ asset('plugins/filterizr/jquery.filterizr.min.js') }}"></script>
            <script>
                var api_url = "{{ url('api/penebak') . '/' . Request::segment(2) }}";
                var api_history = "{{ url('api/history') . '/' . Request::segment(2) }}";

                var cabang_url = "{{ url('api/kepalaCabang') }}";
                var base_url = "{{ url('') }}";
                var image_url = "{{ url('storage/SSDompet') . '/' }}";
                var idena_identity_url = "https://scan.idena.org/identity/";
                var get_id_penebak = "{{ Request::segment(2) }}";

                var get_balance = "https://api.idena.io/api/Address/";


                // https://api.idena.io/api/Identity/0xdb322d16abe145d4e2d15d907f49a80d2fe2dc93/Age (get age)

                // https://api.idena.io/api/Epoch/Last(get Last Epoch)

                // https://api.idena.io/api/Identity/0xdb322d16abe145d4e2d15d907f49a80d2fe2dc93 (get identity)
                // https://api.idena.io/api/Epoch/72/Identity/0xdb322d16abe145d4e2d15d907f49a80d2fe2dc93 (get state, prevstate, point)

                var idna_address;
                var age_url;
                var state_url;
                var epoch_url;

                var data_kepala_cabang = [];

                $(function() {
                    //Initialize Select2 Elements
                    $('.select2bs4').select2({
                        theme: 'bootstrap4'
                    })

                    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                        event.preventDefault();
                        $(this).ekkoLightbox({
                            alwaysShowClose: true
                        });
                    });

                    $('.filter-container').filterizr({
                        gutterPixels: 3
                    });
                    $('.btn[data-filter]').on('click', function() {
                        $('.btn[data-filter]').removeClass('active');
                        $(this).addClass('active');
                    });
                })

                $(document).ready(function() {
                    $("#loaderSync").hide();
                    load_data(api_url);
                });

                $("#btnModalTambah").click(function() {
                    load_state();
                });

                $("#inputEditEpoch").on('change paste input', function() {
                    load_edit_state();
                });

                function load_state() {

                    sync_data = "https://api.idena.io/api/Identity/" + idna_address + "/Epochs?limit=100";
                    $.get(sync_data, function(hasil) {

                        $.ajax({
                            type: 'POST',
                            data: hasil,
                            url: "{{ url('api/sync') . '/' . Request::segment(2) }}",
                            beforeSend: function() {

                                $("#loaderSync").show();
                                setTimeout(function() {
                                    $("#textLoader").text("Still collecting data...")
                                }, 10000);
                                setTimeout(function() {
                                    $("#textLoader").text("Taking longer than anticipated...")
                                }, 20000);
                            },
                            success: function(data) {

                                alert(data['success']);
                                $("#loaderSync").hide();
                                var table = $('#tableHistory').DataTable();
                                table.ajax.reload(null, false);
                            }
                        });

                    });

                }

                function load_edit_state() {
                    epochChoose = $("#inputEditEpoch").val();
                    state_url = "https://api.idena.io/api/Epoch/" + epochChoose +
                        "/Identity/" + idna_address;

                    $.get(state_url, function(data) {
                        $("#inputEditPrevState").val(data.result.prevState);
                        $("#inputEditState").val(data.result.state);

                        flipsCount = data.result.totalShortAnswers.flipsCount;
                        point = data.result.totalShortAnswers.point;

                        nilai = ((point / flipsCount) * 100).toFixed(3);

                        $("#inputEditNilai").val(nilai);
                    });
                }

                function load_data(url) {
                    $("#tableHistory").DataTable({
                        dom: 'Bfrtip',
                        processing: true,
                        serverSide: true,
                        "ajax": api_history,
                        "columns": [{
                                "data": "epoch"
                            },
                            {
                                "data": "tgl_validasi"
                            },
                            {
                                "data": "age"
                            },
                            {
                                "data": "status_nilai"
                            },
                            {
                                title: "Nilai (%)",
                                "data": "nilai"
                            },
                            {
                                "data": "jumlah_pembayaran",
                                render: function(data, type, row) {
                                    return convertToRupiah(data);
                                }
                            },
                            {
                                "data": "id_history",
                                render: function(data, type, row) {
                                    if (row.status_pembayaran == 'Belum') {
                                        return '<div class="text-center"> <button onclick="statusPembayaran(' +
                                            data +
                                            ')" class="btn btn-danger justify-content-center">Belum</button> </div> '
                                    } else {
                                        return '<div class="text-center"> <button onclick="statusPembayaran(' +
                                            data +
                                            ')" class="btn btn-success justify-content-center">Selesai</button> </div> '
                                    }

                                }
                            }
                        ],

                        "responsive": false,
                        "lengthChange": false,
                        "autoWidth": false,
                        "buttons": ["pageLength", "copy", "csv", "excel", "pdf", "print", "colvis"]
                    }).buttons().container().appendTo('#tableHistory_wrapper .col-md-6:eq(0)');
                    var urlBal = "";
                    $.get(url, function(data, status) {
                        idna_address = data.alamat_idena;
                        $("#nama_penebak").text(data.name_penebak);
                        $("#nama_kepalaCabang").text(data.name);
                        $("#idna_address").text(data.alamat_idena);
                        $("#nama_dompet").text(data.nama_dompet);
                        $("#no_pembayaran").text(data.no_pembayaran);

                        $("#ss_dompet").attr("src", image_url + data.image_dompet);
                        $("#ss_dompet_parent").attr("href", image_url + data.image_dompet)

                        $(".idPenebak").val(data.id_penebak)
                        $("#inputNama").val(data.name_penebak)
                        $("#inputAddress").val(data.alamat_idena)
                        $("#inputNoPembayaran").val(data.no_pembayaran)
                        $("#inputKepalaCabang").val(data.id).change();
                        $("#inputJenisPembayaran").val(data.id_dompet).change();

                        urlBal = get_balance + idna_address;
                        $.get(urlBal, function(dataBal, status) {
                            console.log(Math.round(dataBal.result.balance));
                            $("#idna").text(Math.round(dataBal.result.balance));
                            $("#idna_stake").text(Math.round(dataBal.result.stake));
                        });
                    });




                }

                $("#formEditPenebak").submit(function(e) {
                    e.preventDefault();
                    var data = $(this).serialize();
                    $.ajax({
                        type: 'POST',
                        data: data,
                        url: "{{ url('api/save_penebak') }}",
                        success: function(data) {
                            load_data(api_url);
                            alert(data['success']);
                            $("#modalEditPenebak").modal('hide');
                        }
                    });
                });

                $("#formEditSS").submit(function(e) {
                    e.preventDefault();

                    // Get the selected file
                    var files = $('#imgupload')[0].files;
                    var id_penebak = $('#idPenebakSS').val();
                    var fd = new FormData(this);
                    fd.append('file', files[0]);
                    fd.append('id_penebak', id_penebak);

                    $.ajax({
                        type: 'POST',
                        data: fd,
                        dataType: 'JSON',

                        contentType: false,
                        processData: false,
                        url: "{{ url('api/save_ssdompet') }}",
                        success: function(data) {
                            alert(data['success']);

                            load_data(api_url);
                            $("#modalEditSS").modal('hide');
                        }
                    });
                });

                function statusPembayaran(id_history) {
                    $.ajax({
                        type: 'POST',
                        data: {
                            data: id_history
                        },
                        dataType: 'JSON',
                        url: "{{ url('api/edit_status_bayar') }}",
                        success: function(data) {
                            var table = $('#tableHistory').DataTable();
                            table.ajax.reload(null, false);
                        }
                    });
                }
            </script>

        @endsection
