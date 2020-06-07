<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as requet;
use Illuminate\Support\Facades\Session;

class AdminMateriController extends Controller
{
    // managemen materi

    public function index()
    {
        if(Session::get('username')) {
            $data = Materi::all();
            return view('admin/materi', ['dosen' => $data]);
        }else{
            return redirect('admin/auth');
        }
    }

    public function show($id){
        if(Session::get('username')) {
            $data = Materi::find($id);
            $dosen = Dosen::all();
            return view('admin/edit_materi', ['materi' => $data, 'dosen' => $dosen]);
        }else{
            return redirect('admin/auth');
        }
    }

    public function update(Request $request, $id)
    {
        if(Session::get('username')) {
            $this->validate($request, [
                'topik' => 'required',
                'isi_materi' => 'required',
                'matkul' => 'required'
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
            $data->matkul = $request->input('matkul');
            $data->save();
            return redirect('/admin/materi');
        }else{
            return redirect('admin/auth');
        }
    }

    public function destroy($id){
        if(Session::get('username')) {
            $data = Materi::find($id);
            $data->delete();
            return redirect('/admin/materi');
        }else{
            return redirect('admin/auth');
        }
    }
}
