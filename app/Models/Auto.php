<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Auto extends Model
{
    use HasFactory;

    protected $table ='autos';

    protected $fillable=['motor','aceleracion','combustible','transmision', 'precio', 'descripcion', 'id_estado'];

    public function estado(){
        return $this->belongsTo(Estado::class,'id_estado');
    }

    public function imagenes()
    {
        return $this->hasMany(ImgAuto::class, 'id_auto');
    }
}
