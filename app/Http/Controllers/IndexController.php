<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

class IndexController extends Controller
{
    public function index()
    {
        // Get Assending
        $productsAll = Product::limit(6)->get();

        // Get Descending
        $productsAll = Product::orderBy('id', 'DESC')->limit(6)->get();

        // Get in Random Order
        $productsAll = Product::inRandomOrder('id', 'DESC')->limit(6)->get();

        // Get Categories and Sub-Categories
        $categories = Category::with('categories')->where(['parent_id' => 0])->get();
        $categories_menu = "";

        foreach ($categories as $cat) {
            $categories_menu .= "<div class='panel panel-default'>";
            $sub_categories = Category::where(['parent_id' => $cat->id])->get();
            if (count($sub_categories) == 0) {
                $categories_menu .= "<div class='panel-heading'>
                                        <h4 class='panel-title'>
                                            <a href='#'>" . $cat->name . "</a>
                                        </h4>
                                    </div>";
            } else {
                $categories_menu .= "<div class='panel-heading'>
                                        <h4 class='panel-title'>
                                            <a data-toggle='collapse' data-parent='#accordian' href='#" . $cat->id . "' class='collapsed'>
                                                <span class='badge pull-right'>
                                                    <i class='fa fa-plus'></i>
                                                </span>"
                . $cat->name .
                    "</a>
                                        </h4>
                                    </div>";
                $categories_menu .= "<div id='" . $cat->id . "' class='panel-collapse collapse' style='height: 0px;'>
                                        <div class='panel-body'>
                                            <ul>";
                foreach ($sub_categories as $sub) {
                    $categories_menu .= "<li>
                                            <a href='#'>" . $sub->name . "</a>
                                        </li>";
                }
                $categories_menu .= "</ul></div></div>";
            }
            $categories_menu .= "</div>";
        }
        // echo '<pre>';
        // print_r($categories_menu);
        // die();

        return view('frontend.index')->with(compact('productsAll','categories_menu'));
    }
}
