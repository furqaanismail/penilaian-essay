@extends('master_mhs')
@extends('header')
@section('judul','Mahasiswa - Baca Materi')

@section('konten')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="float-right">
            @if(count($jawaban) > 0)
            <a hidden href="/mahasiswa/detail_ujian/{{$ujian->no_ujian}}" class="btn btn-primary">Ikuti Ujian</a>
            @else
            <a href="/mahasiswa/detail_ujian/{{$ujian->no_ujian}}" class="btn btn-primary">Ikuti Ujian</a>
            @endif

        <a href="/mahasiswa/materi" class="btn btn-secondary">Halaman Utama</a>
        </div>

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-center ml-5 text-gray-800">&emsp;&emsp;&emsp;{{$materi->topik}}</h1>
        <p id="isi_materi" class="mb-4 text-justify">
            {!! html_entity_decode($materi->isi_materi) !!}
        </p>
        <video class="mt-5" src="{{asset('/uploads/')}}/{{$materi->video}}" width="100%" height="300px" controls>
        </video>


    </div>
    <!-- /.container-fluid -->

@endsection
