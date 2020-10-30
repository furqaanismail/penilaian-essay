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
    public function index()
    {
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

    public function logout()
    {
        Session::flush();
        return redirect('/mahasiswa/auth');
    }

    public function register()
    {
        return view('mahasiswa/register');
    }

    public function proses_register(Request $request)
    {
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

    public function profile()
    {
        if (Session::get('nim')) {
            return view('mahasiswa/profile');
        } else {
            return redirect('mahasiswa/auth');
        }
    }

    public function materi()
    {
            $data = Materi::all();
            return view('mahasiswa/materi', ['materi' => $data]);
    }

    public function detail_materi($id)
    {
        if (Session::get('nim')) {
            $data = Materi::find($id);
            $dosen = Dosen::all();
            $ujian = KetUjian::where('materi_id', $data->id)->first();
            $mhs = Session::get('nim');
            $jawaban = Jawaban::where('mahasiswa_id', $mhs)->get();
            return view('mahasiswa/detail_materi', ['materi' => $data, 'dosen' => $dosen, 'ujian' => $ujian, 'jawaban' => $jawaban]);
        } else {
            return redirect('mahasiswa/auth');
        }
    }


    public function ujian()
    {
        if (Session::get('nim')) {
            $data = KetUjian::all();
            $mhs = Session::get('nim');
            $jawaban = Jawaban::where('mahasiswa_id', $mhs)->get();
            return view('mahasiswa/ujian', ['ujian' => $data, 'jawaban' => $jawaban]);
        } else {
            return redirect('mahasiswa/auth');
        }
    }

    public function detail_ujian($id)
    {
        if (Session::get('nim')) {
            $ujian = KetUjian::find($id);
            return view('mahasiswa/detail_ujian', ['ujian' => $ujian]);
        } else {
            return redirect('mahasiswa/auth');
        }
    }

    public function soal($id)
    {
        if (Session::get('nim')) {
            $soal = Soal::all();
            $ujian = KetUjian::find($id);
            $no = $id;
            //mebuat session mulai
            if (Session::get('mulai')) {
                $telah_berlalu = time() - Session::get('mulai');
            } else {
                Session::put('mulai', time());
                $telah_berlalu = 0;
            }

            $temp_waktu = ($ujian->waktu * 60) - $telah_berlalu;
            $temp_menit = (int)($temp_waktu / 60);
            $temp_detik = $temp_waktu % 60;
            if ($temp_menit < 60) {
                $jam = 0;
                $menit = $temp_menit;
                $detik = $temp_detik;
            } else {
                $jam = (int)($temp_menit / 60);
                $menit = $temp_menit % 60;
                $detik = $temp_detik;
            }
            return view('mahasiswa/soal', ['soal' => $soal, 'no' => $no, 'ujian' => $ujian, 'jam' => $jam, 'menit' => $menit, 'detik' => $detik]);
        } else {
            return redirect('mahasiswa/auth');
        }
    }

    public function store(Request $request)
    {
        if (Session::get('nim')) {

            $soal = $request->soal;
            $jawaban = $request->jawaban;
            $no = $request->no;
            $poin = $request->nilai_per_soal;
            $jml = $request->input('jml');
            $kunci = $request->kunci;

            $sum = 0;
            $nilai = new Nilai();
            for ($i = 1; $i <= $jml; $i++) {
                // rumus vsm
                similar_text($kunci[$i], $jawaban[$i],$persen);
                $hsl = round(round($persen)/100*($poin));
                $data = new Jawaban();
                $data->jawaban = $jawaban[$i];
                $data->mahasiswa_id = Session::get('nim');
                $data->nilai = $hsl;
                $data->similaritas = $persen/100;
                $data->ket_ujian_id = $no;
                $data->save();
                $sum+=$hsl;
            }

            $nilai->nilai = $sum;
            $nilai->mahasiswa_id = Session::get('nim');
            $nilai->ket_ujian_id = $no;
            $nilai->save();
            return redirect('/mahasiswa/hasil_ujian/' . $no);
        } else {
            return redirect('mahasiswa/auth');
        }
    }

    public function metode_vsm()
    {

    }

    public function hasil($id)
    {
        if (Session::get('nim')) {
            $nim = Session::get('nim');
            $jawaban = Jawaban::where('mahasiswa_id', $nim)->where('ket_ujian_id', $id)->get();
            return view('mahasiswa/hasil_ujian', ['jawaban' => $jawaban]);
        } else {
            return redirect('mahasiswa/auth');
        }

    }


}
