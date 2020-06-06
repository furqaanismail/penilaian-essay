@extends('master')
@extends('header')
@section('judul','Admin - Dosen')

@section('konten')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">User</h1>
        <p class="mb-4">Data Managemen User Dosen </p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <span class=" font-weight-bold text-primary">Edit Dosen</span>
            </div>
            <div class="card-body">
            <form action="/admin/update_dosen/{{$dosen->id}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="nip">Nip</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="{{$dosen->nip}}">

                        @if ($errors->has('nip'))
                            <div class="text-danger">
                                {{ $errors->first('nip')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{$dosen->nama}}">

                        @if ($errors->has('nama'))
                            <div class="text-danger">
                                {{ $errors->first('nama')}}
                            </div>
                        @endif
                    </div>


                    <button type="submit" class="btn btn-primary float-right mr-2 mt-2">EDIT</button>

                </form>
            </div>

        </div>
        <!-- /.container-fluid -->

@endsection
