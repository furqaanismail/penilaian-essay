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
        if (Session::get('username')) {
            $data = Mahasiswa::all();
            return view('admin/mahasiswa', ['mhs' => $data]);
        } else {
            return redirect('admin/auth');
        }
    }

    public function show($id)
    {
        if (Session::get('username')) {
            $data = Mahasiswa::find($id);
            return view('admin/edit_mahasiswa', ['mhs' => $data]);
        } else {
            return redirect('admin/auth');
        }
    }

    public function update(Request $request, $id)
    {
        if(Session::get('username')) {
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
        }else{
            return redirect('admin/auth');
        }
    }

    public function destroy($id)
    {
        if(Session::get('username')) {
            $jawaban = Jawaban::where('mahasiswa_id', $id)->delete();
            $nilai = Nilai::where('mahasiswa_id', $id)->delete();
            $data = Mahasiswa::find($id);
            $data->delete();
            return redirect('/admin/mahasiswa');
        }else{
            return redirect('admin/auth');
        }
    }

    public function profile()
    {
        if (Session::get('username')) {
            return view('admin/profile');
        }else{
            return redirect('admin/auth');
        }
    }
}
