<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = "soal";


    public function ket_ujian(){
        return $this->belongsTo('App\KetUjian', 'ket_ujian_id', 'no_ujian');
    }

    public function nilai(){
        return $this->hasOne('App\Nilai', 'soal_id','id');
    }
}
