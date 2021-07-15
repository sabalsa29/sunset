<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras_detalles extends Model
{
    use HasFactory;

    public function proveedor(){
        return $this->belongsTo('App\Models\Proveedores','proveedor_id','id');
    }

    public function producto(){
        return $this->belongsTo('App\Models\Productos','producto_id','id');
    }
}
