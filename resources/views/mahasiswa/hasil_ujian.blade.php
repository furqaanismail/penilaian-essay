@extends('master_mhs')
@extends('header')
@section('judul','Mahasiswa - Hasil Ujian')

@section('konten')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Mahasiswa</h1>
        <p></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Hasil Evaluasi</h6>
                <a href="/mahasiswa/materi" class="btn btn-primary float-right">Kembali ke Home</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Similaritas</th>
                            <th>Nilai</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no =1;  @endphp
                        @foreach($jawaban as $data)
                            <tr>
                                <td>{{$no++}}</td>
                            <td>{{$data->similaritas}}</td>
                                <td>{{$data->nilai}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
