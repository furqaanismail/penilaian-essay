@extends('master')
@extends('header')
@section('judul','Penilaian Essay - Admin')

@section('konten')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">User</h1>
        <p></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
                {{--                <a href="/user/create" class="btn btn-primary float-right" >ADD</a>--}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Stambuk</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                                               @php $no =1;  @endphp
                                               @foreach($mhs as $data)
                                                    <tr>
                                                        <td>{{$no++}}</td>
                                                        <td>{{$data->nim}}</td>
                                                        <td>{{$data->nama}}</td>
                                                        <td>{{$data->jk}}</td>
                                                        <td>
                                                            <a href="/admin/edit_mahasiswa/{{$data->id}}" class="btn btn-warning"><i class="fas fa-fw fa-edit"></i></a>
                                                            <a href="/admin/delete_mahasiswa/{{$data->id}}" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
