<?php

namespace JonatheloShopping\Http\Controllers;

use Illuminate\Http\Request;
use JonatheloShopping\Product;

class WelcomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(3);

        return view('welcome', compact('products'));
    }
}
