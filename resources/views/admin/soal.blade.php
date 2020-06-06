@extends('master')
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
                <h6 class="m-0 font-weight-bold text-primary">Daftar Ujian</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Ujian</th>
                            <th>Mata Kuliah</th>
                            <th>Nilai Per Soal</th>
                            <th>Jumlah Soal</th>
                            <th>Waktu</th>
                            <th>aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no =1;  @endphp
                        @foreach($ket as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->nama_ujian}}</td>
                                <td>{{$data->matkul}}</td>
                                <td>{{$data->nilai_per_soal}}</td>
                                <td>{{$data->jml_soal}}</td>
                                <td>{{$data->waktu}}</td>
                                <td>
                                    <a href="/admin/edit_soal/{{$data->no_ujian}}" class="btn btn-warning"><i class="fas fa-fw fa-edit"></i></a>
                                    <a href="/admin/delete_soal/{{$data->no_ujian}}" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                        </tbody>
                    </table>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
