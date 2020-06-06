@extends('master_dosen')
@extends('header')
@section('judul','Penilaian ESSAY - dosen')

@section('konten')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Dosen</h1>
        <p></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Periksa materi</h6>
                {{--                <a href="/user/create" class="btn btn-primary float-right" >ADD</a>--}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Ujian</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no =1;  @endphp
                        @foreach($ujian as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->nama_ujian}}</td>
                                <td>
                                    <a href="/dosen/nilai/{{$data->no_ujian}}" class="btn btn-success"><i class="fas fa-fw fa-info"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
