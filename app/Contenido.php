<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    protected $fillable = ['nombre', 'subcategoria_id','resumen', 'descripcion', 'slug'];

    public function subcategoria()
    {
        return $this->belongsTo('App\Subcategoria');
    }

    public function getRouteKeyName()
	{
	    return 'slug';
	}
}
