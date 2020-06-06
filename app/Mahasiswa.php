<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = "mahasiswa";

    public function jawaban(){
        return $this->hasMany('App\Jawaban','mahasiswa_id', 'id');
    }

    public function nilai(){
        return $this->hasMany('App\Nilai', 'mahasiswa_id','nim');
    }
}
