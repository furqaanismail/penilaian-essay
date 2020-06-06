@extends('master_mhs')
@extends('header')
@section('judul','Penilaian ESSAY - dosen')

@section('konten')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar Ujian</h1>
        <p></p>

        <div class="row">
            @if (count($ujian) === 0 or count($jawaban) > 0)
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Ujian Belum Ada
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                @foreach($ujian as $data)
                    <div class="col-xl-3 col-md-6 mb-4">

                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div
                                            class="text-xs font-weight-bold text-primary text-uppercase mb-1"> {{$data->matkul}}
                                        </div>
                                        <div
                                            class="h5 mb-0 font-weight-bold text-gray-800">{{$data->nama_ujian}}</div>
                                        <a href="/mahasiswa/detail_ujian/{{$data->no_ujian}}"
                                           class="btn btn-primary mt-3 float-right">Kerjakan</a>
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
