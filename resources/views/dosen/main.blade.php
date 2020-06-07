@extends('master_dosen')
@extends('header')
@section('judul','Dosen - Dashboard')

@section('konten')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Ujian
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$ujian->count()}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-tasks
                                 fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Materi
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$materi->count()}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-tasks
                                 fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Ujian</h1>
        </div>

        <div class="row">

            @if(count($ujian) === 0)
                <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Belum Ada Ujian
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @else
                @foreach($ujian as $data)
                    <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                {{$data->nama_ujian}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            @endif
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
