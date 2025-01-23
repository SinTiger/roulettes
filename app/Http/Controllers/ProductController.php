<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $items = Product::all();
        $link = 'product';
        return view('product.index', compact('link', 'items'));
    }

    public function create()
    {
        $link = 'product';
        return view('product.create', compact('link'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        $newItem = Product::firstOrCreate($data);
        return redirect()->route('product.index');
    }

    public function show(Product $product)
    {
        $link = 'product';
        return view('product.show', compact('link', 'product'));
    }

    public function edit(Product $product)
    {
        $link = 'product';
        return view('product.edit', compact('link', 'product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $product->update($data);
        return redirect()->route('product.show', $product->id);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
