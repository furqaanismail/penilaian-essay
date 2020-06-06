<?php

namespace App\Http\Controllers;
use App\Dosen;
use App\Matkul;

use Illuminate\Http\Request;

class AdminDosenController extends Controller
{
    // managemen user dosen

    public function index()
    {
        $data = Dosen::all();
        return view('admin/dosen',['dosen'=>$data]);
    }

    public function show($id){
        $data = Dosen::find($id);
        return view('admin/edit_dosen',['dosen'=>$data]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nip' => 'required',
            'nama' => 'required'
        ]);

        $data = Dosen::find($id);
        $data->nip = $request->input('nip');
        $data->nama = $request->input('nama');
        $data->save();
        return redirect('/admin/dosen');
    }

    public function destroy($id){
        $data = Dosen::find($id);
        $data->delete();
        return redirect('/admin/dosen');
    }

}
