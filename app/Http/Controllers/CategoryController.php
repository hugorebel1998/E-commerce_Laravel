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


        if ($categoria->save()) {
            $categoria->nombre = $request->nombre;
            $categoria->slug = $request->slug;
            $categoria->descripcion = $request->descripcion;

            if ($categoria->save()) {
                toastr()->success('Se registro categoria:<b>' . $categoria->nombre . '</b>');
                return redirect()->to(route('categoria.index'));
            } else {
                toastr()->error('Error al registrar categoria');
                return redirect()->back();
            }
        } else {
            toastr()->error('Error al registrar categoria');
            return redirect()->to(route('categories.create'));
        }
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

    public function update(CategoryRequest $request, $categori)
    {

        $categoria = Category::find($categori);

        $categoria->nombre = $request->nombre;
        $categoria->slug = $request->slug;
        $categoria->descripcion = $request->descripcion;

        // $categoria->save();
        // return redirect()->route('categoria.index');
        if($categoria->save()){
            toastr()->info('Categoria  editada:<b>' . $categoria->nombre . '</b>');
            return redirect()->to(route('categoria.index'));
        } else {
            toastr()->error('Error al editar categoria');
            return redirect()->back();

        }
    }

    public function delete($categori)
    {

        $categoria = Category::findOrFail($categori);

        $categoria->delete();

        return redirect()->route('categoria.index');
    }
}
