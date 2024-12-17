<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        // dd('here');
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function show($id)
    {
        $category = Category::find($id);

        // dd($category);
        return view('categories.show', compact('category'));
    }

    public function delete($id)
    {
        // dd($id);
        $category = Category::find($id);
        // dd($category);
        $category->delete();

        return redirect()->route('categories.index');
    }
}
