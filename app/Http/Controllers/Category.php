<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Category extends Controller
{
    public function index(){
        //
    }
    public function create(){

        return view('categories.create');
    }
}
