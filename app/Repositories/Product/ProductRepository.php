<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function index()
    {
        $products = Product::with('category')->get();

        return $products;
    }

    public function store($data)
    {
        return Product::create($data);
    }

    public function show($id)
    {
        return Product::with('category')->where('id', $id)->first();
    }
}
