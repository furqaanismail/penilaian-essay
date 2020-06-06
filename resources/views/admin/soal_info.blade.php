@extends('master')
@extends('header')
@section('judul','Dosen - Soal')

@section('konten')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Admin</h1>
        <p class="mb-4">Data Managemen Soal </p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <span class=" font-weight-bold text-primary">Buat ujian</span>

            </div>
            <div class="card-body bg-dark">
                <form action="/dosen/add_soal" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="level" name="ket" value="{{$ket->id}}">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="level" name="jml" value="{{$ket->jml_soal}}">
                    </div>
                    @for($i=1; $i<=$ket->jml_soal; $i++)
                        <div class="card mb-3 mt-3">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="">Soal ke - {{$i}}</label>
                                    <input type="text" class="form-control" id="level" placeholder="Masukkan Soal ..."
                                           name="soal[{{$i}}]" value="">
                                    @if ($errors->has('soal'))
                                        <div class="text-danger">
                                            {{ $errors->first('soal')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="level"
                                           placeholder="Masukkan Kunci Jawaban"
                                           name="kunci[{{$i}}]" value="">
                                    @if ($errors->has('kunci'))
                                        <div class="text-danger">
                                            {{ $errors->first('kunci')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endfor


                    <button type="submit" class="btn btn-primary float-right mr-2 mt-2">TAMBAH</button>

                </form>
            </div>

        </div>
        <!-- /.container-fluid -->

@endsection
