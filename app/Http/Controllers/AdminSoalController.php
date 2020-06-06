<?php

namespace App\Http\Controllers;

use App\Jawaban;
use App\KetUjian;
use App\Matkul;
use App\Nilai;
use App\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminSoalController extends Controller
{
    // managemen materi

    public function index()
    {
        $soal = Soal::all();
        $data = KetUjian::all();
        return view('admin/soal',['ket'=>$data, 'soal' => $soal]);
    }

    public function show($id){
        $ujian = KetUjian::find($id);
        $soal = Soal::all();
        return view('admin/edit_soal',['ujian'=>$ujian, 'soal' => $soal]);
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
        for ($i=1; $i<= $jml; $i++){
            $datas = Soal::find($id_soal[$i]);
            $datas->soal = $soal[$i];
            $datas->kunci = $kunci[$i];
            $datas->ket_ujian_id = $id;
            $datas->save();
        }


        return redirect('/admin/soal');
    }

    public function destroy($id){
        $data = Soal::where('ket_ujian_id',$id)->delete();
        $jawaban = Jawaban::where('ket_ujian_id', $id)->delete();
        $nilai = Nilai::where('ket_ujian_id', $id)->delete();
        $data2 = KetUjian::find($id)->delete();
        return redirect('/admin/soal');
    }
}
