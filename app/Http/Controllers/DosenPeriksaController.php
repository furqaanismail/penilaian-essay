<?php

namespace App\Http\Controllers;

use App\KetUjian;
use App\Materi;
use App\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DosenPeriksaController extends Controller
{
    public function index()
    {
        if(Session::get('nip')) {
            $ujian = KetUjian::all();
            return view('dosen/periksa', ['ujian' => $ujian]);
        }else{
            return redirect('dosen/auth');
        }
    }

    public function nilai($id)
    {
        if(Session::get('nip')) {
            $nilai = Nilai::where('ket_ujian_id', $id)->get();
            return view('dosen/nilai', ['nilai' => $nilai]);
        }else{
            return redirect('dosen/auth');
        }
    }

    public function destroy($id)
    {
        if(Session::get('nip')) {
            $data = Nilai::find($id);
            $data->delete();
            return redirect('/dosen/nilai');
        }else{
            return redirect('admin/auth');
        }
    }
}
