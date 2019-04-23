<?php

namespace JonatheloShopping\Http\Controllers;

use Illuminate\Http\Request;
use JonatheloShopping\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(3);

        return view('home', compact('products'));
    }
}
