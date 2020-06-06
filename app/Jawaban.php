<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = "jawaban";

    public function mahasiswa(){
        return $this->belongsTo('App\Mahasiswa', 'mahasiswa_id','id');
    }

    public function nilai(){
        return $this->hasOne('App\Nilai', 'soal_id','id');
    }


}
