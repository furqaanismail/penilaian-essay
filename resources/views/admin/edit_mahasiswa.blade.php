@extends('master')
@extends('header')
@section('judul','Penilaian Essay - Admin')

@php
$pass = Hash::make($mhs->password);
@endphp

@section('konten')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">User</h1>
        <p class="mb-4">Data Managemen User Mahasiswa </p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <span class=" font-weight-bold text-primary">Edit Mahasiswa</span>
            </div>
            <div class="card-body">
                <form action="/admin/update_mahasiswa/{{$mhs->id}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="nim">Nim</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="{{$mhs->nim}}">
                        @if ($errors->has('nim'))
                                <div class="text-danger">
                                    {{ $errors->first('nim')}}
                                </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{$mhs->nama}}">
                        @if ($errors->has('nama'))
                                <div class="text-danger">
                                    {{ $errors->first('nama')}}
                                </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="d-block">Jenis Kelamin</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jk" id="pria" @if ("pria" == $mhs->jk)
                                checked
                            @endif value="pria">
                            <label class="form-check-label" for="pria">Laki - laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jk" id="wanita" @if ("wanita" == $mhs->jk)
                                checked
                            @endif value="wanita">
                            <label class="form-check-label" for="wanita">Perempuan</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary float-right mr-2 mt-2">EDIT</button>

                </form>
            </div>

        </div>
        <!-- /.container-fluid -->

@endsection
