@extends('master_auth')
@section('judul','Dosen - Login')
@section('konten')
<div class="jumbotron" style="background-image: url('{{asset('asset/img/background1.jpg')}}'); background-position: center; background-repeat: no-repeat; background-size: cover; height: 100%; margin-bottom: -10px;">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-8 my-4">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back Dosen!</h1>
                                    </div>
                                    <form class="user" method="post" action="/dosen/proses_login">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="nip" aria-describedby="emailHelp" placeholder="Enter Nip">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password">
                                        </div>
                                        <button type="submit"  class="btn btn-primary btn-user btn-block" >
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/dosen/register">Belum Punya Akun? register!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="/">Kembali ke Home?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
