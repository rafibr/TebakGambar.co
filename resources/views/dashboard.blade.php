@extends('core.app')

@section('content')

    <!-- Navbar -->
    @include('layouts.nav')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.sidebar')
    <!-- /.Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    @include('layouts.content')
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    @include('layouts.controlbar')
    <!-- /.control-sidebar -->

    <!-- Admin Footer -->
    @include('layouts.footer')

@endsection
