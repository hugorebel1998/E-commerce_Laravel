<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

        $categoria = Category::all();
        return view('categories.index', compact('categoria'));
    }
    public function create()
    {

        return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {

        $categoria = new Category();

        $categoria->nombre = $request->nombre;
        $categoria->slug = $request->slug;
        $categoria->descripcion = $request->descripcion;

        $categoria->save();

        return redirect()->route('categoria.index');

        // var_dump(json_decode($categoria));
    }

    public function show($categori)
    {

        $categoria = Category::find($categori);
        return view('categories.show', compact('categoria'));
    }

    public function edit($categori)
    {

        $categoria = Category::find($categori);

        return view('categories.edit', compact('categoria'));
    }

    public function update(CategoryRequest $request, $categori){

        $categoria = Category::find($categori);

        $categoria->nombre = $request->nombre;
        $categoria->slug = $request->slug;
        $categoria->descripcion = $request->descripcion;

        $categoria->save();
        return redirect()->route('categoria.index');

    }

    public function delete($categori){

        $categoria = Category::findOrFail($categori);

        $categoria->delete();

        return redirect()->route('categoria.index');


    }


    
}
