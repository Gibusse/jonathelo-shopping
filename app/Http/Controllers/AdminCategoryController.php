<?php

namespace JonatheloShopping\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use JonatheloShopping\Category;
use Illuminate\Http\Request;
use JonatheloShopping\User;

class AdminCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $categories = Category::paginate(5);

        return view('admin.category.categories', compact('categories'));
    }


    public function create()
    {
        return view('admin.category.new');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'categoryName' => 'bail|required|max:50',
            'categoryDescription' => 'required|max:255'
        ]);

        $one = User::find(1)->getAll()->where('categoryName', $request->input('categoryName'))->first();

        if (($one) != null)
        {
            return redirect('/categories')->with('error', 'Category already exists');
        }
        else {
            if (Auth::check())
            {
                $user_id = Auth::id();

                $category = new Category();
                $category->categoryName = $request->input('categoryName');
                $category->categoryDescription = $request->input('categoryDescription');
                $category->user_id = $user_id;
                $category->save();

                return redirect('/categories')->with('response', 'Category added successfully');
            }
        }

    }

    /**
     *  Edit category
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category = Category::where('categoryId', $id)->first();
        return view('admin.category.edit', compact('category'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'categoryName' => 'bail|required|max:50',
            'categoryDescription' => 'required|max:255'
        ]);

        if (Auth::check())
        {
            $data = array(
                'categoryName' => $request['categoryName'],
                'categoryDescription' => $request['categoryDescription']
            );

            Category::where('categoryId', $id)
                    ->update($data);

            return redirect('/categories')->with('response', 'Category updated successfully');
        }
    }

    /**
     *  Destroy category
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if (Auth::check())
        {

            Category::where('categoryId', $id)
                ->delete();

            return redirect('/categories')->with('response', 'Category deleted successfully');
        }

    }
}
