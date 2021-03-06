<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\Kelas;
use App\KetUjian;
use App\Materi;
use App\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DosenSoalController extends Controller
{
    // managemen materi

    public function index()
    {
        $soal = Soal::all();
        $data = KetUjian::all();
        return view('dosen/soal', ['ket' => $data, 'soal' => $soal]);
    }

    public function show($id)
    {
        $ujian = KetUjian::find($id);
        $soal = Soal::all();
        return view('dosen/soal_edit', ['ujian' => $ujian, 'soal' => $soal]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'waktu' => 'required',
            'nilai' => 'required',
            'jml' => 'required',
            'matkul' => 'required'
        ]);

        $data = KetUjian::find($id);
        $data->nama_ujian = $request->input('nama');
        $data->waktu = $request->input('waktu');
        $data->nilai_per_soal = $request->input('nilai');
        $data->matkul = $request->input('matkul');
        $data->jml_soal = $request->input('jml');
        $data->save();
        $soal = $request->soal;
        $kunci = $request->kunci;
        $jml = $request->input('jml');
        $id_soal = $request->input('id');
        for ($i = 1; $i <= $jml; $i++) {
            $datas = Soal::find($id_soal[$i]);
            $datas->soal = $soal[$i];
            $datas->kunci = $kunci[$i];
            $datas->ket_ujian_id = $id;
            $datas->save();
        }

        return redirect('/dosen');
    }

    public function create(Request $request, $id)
    {
        $ujian = KetUjian::all();
        $awal = "UJN-00";
        $data = Materi::find($id);
        $no = 1;
        if ($ujian) {
            $kode = $awal . ($ujian->count() + 1);
        } else {
            $kode = $awal . $no;
        }
        return view('dosen/soal_add', ['kode' => $kode, 'materi' => $data]);
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'waktu' => 'required',
            'nilai' => 'required',
            'jml' => 'required',
            'matkul' => 'required'
        ]);

        $data = new KetUjian();
        $data->no_ujian = $request->kode;
        $data->nama_ujian = $request->input('nama');
        $data->waktu = $request->input('waktu');
        $data->nilai_per_soal = $request->input('nilai');
        $data->matkul = $request->input('matkul');
        $data->jml_soal = $request->input('jml');
        $data->dosen_id = Session::get('id');
        $data->materi_id = $id;
        $data->save();
        $soal = $request->soal;
        $kunci = $request->kunci;
        $jml = $request->input('jml');
        for ($i = 1; $i <= $jml; $i++) {
            $data = new Soal();
            $data->soal = $soal[$i];
            $data->kunci = $kunci[$i];
            $data->ket_ujian_id = $request->input('kode');
            $data->save();
        }
        return redirect('/dosen');
    }


}
