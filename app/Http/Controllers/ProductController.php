<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;

    public function __construct(ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->middleware('auth');
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $products = $this->productRepository->index();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->index();

        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'status' => 'nullable',
            'category_id' => 'nullable',
        ]);

        $data['status'] = $request->has('status') ? true :false;

        if($request->hasFile('image'))
        {
            $imageName = time(). '.' . $request->image->extension();
            $request->image->move(public_path('productImages'), $imageName);

            $data = array_merge($data, ['image' => $imageName]);
        }

        $this->productRepository->store($data);

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $categories = $this->categoryRepository->index();

        $product = $this->productRepository->show($id);

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request)
    {
        $product = $this->productRepository->show($request->id);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status  == 'on' ? 1 : 0,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('products.index');

    }

    public function delete($id)
    {
        $product = $this->productRepository->show($request->id);

        $product->delete();

        return redirect()->route('products.index');
    }
}
