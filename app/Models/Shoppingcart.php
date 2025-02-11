<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoppingcart extends Model
{
    protected $table='shoppingcart';
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
