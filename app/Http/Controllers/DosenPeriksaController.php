<?php

namespace App\Http\Controllers;

use App\KetUjian;
use App\Materi;
use App\Nilai;
use Illuminate\Http\Request;

class DosenPeriksaController extends Controller
{
    public function index()
    {
        $ujian = KetUjian::all();
        return view('dosen/periksa', ['ujian' => $ujian]);
    }

    public function nilai($id)
    {
        $nilai = Nilai::where('ket_ujian_id', $id)->get();
        return view('dosen/nilai', ['nilai' => $nilai]);
    }

    public function destroy($id)
    {
        $data = Nilai::find($id);

        $data->delete();

        return redirect('/dosen/nilai');
    }
}
