@extends('master_dosen')
@extends('header')
@section('judul','Dosen - Detail Materi')

@section('konten')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="float-right mb-4">
        <a href="/dosen/edit_materi/{{$materi->id}}" class="btn btn-primary">Edit Materi</a>
        <a href="/dosen/edit_soal/{{$ujian->no_ujian}}" class="btn btn-secondary">Edit Soal</a>
            <a href="/dosen/nilai/{{$ujian->no_ujian}}" class="btn btn-secondary">Lihat Nilai</a>
        </div>

        <span class="mt-4"></span>
        <h1 class="h3 mb-2 ml-4 mt-4 text-center text-gray-800">&emsp;&emsp;&emsp;&emsp;&emsp;{{$materi->topik}}</h1>
        <p id="isi_materi" class="mb-4 text-justify">
            {!! html_entity_decode($materi->isi_materi) !!}
        </p>
        <div class="row mx-auto w-50">
            <div class="col">
                <video class="mt-5" src="{{asset('/uploads/')}}/{{$materi->video}}" width="90%" height="300px" controls>
                </video>
            </div>
        </div>



    </div>
    <!-- /.container-fluid -->

@endsection
