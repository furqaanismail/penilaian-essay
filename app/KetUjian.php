<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KetUjian extends Model
{
    protected $table = 'ket_ujian';

    protected $primaryKey = 'no_ujian';

    protected $keyType = 'string';

    public function ket_ujian(){
        return $this->hasMany('App\Soal','ket_ujian_id', 'no_ujian');
    }

    public function dosen(){
        return $this->belongsTo('App\Dosen', 'dosen_id','id');
    }
}
