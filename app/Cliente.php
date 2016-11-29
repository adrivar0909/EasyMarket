<?php

namespace easymarket;

use Illuminate\Database\Eloquent\Model;
 
class Cliente extends Model
{
    protected $table='cliente';
    protected $primaryKey='idCliente';
    public $timestamps=false;
    
    protected $filleble= [
        'nombre',
        'correo',
        'contrasena',
        'direccion',
        'telefono',
    ];
    protected $guarded=[
        
    ];
}
