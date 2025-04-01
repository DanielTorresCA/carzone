<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estado';

    protected $fillable = ['estado','descripcion'];

    public function autos(){
        return $this->hasMany(Auto::class, 'id_estado');
    }
}
