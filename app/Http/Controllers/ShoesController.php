<?php

namespace JonatheloShopping\Http\Controllers;

use Illuminate\Http\Request;
use JonatheloShopping\Category;
use JonatheloShopping\Product;

class ShoesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::paginate(3);
        $categories = Category::all();

        return view('layouts.shoes.shoes', compact('products', 'categories'));
    }
}
