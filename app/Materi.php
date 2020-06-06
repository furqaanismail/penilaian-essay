<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = "materi";

    public function dosen(){
        return $this->belongsTo('App\Dosen', 'dosen_id','id');
    }
}
