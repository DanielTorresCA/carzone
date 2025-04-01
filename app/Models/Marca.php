<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table='marcas';
    protected $fillable=['nombre'];

    public function modelos(){

        return $this->hasMany(Modelo::class,'marca_id');
    }

    public function auto(){
        return $this->hasMany(Auto::class,'marca_id');
    }
}
