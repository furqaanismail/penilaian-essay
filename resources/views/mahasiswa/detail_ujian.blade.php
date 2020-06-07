@extends('master_mhs')
@extends('header')
@section('judul','Mahasiswa - Detail Ujian')
@section('konten')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Mahasiswa</h1>
        <p></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Ujian</h6>
            </div>
            <div class="card-body">
                <div class="container">
                    <table class="align-items-center" style="margin: auto; width: 50%!important;">
                        <tr>
                            <th>No Ujian</th>
                            <td>&emsp; :</td>
                            <td>&ensp; {{$ujian->no_ujian}}</td>
                        </tr>
                        <tr>
                            <th>Nama Ujian</th>
                            <td>&emsp; :</td>
                            <td>&ensp; {{$ujian->nama_ujian}}</td>
                        </tr>
                        <tr>
                            <th>Waktu Ujian</th>
                            <td>&emsp; :</td>
                            <td>&ensp; {{$ujian->waktu}} menit</td>
                        </tr>
                        <tr>
                            <th>Nilai Per Soal</th>
                            <td>&emsp; :</td>
                            <td>&ensp; {{$ujian->nilai_per_soal}}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Soal</th>
                            <td>&emsp; :</td>
                            <td>&ensp; {{$ujian->jml_soal}}</td>
                        </tr>
                        <tr>
                            <th>Mata Kuliah</th>
                            <td>&emsp; :</td>
                            <td>&ensp; {{$ujian->matkul}}</td>
                        </tr>
                        <tr>
                            <th>Dosen</th>
                            <td>&emsp; :</td>
                            <td>&ensp; {{$ujian->dosen->nama}}</td>
                        </tr>
                    </table>
                    <div class="text-center">
                        <a href="/mahasiswa/soal/{{$ujian->no_ujian}}" class="btn btn-primary mt-4" style="">Mulai</a>
                    </div>


                </div>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
