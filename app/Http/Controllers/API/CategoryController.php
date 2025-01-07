<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();

        $data = CategoryResource::collection($categories);

        return $this->success($data, 'Category Retrieved Successfully', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required|image',
        ]);

        if($validator->fails()) {
            return $this->error('Validation Error', $validator->errors(), 422);
        }

        if($request->hasFile('image')) {
            $imageName = time(). $request->image->extension();

            $request->image->move(public_path('categoryImages'), $imageName);
        }

        $category = Category::create([
            'name' => $request->name,
            'image' => $imageName,
        ]);

        return $this->success($category, "Category Created Successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        if(!$category) {
            return $this->error('Category Not Found!', null, 404);
        }

        $data = new CategoryResource($category);

        return $this->success($data, "Category Show Successfully", 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if($validator->fails()) {
            return $this->error('Validation Error', $validator->errors(), 422);
        }

        $category = Category::find($id);

        if(!$category) {
            return $this->error('Cateogry Not Found', null, 404);
        }

        $category->update($request->all());

        return $this->success($category, "Category Updated Successfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return $this->error('Category Not Found', null, 404);
        }

        $category->delete();

        return $this->success($category, "Category Destory Successfully", 200);
    }
}
