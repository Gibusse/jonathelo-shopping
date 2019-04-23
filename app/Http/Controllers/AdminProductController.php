<?php

namespace JonatheloShopping\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use JonatheloShopping\Category;
use JonatheloShopping\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::paginate(3);

        return view('admin.product.products', compact('products'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.new', compact('categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'productName' => 'required',
            'productDescription' => 'required',
            'category_id' => 'required',
            'imageFile' => 'required',
            'productPrice' => 'required'
        ]);

        if (Auth::check())
        {
            $user_id = Auth::id();

            $product = new Product();
            $product->productName = $request->input('productName');
            $product->productDescription = $request->input('productDescription');
            $product->category_id = $request->input('category_id');
            $product->productPrice = $request->input('productPrice');
            $product->user_id = $user_id;

            if (Input::hasFile('imageFile'))
            {
                $file = Input::file('imageFile');
                $file->move(public_path(). '/articles/', $file->getClientOriginalName());
                $url = URL::to('/').'/articles/'.$file->getClientOriginalName();
            }

            $product->imageFile = $url;

            $product->save();

            return redirect('/products')->with('response', 'Product added successfully');
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $categories = Category::all();
        $product = Product::where('ProductId', $id)->first();
        return view('admin.product.show', compact('product', 'categories'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::where('productId', $id)->first();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * @param $id
     */
    public function destroy($id)
    {

    }
}
