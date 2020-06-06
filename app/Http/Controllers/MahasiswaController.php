<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Dosen;
use App\Jawaban;
use App\KetUjian;
use App\Mahasiswa;
use App\Materi;
use App\Nilai;
use App\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as requet;
use Illuminate\Support\Facades\Session;

class MahasiswaController extends Controller
{
    public function index(){
        return view('mahasiswa/login');
    }

    public function login(Request $request)
    {
        $nim = $request->nim;
        $password = $request->password;

        $data = Mahasiswa::where('nim', $nim)->first();
        if ($data) {
            if (Hash::check($password, $data->password)) {
                Session::put('nim', $data->nim);
                Session::put('nama', $data->nama);
                Session::put('login', TRUE);
                return redirect('/mahasiswa/materi');
            } else {
                return redirect('/mahasiswa/auth');
            }
        } else {
            return redirect('/mahasiswa/auth');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/mahasiswa/auth');
    }

    public function register(){
        return view('mahasiswa/register');
    }

    public function proses_register(Request $request){
        $this->validate($request, [
           'nim' => 'required|unique:mahasiswa',
            'nama' => 'required',
            'password' => 'required',
            'password2' => 'required|same:password'
        ]);

        $data = new Mahasiswa();
        $data->nim = $request->nim;
        $data->nama = $request->nama;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect('mahasiswa/auth');
    }

    public function profile(){
        return view('mahasiswa/profile');
    }

    public function materi(){
        $data = Materi::all();
        return view('mahasiswa/materi', ['materi' => $data]);
    }

    public function detail_materi($id){
        $data = Materi::find($id);
        $dosen = Dosen::all();
        return view('mahasiswa/detail_materi',['materi'=>$data, 'dosen' => $dosen]);
    }


    public function ujian(){
        $data = KetUjian::all();
        $mhs = Session::get('nim');
        $jawaban = Jawaban::where('mahasiswa_id', $mhs)->get();
        return view('mahasiswa/ujian', ['ujian' => $data, 'jawaban' => $jawaban]);
    }

    public function detail_ujian($id){
        $ujian = KetUjian::find($id);
        return view('mahasiswa/detail_ujian',['ujian' => $ujian]);
    }

    public function soal($id){
        $soal = Soal::all();
        $ujian = KetUjian::find($id);
        $no = $id;
        return view('mahasiswa/soal',['soal' => $soal , 'no' => $no, 'ujian' => $ujian] );
    }

    public function store(Request $request){
        $this->validate($request, [
            'jawaban' => 'required'
        ]);

        $soal = $request->soal;
        $jawaban = $request->jawaban;
        $no = $request->no;
        $jml = $request->input('jml');
        for ($i=1; $i<= $jml; $i++){
            $data = new Jawaban();
            $data->jawaban = $jawaban[$i];
            $data->mahasiswa_id = Session::get('nim');
            $data->nilai = "20";
            $data->ket_ujian_id = $no;
            $data->save();
        }
        $nilai = new Nilai();
        $nilai->nilai = "100";
        $nilai->mahasiswa_id = Session::get('nim');
        $nilai->ket_ujian_id = $no;
        $nilai->save();
        return redirect('/mahasiswa/hasil_ujian/'.$no);
    }

   public function metode_vsm(){

   }

   public function hasil($id){
        $nim = Session::get('nim');
       $jawaban = Jawaban::where('mahasiswa_id', $nim)->where('ket_ujian_id', $id)->get();
       return view('mahasiswa/hasil_ujian', ['jawaban' => $jawaban]);
   }


}
