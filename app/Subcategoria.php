<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
        protected $fillable = ['nombre', 'categoria_id','resumen', 'descripcion', 'slug'];
        public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

        public function contenidos()
    {
        return $this->hasMany('App\Contenido');
    }

    public function getRouteKeyName()
	{
	    return 'slug';
	}
}
