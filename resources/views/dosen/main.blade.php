@extends('master_dosen')
@extends('header')
@section('judul','Dosen - Dashboard')

@section('konten')

    <!-- Begin Page Content -->
<div class="container-fluid" style="background-image: url('{{asset('asset/img/image2.png')}}'); background-position: right-bottom; backgrounf-repeat: no-repeat; background-size: cover;" >

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Materi</h1>
        </div>



        <!-- Content Row -->
        <div class="row">
            @if(count($materi) === 0)
                <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">

                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <img width="200" height="200" src="{{asset('asset/img/student.png')}}" alt="">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Materi Belum Ada</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @else
                @foreach($materi as $data)

                    <!-- Earnings (Monthly) Card Example -->

                        <div class="col-xl-2 col-md-3 mb-4">
                            <a href="/dosen/detail_materi/{{$data->id}}" class="text-dark btn">
                            <div class="card shadow h-80 py-2" style="width: 18rem;">
                                <div class="card-body">

                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">

                                            <img width="200" height="200" src="{{asset('uploads/images')}}/{{$data->image}}" alt="">
                                            <div
                                                class="text-xs font-weight-bold text-primary text-uppercase mb-1"> {{$data->matkul}}
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data->topik}}</div>
                                            <form action="/dosen/delete_materi/{{$data->id}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            <button type="submit"
                                               class="btn btn-danger mt-3 float-left">Delete</button>
                                            </form>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </a>
                        </div>

                    @endforeach
                @endif
            </div>


    </div>
    <!-- /.container-fluid -->
@endsection
