@extends('master_mhs')
@extends('header')
@section('judul','Mahasiswa - Jawab Soal')

@section('konten')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-center text-gray-800">{{$materi->topik}}</h1>
        <p id="isi_materi" class="mb-4 text-justify">
            {!! html_entity_decode($materi->isi_materi) !!}
        </p>
        <video class="mt-5" src="{{asset('/uploads/')}}/{{$materi->video}}" width="100%" height="300px" controls>
        </video>


    </div>
    <!-- /.container-fluid -->

@endsection
