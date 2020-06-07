<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Dosen;
use App\Mahasiswa;
use App\Matkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function index()
    {
        if(Session::has('username')){
            $mhs = Mahasiswa::all();
            $dosen = Dosen::all();
            return view('admin/main', ['mhs' => $mhs, 'dosen' => $dosen]);
        }else{
            return redirect('admin/auth');
        }

    }

    public function auth()
    {
        return view('admin/login');
    }

    public function proses_login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $data = Admin::where('username', $username)->first();
        if ($data) {
            if (Hash::check($password, $data->password)) {
                Session::put('username', $data->username);
                Session::put('nama', $data->nama);
                Session::put('login', TRUE);
                return redirect('/admin');
            } else {
                return redirect('/admin/auth');
            }
        } else {
            return redirect('/admin/auth');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/admin/auth');
    }

    public function register()
    {
        return view('admin/register');
    }

    public function profile(){
        if(Session::has('username')) {
            return view('admin/profile');
        }else{
            return redirect('admin/auth');
        }
    }

}
