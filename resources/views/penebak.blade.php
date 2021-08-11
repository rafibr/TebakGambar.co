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
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                        class="rounded-circle" width="150">
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
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <a id="ss_dompet_parent" href="{{ url('storage/SSDompet/background.jpg') }}"
                                            data-toggle="lightbox" data-title="SS Dompet Digital" data-gallery="gallery">
                                            <img id="ss_dompet" src="{{ url('storage/SSDompet/background.jpg') }}"
                                                class="img-fluid mb-2" alt="SS Dompet Digital" />
                                        </a>
                                        <a class="btn btn-outline-info d-flex justify-content-center" target="__blank"
                                            data-toggle="modal" data-target="#modalEditSS">Ganti SS</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container -->
                </div>
                <!-- /.content -->

                <!-- Modal -->
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
                                    <button type="submit" form="formEditPenebak" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

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

            <!-- Ekko Lightbox -->
            <script src="{{ asset('plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
            <!-- Filterizr-->
            <script src="{{ asset('plugins/filterizr/jquery.filterizr.min.js') }}"></script>
            <script>
                var api_url = "{{ url('api/penebak') . '/' . Request::segment(2) }}";
                var cabang_url = "{{ url('api/kepalaCabang') }}";
                var base_url = "{{ url('') }}";
                var image_url = "{{ url('storage/SSDompet') . '/' }}";

                var idena_identity_url = "https://scan.idena.org/identity/";

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


                    load_data(api_url);
                });

                function load_data(url) {
                    $.get(url, function(data, status) {
                        $("#nama_penebak").text(data.name);
                        $("#nama_kepalaCabang").text(data.kepala_cabang);
                        $("#idna_address").text(data.alamat_idena);
                        $("#nama_dompet").text(data.nama_dompet);
                        $("#no_pembayaran").text(data.no_hp_pembayaran);

                        $("#ss_dompet").attr("src", image_url + data.image_dompet);
                        $("#ss_dompet_parent").attr("href", image_url + data.image_dompet)

                        $(".idPenebak").val(data.id)
                        $("#inputNama").val(data.name)
                        $("#inputAddress").val(data.alamat_idena)
                        $("#inputNoPembayaran").val(data.no_hp_pembayaran)
                        $("#inputKepalaCabang").val(data.id_kepalaCabang).change();
                        $("#inputJenisPembayaran").val(data.tipe_pembayaran).change();

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
                    // console.log(new FormData(this));
                    $.ajax({
                        type: 'POST',
                        data: fd,
                        dataType: 'JSON',

                        contentType: false,
                        processData: false,
                        url: "{{ url('api/save_ssdompet') }}",
                        success: function(data) {
                            load_data(api_url);
                            alert(data['success']);
                            $("#modalEditSS").modal('hide');
                        }
                    });
                });
            </script>

        @endsection
