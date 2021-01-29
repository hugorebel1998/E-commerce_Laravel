<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {

        $producto = Product::all();
        return view('productos.index', compact('producto'));
    }

    public function create()
    {
        $categorias = Category::select('nombre')->get();
        return view('productos.create', compact('categorias'));
    }

    public function store(ProductRequest $request)
    {
        $producto = new Product();
        $producto->nombre = $request->nombre;
        $producto->slug = $request->slug;
        $producto->cantidad = $request->cantidad;
        $producto->precio_actual = $request->precio_actual;
        $producto->precio_anterior = $request->precio_anterior;
        $producto->porcentaje_descuento = $request->porcentaje_descuento;
        $producto->descripcion_corta = $request->descripcion_corta;
        $producto->descripcion_larga = $request->descripcion_larga;
        $producto->especificaciones = $request->especificaciones;
        $producto->datos_de_interes = $request->datos_de_interes;
        $producto->status = $request->status;
        $producto->activo = $request->activo;
        $producto->sliderprincipal = $request->sliderprincipal;

        dd($producto);
        
    }
}
