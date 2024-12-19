<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validate();

        if ($request->hasFile('image'))
        {
            $imageName = time(). '.' . $request->image->extension();

            $request->image->move(public_path('categoryImages'), $imageName);

            $data = array_merge($data, ['image' => $imageName]);
        }

        Category::create($data);

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request)
    {
        $category = Category::find($request->id);

        $category->update([
            'name' => $request->name
        ]);

        return redirect()->route('categories.index');
    }

    public function delete($id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect()->route('categories.index');
    }
}
