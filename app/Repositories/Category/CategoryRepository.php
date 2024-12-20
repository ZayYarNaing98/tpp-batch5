<?php

namespace App\Repositories\Category;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function index()
    {
        $categories = Category::all();

        return $categories;
    }

    public function store($data)
    {
        return Category::create($data);
    }

    public function show($id)
    {
        return Category::find($id);
    }
}
