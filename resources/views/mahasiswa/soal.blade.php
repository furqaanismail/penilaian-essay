@extends('master_mhs')
@extends('header')
@section('judul','Mahasiswa - Jawab Soal')

@section('konten')

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Mata Kuliah</h1>
        <p class="mb-4">{{$ujian->matkul}} </p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <span class=" font-weight-bold text-primary">{{$ujian->nama_ujian}}</span>
                <span class="float-right">00 : 60 : 00</span>
            </div>
            <div class="card-body bg-dark">
                <form action="/mahasiswa/add_jawaban" method="post">
                    {{ csrf_field() }}
                    @php $no = 0; @endphp
                    @foreach($soal as $data)
                        @php $no++; @endphp
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="jml" name="jml" value="{{$ujian->jml_soal}}">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="no" name="no" value="{{$ujian->no_ujian}}">
                                </div>
                                <div class="form-group">
                                    <label for="level">Soal ke - {{$no}}</label>
                                    <div>{{$data->soal}}</div>
                                    <input type="hidden" class="form-control" id="soal[{{$no}}]" name="soal" value="{{$data->soal}}">
                                </div>
                                <div class="form-group">
                                    <label for="level">  Jawaban</label>
                                    <textarea class="d-block" name="jawaban[{{$no}}]" id="" cols="120" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                    @endforeach


                    <button type="submit" class="btn btn-primary float-right mr-2 mt-2">JAWAB</button>

                </form>
            </div>

        </div>
        <!-- /.container-fluid -->

@endsection
