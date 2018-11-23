<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $productsAll = Product::get();
        return view('frontend.index')->with(compact('productsAll'));
    }
}
