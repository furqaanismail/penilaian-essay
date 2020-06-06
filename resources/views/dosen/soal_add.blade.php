@extends('master_dosen')
@extends('header')
@section('judul','Dosen - Soal')

@section('konten')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Dosen</h1>
        <p class="mb-4">Data Managemen Soal </p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <span class=" font-weight-bold text-primary">Buat ujian</span>

            </div>
            <div class="card-body">
                <form action="/dosen/add_ujian" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="">No Ujian</label>
                        <input type="text" class="form-control" id="no" name="kode" value="{{$kode}}">
                        @if ($errors->has('no'))
                            <div class="text-danger">
                                {{ $errors->first('no')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="">Nama Ujian</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="">
                        @if ($errors->has('nama'))
                            <div class="text-danger">
                                {{ $errors->first('nama')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="">Waktu</label>
                        <input type="text" class="form-control" id="waktu" name="waktu" value="">
                        @if ($errors->has('waktu'))
                            <div class="text-danger">
                                {{ $errors->first('waktu')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="">Nilai Per Soal</label>
                        <input type="number" class="form-control" id="nilai" name="nilai" value="">
                        @if ($errors->has('nilai'))
                            <div class="text-danger">
                                {{ $errors->first('nilai')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="">Jumlah Soal</label>
                        <input type="number" class="form-control" id="jml" name="jml" value="">
                        @if ($errors->has('jml'))
                            <div class="text-danger">
                                {{ $errors->first('jml')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="matkul">Mata Kuliah</label>
                        <input type="text" class="form-control" id="matkul" name="matkul" value="">
                        @if ($errors->has('matkul'))
                            <div class="text-danger">
                                {{ $errors->first('matkul')}}
                            </div>
                        @endif
                    </div>
                    <button id="tambah" type="button" class="btn btn-success">Add SOAL</button>

                    <button id="buat" type="submit" class="btn btn-primary float-right mr-2 mt-2">BUAT</button>

                </form>
            </div>

        </div>
        <!-- /.container-fluid -->

@endsection
