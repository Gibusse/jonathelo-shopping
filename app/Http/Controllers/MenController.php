<?php

namespace JonatheloShopping\Http\Controllers;

use Illuminate\Http\Request;

class MenController extends Controller
{
    public function index()
    {
        return view('layouts.shoes.men.men');
    }
}
