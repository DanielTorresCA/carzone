<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table='modelos';
    protected $fillable=['nombre','marca_id'];

    public function marca(){

        return $this->belongsTo(Marca::class,'marca_id');
    }

    public function modelo(){
        return $this->hasMany(Auto::class,'modelo_id');
    }
}
