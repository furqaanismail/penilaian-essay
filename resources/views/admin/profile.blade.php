@extends('master')
@extends('header')
@section('judul','Penilaian Essay - Admin')

@section('konten')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Administrator</h1>
        <p></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Profile</h6>
                {{--                <a href="/user/create" class="btn btn-primary float-right" >ADD</a>--}}
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{Session::get('username')}}">
                        </div>
                      </div>
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{Session::get('nama')}}">
                      </div>
                    </div>
                  </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

@endsection
