<?php

namespace easymarket;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model 
{
    protected $table='categoria';

    protected $primaryKey='idCat';

    public $timestamps=false;


    protected $fillable =[
    	'nombre',
    	
    ];

    protected $guarded =[

    ];
}
