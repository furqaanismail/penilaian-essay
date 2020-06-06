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
                <span class=" font-weight-bold text-primary">Edit ujian</span>

            </div>
            <div class="card-body">
                <form action="/admin/update_soal/{{$ujian->no_ujian}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label class="">Nama Ujian</label>
                        <input type="text" class="form-control" id="level" name="nama" value="{{$ujian->nama_ujian}}">
                    </div>
                    <div class="form-group">
                        <label class="">Waktu</label>
                        <input type="text" class="form-control" id="level" name="waktu" value="{{$ujian->waktu}}">
                    </div>
                    <div class="form-group">
                        <label class="">Nilai Per Soal</label>
                        <input type="number" class="form-control" id="level" name="nilai"
                               value="{{$ujian->nilai_per_soal}}">
                    </div>
                    <div class="form-group">
                        <label class="">Jumlah Soal</label>
                        <input type="number" class="form-control" id="level" name="jml" value="{{$ujian->jml_soal}}">
                    </div>
                    <div class="form-group">
                        <label for="matkul">Mata Kuliah</label>
                        <input type="text" class="form-control" id="level" name="matkul" value="{{$ujian->matkul}}">
                    </div>
                    @php $no=0; @endphp
                    @foreach($soal as $data)
                        @if ($data->ket_ujian_id === $ujian->no_ujian)
                            @php $no++; @endphp
                            <div class="card mb-3 mt-3">
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="soal" placeholder="Masukkan Soal ..."
                                               name="id[{{$no}}]" value="{{$data->id}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="">Soal ke - {{$no}}</label>
                                        <input type="text" class="form-control" id="soal" placeholder="Masukkan Soal ..."
                                               name="soal[{{$no}}]" value="{{$data->soal}}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="kunci"
                                               placeholder="Masukkan Kunci Jawaban"
                                               name="kunci[{{$no}}]" value="{{$data->kunci}}">
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endforeach


                    <button type="submit" class="btn btn-primary float-right mr-2 mt-2">EDIT</button>

                </form>
            </div>

        </div>
        <!-- /.container-fluid -->

@endsection
