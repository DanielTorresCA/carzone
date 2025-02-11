<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;
    protected $fillable = ['id_usuario', 'direccion1', 'direccion2', 'ciudad', 'region', 'pais'];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
