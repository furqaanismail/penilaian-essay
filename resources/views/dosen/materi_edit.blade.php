@extends('master_dosen')
@extends('header')
@section('judul','Penilaian Essay - Dashboard')

@section('konten')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Dosen</h1>
        <p class="mb-4">Data Manajemen Materi </p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <span class=" font-weight-bold text-primary">Edit Materi</span>
            </div>
            <div class="card-body">
                <form action="/dosen/update_materi/{{$materi->id}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="topik">Judul Materi</label>
                    <input type="text" class="form-control" id="topik" name="topik" value="{{$materi->topik}}">
                         @if ($errors->has('topik'))
                                <div class="text-danger">
                                    {{ $errors->first('topik')}}
                                </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="isi_materi">Materi</label>
                    <textarea class="ckeditor" name="isi_materi" id="isi_materi">{{$materi->isi_materi}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="topik">Mata Kuliah</label>
                        <input type="text" class="form-control" id="matkul" name="matkul" value="{{$materi->matkul}}">
                        @if ($errors->has('matkul'))
                            <div class="text-danger">
                                {{ $errors->first('matkul')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="d-block">Upload Video</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                            <input type="file" name="file" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">{{$materi->video}}</label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary float-right mr-2 mt-2">Tambah</button>
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">

                </form>
            </div>

        </div>
        <!-- /.container-fluid -->
@endsection
