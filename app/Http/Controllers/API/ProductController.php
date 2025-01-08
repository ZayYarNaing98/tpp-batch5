<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Controllers\API\BaseController;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();

        $data = ProductResource::collection($products);

        return $this->success($data, "Products Retrieved Successfully", 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());

        return $this->success($product, "Product Created Successully", 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('category')->where('id', $id)->first();

        if(!$product) {
            return $this->error("Product Not Found!", null, 404);
        }

        $data = new ProductResource($product);

        return $this->success($data, "Product Show Successfully", 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::where('id', $id)->first();

        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'status' => 'nullable',
            'category_id' => 'nullable',
            'status' => 'required'
        ]);

        $product->update($data);

        return $this->success($product, "Product Updated Successfully", 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::where('id', $id)->first();

        $product->delete();

        return $this->success($product, "Product Destory Successfully", 200);
    }

    public function imageUpdate(Request $request, $id)
    {
        $data = $request->validate([
            'image' => 'required|image',
        ]);

        $product = Product::where('id', $id)->first();

        if($request->hasFile('image'))
        {
            $imageName = time(). '.' . $request->image->extension();
            $request->image->move(public_path('productImages'), $imageName);

            $data = array_merge($data, ['image' => $imageName]);
        }

        $product->update([
            'image' => $imageName
        ]);

        return $this->success($product, "Image Update Successfully", 200);
    }


}

