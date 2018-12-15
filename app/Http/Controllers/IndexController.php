<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $productsAll = Product::get();

        $productsAll = Product::orderBy('id','DESC')->get();

        $productsAll = Product::inRandomOrder('id','DESC')->get();
        return view('frontend.index')->with(compact('productsAll'));
    }
}
