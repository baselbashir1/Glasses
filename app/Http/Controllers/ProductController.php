<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('pages.products.list', ['products' => $products]);
    }

    public function show(Product $product)
    {
        return view('pages.products.detail', ['product' => $product]);
    }

    public function create()
    {
        return view('pages.products.add');
    }

    public function store(ProductRequest $request)
    {
        $formFields = $request->validated();

        // if ($request->hasFile('picture')) {
        //     $formFields['picture'] = $request->file('picture')->store('pictures', 'public');
        // }

        Product::create([
            'brand' => $formFields['brand'],
            'product_type' => $formFields['type'],
            'image' => isset($formFields['image']) ? $formFields['image'] : null,
            'color' => $formFields['color'],
            'price' => $formFields['price']
        ]);

        return redirect('/products');
    }

    public function edit(Product $product)
    {
        return view('pages.products.edit', ['product' => $product]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $formFields = $request->validated();

        // if ($request->hasFile('picture')) {
        //     $formFields['picture'] = $request->file('picture')->store('pictures', 'public');
        // }

        $product->update([
            'brand' => $formFields['brand'],
            'product_type' => $formFields['type'],
            'image' => isset($formFields['image']) ? $formFields['image'] : null,
            'color' => $formFields['color'],
            'price' => $formFields['price']
        ]);

        return redirect('/products');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');
    }
}
