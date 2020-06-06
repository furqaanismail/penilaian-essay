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
        $data = Materi::all();
        return view('dosen/materi',['dosen'=>$data]);
    }

    public function show($id){
        $data = Materi::find($id);
        $dosen = Dosen::all();
        return view('dosen/materi_edit',['materi'=>$data, 'dosen' => $dosen]);
    }

    public function create(Request $request){
        $materi = Materi::all();
        $dosen = Dosen::all();
        return view('dosen/materi_add',['materi' => $materi, 'dosen' => $dosen]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'topik' => 'required',
            'isi_materi' => 'required',
            'file' => 'required',
            'matkul' => 'required'
        ]);

        $data = new Materi();
        $data->topik = $request->input('topik');
        $data->isi_materi = $request->input('isi_materi');
        if($request->hasFile('file')){
            $file = requet::file('file');
            $filename = $file->getClientOriginalName();
            $path = public_path().'/uploads/';
            $data->video = $filename;
            $file->move($path, $filename);
        }
        $data->dosen_id = Session::get('id');
        $data->matkul = $request->input('matkul');
        $data->save();
        return redirect('/dosen/materi');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'topik' => 'required',
            'isi_materi' => 'required',
            'file' => 'required'
        ]);

        $data = Materi::find($id);
        $data->topik = $request->input('topik');
        $data->isi_materi = $request->input('isi_materi');
        if($request->hasFile('file')){
            $file = requet::file('file');
            $filename = $file->getClientOriginalName();
            $path = public_path().'/uploads/';
            $data->video = $filename;
            $file->move($path, $filename);
        }
        $data->matkul = $request->input('matkul');
        $data->save();
        return redirect('/dosen/materi');
    }

    public function destroy($id){
        $data = Materi::find($id);
        $data->delete();
        return redirect('/dosen/materi');
    }
}
