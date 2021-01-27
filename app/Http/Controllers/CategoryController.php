<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        
        $categoria = Category::all();
        return view('categories.index', compact('categoria'));
    }
    public function create(){

        return view('categories.create');
    }

    public function show($id){

        $categoria = Category::find($id);
        return view('categories.show', compact('categoria'));
    }

    public function store(CategoryRequest $request){

        $categoria = new Category();

        $categoria->nombre = $request->nombre;
        $categoria->slug = $request->slug;
        $categoria->descripcion = $request->descripcion;

        $categoria->save();

        return redirect()->route('categoria.index');

        // var_dump(json_decode($categoria));
    }
}
