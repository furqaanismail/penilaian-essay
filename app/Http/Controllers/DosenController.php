<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Dosen;
use App\KetUjian;
use App\Mahasiswa;
use App\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DosenController extends Controller
{
    public function index(){
        $ujian = KetUjian::all();
        $materi = Materi::all();
        return view('dosen/main',['ujian' => $ujian, 'materi' => $materi]);
    }

    public function auth(){
        return view('dosen/login');
    }

    public function proses_login(Request $request)
    {
        $nip = $request->nip;
        $password = $request->password;

        $data = Dosen::where('nip', $nip)->first();
        if ($data) {
            if (Hash::check($password, $data->password)) {
                Session::put('id', $data->id);
                Session::put('nip', $data->nip);
                Session::put('nama', $data->nama);
                Session::put('login', TRUE);
                return redirect('/dosen');
            } else {
                return redirect('/dosen/auth');
            }
        } else {
            return redirect('/dosen/auth');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/dosen/auth');
    }

    public function register(){
        return view('dosen/register');
    }

    public function proses_register(Request $request){
        $this->validate($request, [
            'nip' => 'required|unique:dosen',
            'nama' => 'required',
            'password' => 'required',
            'password2' => 'required|same:password'
        ]);

        $data = new Dosen();
        $data->nip = $request->nip;
        $data->nama = $request->nama;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect('/dosen/auth');
    }

    public function profile(){
        return view('dosen/profile');
    }

}
