<?php

namespace JonatheloShopping\Http\Controllers;

use Illuminate\Http\Request;

class ChildrenController extends Controller
{
    public function index()
    {
        return view('layouts.shoes.children.children');
    }
}
