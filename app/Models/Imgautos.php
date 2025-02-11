<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imgautos extends Model
{
    protected $table ='imgautos';

    protected $fillable =['id_auto','urlAuto'];

    public function auto(){
        return $this->belongsTo(Auto::class,'id_auto');
    }
}
