<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\KetUjian;
use App\Materi;
use App\Matkul;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminDosenController extends Controller
{
    // managemen user dosen

    public function index()
    {
        if (Session::has('username')) {
            $data = Dosen::all();
            return view('admin/dosen', ['dosen' => $data]);
        } else {
            return redirect('admin/auth');
        }

    }

    public function show($id)
    {
        if (Session::get('username')) {
            $data = Dosen::find($id);
            return view('admin/edit_dosen', ['dosen' => $data]);
        } else {
            return redirect('admin/auth');
        }
    }

    public function update(Request $request, $id)
    {
        if(Session::get('username')) {
            $this->validate($request, [
                'nip' => 'required',
                'nama' => 'required'
            ]);

            $data = Dosen::find($id);
            $data->nip = $request->input('nip');
            $data->nama = $request->input('nama');
            $data->save();
            return redirect('/admin/dosen');
        }else{
            return redirect('admin/auth');
        }
    }

    public function destroy($id)
    {
        if (Session::get('username')) {
            $materi = Materi::where('dosen_id', $id)->delete();
            $ujian = KetUjian::where('dosen_id', $id)->delete();
            $data = Dosen::find($id);
            $data->delete();
            return redirect('/admin/dosen');
        }else{
            return redirect('admin/auth');
        }
    }

}
