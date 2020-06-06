<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table="nilai";

    public function jawaban(){
        return $this->belongsTo('App\Jawaban','jawaban_id', 'id');
    }

    public function soal(){
        return $this->belongsTo('App\Soal','soal_id', 'id');
    }

    public function mahasiswa(){
        return $this->belongsTo('App\Mahasiswa','mahasiswa_id','nim');
    }
}
