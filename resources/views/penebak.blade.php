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
                                                <a class="btn btn-info " target="__blank" data-toggle="modal"
                                                    data-target="#editPenebak">Edit</a>
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
                                        <a id="ss_dompet_parent" href="#" data-toggle="lightbox"
                                            data-title="SS Dompet Digital" data-gallery="gallery">
                                            <img id="ss_dompet" src="#" class="img-fluid mb-2" alt="SS Dompet Digital" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container -->
                </div>
                <!-- /.content -->

                <!-- Modal -->
                <div class="modal fade" id="editPenebak" tabindex="-1" role="dialog" aria-labelledby="editPenebakTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editPenebakTitle">Edit Penebak</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form id="formEditPenebak" method="POST">
                                    <input type="text" id="idPenebak">
                                    <div class="form-group row">
                                        <label for="inputNama" class="col-sm-4 col-form-label">Nama</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="inputNama" placeholder="Input Nama">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputKepalaCabang" class="col-sm-4 col-form-label">Kepala Cabang</label>
                                        <div class="col-sm-8">
                                            <select class="form-control select2bs4" id="inputKepalaCabang">
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
                                            <textarea class="form-control" id="inputAddress"
                                                placeholder="Input Idena Address"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputJenisPembayaran" class="col-sm-4 col-form-label">Jenis
                                            Pembayaran</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="inputJenisPembayaran">
                                                <option disabled selected>Pilih Pembayaran</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputNoPembayaran" class="col-sm-4 col-form-label">No.
                                            Pembayaran</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="inputNoPembayaran"
                                                placeholder="Input No.Pembayaran">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" form="formEditPenebak" class="btn btn-primary">Save changes</button>
                            </div>
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
                var image_url = "{{ url('storage') . '/' }}";

                var idena_identity_url = "{{ 'https://scan.idena.org/identity/' }}";

                var data_kepala_cabang = [];
                $(function() {
                    //Initialize select2bs4 Elements
                    // TODO: Masukkan kepala cabang
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
                        $("#no_dompet").text(data.no_hp_pembayaran);

                        $("#ss_dompet").attr("src", image_url + data.image_dompet);
                        $("#ss_dompet_parent").attr("href", image_url + data.image_dompet)

                        $("#idPenebak").val(data.id)
                        $("#inputNama").val(data.name)
                        $("#inputAddress").val(data.alamat_idena)
                        $("#inputNoPembayaran").val(data.no_hp_pembayaran)

                    });
                }
            </script>

        @endsection
