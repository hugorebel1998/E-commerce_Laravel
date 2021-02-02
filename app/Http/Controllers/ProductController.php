<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Image;
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
        $categorias = Category::all();
        return view('productos.create', compact('categorias'));
    }

    public function store(ProductRequest $request)

    {

        $urlimagenes = [];

        if ($request->hasFile('imagenes')) {
            //Capturamos los archivos que se estan enviardo
            $imagenes = $request->file(('imagenes'));

            // dd($imagenes);
            //Recorrer todas las imagenes
            foreach($imagenes as $imagen){
                //Obtener el nombre original de laimagen con getClientOriginalName
                $nombre = time().'_'. $imagen->getClientOriginalName();
                
                //Crear en donde se alojara la imagen con public_path
                $ruta = public_path().'/img';

                //Guardar la imagen move
                $imagen->move($ruta, $nombre);

                //Guardarlo en la BD
                $urlimagenes[] ['url'] = '/img/'.$nombre;

            }
            // return $urlimagenes;
        }
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
        $producto->visitas = $request->visitas;
        $producto->ventas = $request->ventas;
        $producto->status = $request->status;
        $producto->category_id = $request->category_id;
        if ($request->activo) {
            $producto->activo = "Si";
        } else {
            $producto->activo = "No";
        }
        if ($request->sliderprincipal) {
            $producto->sliderprincipal = "Si";
        } else {
            $producto->sliderprincipal = "No";
        }

        if ($producto->save()) {
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
            $producto->visitas = $request->visitas;
            $producto->ventas = $request->ventas;
            $producto->status = $request->status;
            $producto->images()->createMany($urlimagenes);
            // $producto->activo = $request->activo;
            // $producto->sliderprincipal = $request->sliderprincipal;
            $producto->category_id = $request->category_id;

            if ($producto->save()) {
                // toastr()->success($producto->nombre, 'Se registro nuevo producto');
                return redirect()->to(route('producto.index'));
            } else {
                toastr()->error('Error al registrar producto');
                return redirect()->back();
            }
        } else {
            toastr()->error('Error al registrar producto');
            return redirect()->to(route('producto.create'));
        }

    }
}
