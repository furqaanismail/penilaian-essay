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
                <h6 class="m-0 font-weight-bold text-primary">Nilai Mahasiswa</h6>
                {{--                <a href="/user/create" class="btn btn-primary float-right" >ADD</a>--}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mahasiswa</th>
                            <th>Total Point</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>

                        @php $no =1;  @endphp
                        @foreach($nilai as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->mahasiswa->nama}}</td>
                                    <td>{{$data->nilai}}</td>
                                    <td>
                                        <a href="/dosen/delete_nilai/{{$data->id}}" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a>
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
