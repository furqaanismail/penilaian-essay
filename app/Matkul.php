<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    protected $table = "matkul";

    public function ket_ujian(){
        return $this->hasOne('App\KetUjian', 'matkul_id','id');
    }
}
