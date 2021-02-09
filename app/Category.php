<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'categories';

    protected $fillable = [
        'nombre', 'slug', 'descripcion',
    ];

    public function product(){
        return $this->hasMany('App\Product');
    }
    
}
