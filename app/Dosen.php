<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = "dosen";

    public function materi(){
        return $this->hasMany('App\Materi', 'dosen_id','id');
    }

    public function ket_ujian(){
        return $this->hasMany('App\Soal', 'dosen_id','id');
    }
}
