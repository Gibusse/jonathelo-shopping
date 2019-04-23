<?php

namespace JonatheloShopping\Http\Controllers;

use Illuminate\Http\Request;

class WomenController extends Controller
{
    public function index()
    {
        return view('layouts.shoes.women.women');
    }
}
