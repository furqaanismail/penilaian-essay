<?php

namespace App\Http\Controllers;

use App\Jawaban;
use App\Mahasiswa;

use App\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminMahasiswaController extends Controller
{
    // managemen user mahasiswa
    public function index()
    {
            $data = Mahasiswa::all();
            return view('admin/mahasiswa', ['mhs' => $data]);
    }

    public function show($id)
    {
            $data = Mahasiswa::find($id);
            return view('admin/edit_mahasiswa', ['mhs' => $data]);
    }

    public function update(Request $request, $id)
    {
            $this->validate($request, [
                'nim' => 'required',
                'nama' => 'required'
            ]);

            $data = Mahasiswa::find($id);
            $data->nim = $request->input('nim');
            $data->nama = $request->input('nama');
            $data->jk = $request->input('jk');
            $data->save();
            return redirect('/admin/mahasiswa');
    }

    public function destroy($id)
    {
            $jawaban = Jawaban::where('mahasiswa_id', $id)->delete();
            $nilai = Nilai::where('mahasiswa_id', $id)->delete();
            $data = Mahasiswa::find($id);
            $data->delete();
            return redirect('/admin/mahasiswa');
    }

    public function profile()
    {
            return view('admin/profile');
    }
}
