<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\Jawaban;
use App\KetUjian;
use App\Materi;
use App\Nilai;
use App\Soal;
use Illuminate\Support\Facades\Request as requet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DosenMateriController extends Controller
{
    // managemen materi

    public function index()
    {
        $data = Materi::all();
        return view('dosen/materi', ['dosen' => $data]);
    }

    public function show($id)
    {
        $data = Materi::find($id);
        $dosen = Dosen::all();
        return view('dosen/materi_edit', ['materi' => $data, 'dosen' => $dosen]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'topik' => 'required',
            'isi_materi' => 'required',
            'file' => 'required',
            'matkul' => 'required',
            'image' => 'required'
        ]);

        $data = Materi::find($id);
        $data->topik = $request->input('topik');
        $data->isi_materi = $request->input('isi_materi');
        if ($request->hasFile('file')) {
            $file = requet::file('file');
            $filename = $file->getClientOriginalName();
            $path = public_path() . '/uploads/';
            $data->video = $filename;
            $file->move($path, $filename);
        }
        if ($request->hasFile('file')) {
            $file2 = requet::file('image');
            $filename2 = $file2->getClientOriginalName();
            $path2 = public_path() . '/uploads/images/';
            $data->image = $filename2;
            $file2->move($path2, $filename2);
        }
        $data->matkul = $request->input('matkul');
        $data->save();
        return redirect('/dosen');
    }

    public function create(Request $request)
    {
        // $materi = Materi::all();
        // $dosen = Dosen::all();
        return view('dosen/materi_add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'topik' => 'required',
            'isi_materi' => 'required',
            'file' => 'required',
            'matkul' => 'required',
            'image' => 'required'
        ]);

        $data = new Materi();
        $data->topik = $request->input('topik');
        $data->isi_materi = $request->input('isi_materi');
        if ($request->hasFile('file')) {
            $file = requet::file('file');
            $filename = $file->getClientOriginalName();
            $path = public_path() . '/uploads/';
            $data->video = $filename;
            $file->move($path, $filename);
        }

        if ($request->hasFile('file')) {
            $file2 = requet::file('image');
            $filename2 = $file2->getClientOriginalName();
            $path2 = public_path() . '/uploads/images/';
            $data->image = $filename2;
            $file2->move($path2, $filename2);
        }
        $data->dosen_id = Session::get('id');
        $data->matkul = $request->input('matkul');
        $data->save();
        // return response()->json(['id' => $data->id]);
        $materi_id = (string)$data->id;
        return redirect('/dosen/create_soal/' . $materi_id);
    }

    public function detail_materi($id)
    {
        if (Session::get('id')) {
            $materi = Materi::find($id);
            $materi_id = (string)$materi->id;
            $ujian = KetUjian::where('materi_id', $materi_id)->first();
            return view('dosen/detail_materi', ['materi' => $materi, 'ujian' => $ujian]);
        } else {
            return redirect('dosen/auth');
        }
    }

    public function destroy($id){
        $ujian = KetUjian::where('materi_id', $id)->first();
        $nilai = Nilai::where('ket_ujian_id', $ujian->no_ujian);
        $nilai->delete();
        $jawaban = Jawaban::where('ket_ujian_id', $ujian->no_ujian);
        $jawaban->delete();
        $soal = Soal::where('ket_ujian_id', $ujian->no_ujian);
        $soal->delete();

        $ujian->delete();
        $data = Materi::find($id);
        $data->delete();
        return redirect('/dosen');
}
}
