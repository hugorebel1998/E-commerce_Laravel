<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|max:50|unique:products,nombre',
            'slug' => 'required|unique:products,slug',
            'cantidad' => 'required|numeric',
            'precio_actual' => 'required|numeric|min:12',
            'precio_anterior' => 'required|numeric|min:12',
            'porcentaje_descuento' => 'required',
            'descripcion_corta' =>'required',
            'descripcion_larga' =>'required',
            'especificaciones' => 'required',
            'datos_de_interes' => 'required',
            'status' => 'required',
            'imagenes.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
