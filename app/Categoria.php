<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
	protected $fillable = ['nombre', 'resumen', 'descripcion', 'slug'];

    public function subcategorias()
    {
        return $this->hasMany('App\Subcategoria');
    }

    public function getRouteKeyName()
	{
	    return 'slug';
	}

}
