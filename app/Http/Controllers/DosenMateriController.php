<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\Materi;
use Illuminate\Support\Facades\Request as requet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DosenMateriController extends Controller
{
    // managemen materi

    public function index()
    {
        if(Session::get('nip')) {
            $data = Materi::all();
            return view('dosen/materi', ['dosen' => $data]);
        }else{
            return redirect('dosen/auth');
        }
    }

    public function show($id){
        if(Session::get('nip')) {
            $data = Materi::find($id);
            $dosen = Dosen::all();
            return view('dosen/materi_edit', ['materi' => $data, 'dosen' => $dosen]);
        }else{
            return redirect('dosen/auth');
        }
    }

    public function create(Request $request){
        if(Session::get('nip')) {
            $materi = Materi::all();
            $dosen = Dosen::all();
            return view('dosen/materi_add', ['materi' => $materi, 'dosen' => $dosen]);
        }else{
            return redirect('dosen/auth');
        }
    }

    public function store(Request $request){
        if(Session::get('nip')) {
            $this->validate($request, [
                'topik' => 'required',
                'isi_materi' => 'required',
                'file' => 'required',
                'matkul' => 'required'
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
            $data->dosen_id = Session::get('id');
            $data->matkul = $request->input('matkul');
            $data->save();
            return redirect('/dosen/materi');
        }else{
            return redirect('dosen/auth');
        }
    }

}
