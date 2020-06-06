<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('judul')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('asset/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet" type="text/css">


</head>

<body >

{{--judul--}}
    <div class="display-1 text-white">
        <h1 class="text-center mt-4">Penilaian Essay Otomatis dengan Metode VSM</h1>
    </div>

{{--konten--}}
    <div class="container align-content-center">
        <div class="row">
            <div class="col-sm">
                <a href="/admin/auth" class="text-dark btn">
                    <div class="card shadow" style="width: 18rem; height: 18rem;">
                        <img class="card-img-top ml-1" style="height: 12rem; width: 17rem;" src="{{asset('asset/img/admin.png')}}" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text text-center mt-4">Administrator</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm">
                <a href="/dosen/auth" class="text-dark btn">
                    <div class="card shadow" style="width: 18rem; height: 18rem;">
                        <img class="card-img-top mt-2"  src="{{asset('asset/img/teachers.png')}}" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text text-center mt-5">Teachers</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm">
                <a href="/mahasiswa/auth" class="text-dark btn">
                    <div class="card shadow" style="width: 18rem; height: 18rem;">
                        <img class="card-img-top ml-3" style="height: 12rem; width: 15rem;" src="{{asset('asset/img/student.png')}}" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text text-center mt-4">Student</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>


<footer class="sticky-footer bg-dark">
       <div class="container text-center">
           <small class="">Copyright &copy; 2020</small>
       </div>
</footer>

</body>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>

</html>
