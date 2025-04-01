<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Auto extends Model
{
    use HasFactory;

    protected $table ='autos';

    protected $fillable=['marca_id','modelo_id','motor','aceleracion','combustible','transmision', 'precio', 'descripcion', 'id_estado'];

    public function estado(){
        return $this->belongsTo(Estado::class,'id_estado');
    }

    public function imagenes()
    {
        return $this->hasMany(ImgAuto::class, 'id_auto');
    }

    public function marca(){
        return $this->belongsTo(Marca::class,'marca_id');
    }

    public function modelo(){
        return $this->belongsTo(Modelo::class,'modelo_id');
    }
}
