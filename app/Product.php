<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'slug', 'cantidad', 'precio_actual', 'precio_anterior',
        'porcentaje_descuento', 'descripcion_corta', 'descripcion_larga',
        'especificaciones', 'datos_de_interes', 'visitas', 'ventas', 'status',
        'activo', 'sliderprincipal'   
    ];

    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }
}
