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
                <h6 class="m-0 font-weight-bold text-primary">Daftar materi</h6>
                <a href="/dosen/create_materi" class="btn btn-primary float-right">BUAT</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Topik Materi</th>
                            <th>video</th>
                            <th>Matkul</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no =1;  @endphp
                        @foreach($dosen as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->topik}}</td>
                                <td>{{$data->video}}</td>
                                <td>{{$data->matkul}}</td>
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
