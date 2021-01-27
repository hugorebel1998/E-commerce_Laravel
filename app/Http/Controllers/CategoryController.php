<?php

namespace App\Http\Controllers;

use App\Category;
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
}
