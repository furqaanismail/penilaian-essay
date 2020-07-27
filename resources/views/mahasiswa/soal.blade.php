<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mahasiswa - Jawab Soal</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('asset/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('asset/css/sb-admin-2.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this page -->
    <link href="{{asset('asset/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    {{--    ck editor--}}
    <script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"> </script>

</head>

<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">ESSAY</div>
        </a>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="/mahasiswa/materi">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Baca Materi</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link" href="/mahasiswa/ujian">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Ujian</span></a>
        </li>


    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <div class="topbar-divider d-none d-sm-block"></div>
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Session::get('nama')}}</span>
                            <i class="fas fa-user"></i>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="/mahasiswa/profile">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

        {{-- konten --}}
        <!-- Begin Page Content -->
            <div class="container-fluid">


                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Mata Kuliah</h1>
                <p class="mb-4">{{$ujian->matkul}} </p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <span class=" font-weight-bold text-primary">{{$ujian->nama_ujian}}</span>
                        <span class="float-right" id="timer"></span>
                    </div>
                    <div class="card-body bg-dark">
                        <form id="form_soal" action="/mahasiswa/add_jawaban" method="post">
                            {{ csrf_field() }}
                            @php $no = 0; @endphp
                            @foreach($soal as $data)
                                @php $no++; @endphp
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="jml" name="jml" value="{{$ujian->jml_soal}}">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="no" name="no" value="{{$ujian->no_ujian}}">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="no" name="nilai_per_soal" value="{{$ujian->nilai_per_soal}}">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="no" name="kunci[{{$no}}]" value="{{$data->kunci}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="level">Soal ke - {{$no}}</label>
                                            <div>{{$data->soal}}</div>
                                            <input type="hidden" class="form-control" id="soal[{{$no}}]" name="soal" value="{{$data->soal}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="level">  Jawaban</label>
                                            <textarea class="d-block form-control" name="jawaban[{{$no}}]" id="" cols="120" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                            <button type="submit" class="btn btn-primary float-right mr-2 mt-2">JAWAB</button>

                        </form>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
        </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Penilaian Essay 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/mahasiswa/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('asset/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('asset/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('asset/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('asset/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('asset/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('asset/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('asset/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('asset/js/demo/chart-pie-demo.js')}}"></script>
    <script src="{{asset('asset/js/demo/datatables-demo.js')}}"></script>

    {{--function generate--}}
<script type="text/javascript">
    $(document).ready(function () {
        var jam = JSON.parse("{{json_encode($jam)}}");
        var menit = JSON.parse("{{json_encode($menit)}}");
        var detik = JSON.parse("{{json_encode($detik)}}");


        function hitung() {

            setTimeout(hitung, 1000);

            if (menit < 10 && jam == 0) {
                var peringatan = 'style="color:red"';
            }
            ;
            $('#timer').html(
                '<p ' + peringatan + '>' + jam + ' jam : ' + menit + ' menit : ' + detik + ' detik</p>'
            );

            detik--;
            if (detik < 0) {
                detik = 59;
                menit--;
                if (menit < 0) {
                    menit = 59;
                    jam--;
                    if (jam < 0) {
                        clearInterval(hitung);
                        var formSoal = document.getElementById("#form_soal");
                        alert('Waktu Telah Habis.');
                        formSoal.submit();
                    }
                }
            }

        }

        hitung();
    });
</script>
</div>
</body>

</html>
