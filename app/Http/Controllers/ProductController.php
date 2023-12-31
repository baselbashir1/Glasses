<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\LensesGrade;
use App\Models\ProductTranslation;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:products', ['only' => ['index']]);
        $this->middleware('permission:add product', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit product', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete product', ['only' => ['destroy']]);
    }

    public function index()
    {
        $products = Product::all();
        return view('pages.products.list', ['products' => $products]);
    }

    public function show(Product $product)
    {
        $lensesGrades = LensesGrade::all();
        return view('pages.products.detail', ['product' => $product, 'lensesGrades' => $lensesGrades]);
    }

    public function create()
    {
        $productTypes = ProductType::all();
        return view('pages.products.add', ['productTypes' => $productTypes]);
    }

    public function store(ProductRequest $request)
    {
        $formFields = $request->validated();

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $product = Product::create([
            'en' => [
                'brand' => $formFields['brand_en'],
                'color' => $formFields['color_en'],
            ],
            'ar' => [
                'brand' => $formFields['brand_ar'],
                'color' => $formFields['color_ar'],
            ],
            'product_type' => $formFields['type'],
            'image' => isset($formFields['image']) ? $formFields['image'] : null,
            'price' => $formFields['price']
        ]);

        if (isset($formFields['lenses_grade']) && isset($formFields['lenses_description'])) {
            LensesGrade::create([
                'product_id' => $product->id,
                'grade' => $formFields['lenses_grade'],
                'description' => $formFields['lenses_description']
            ]);
        }

        return redirect('/products');
    }

    public function edit(Product $product)
    {
        $productTypes = ProductType::all();
        $lensesGrades = LensesGrade::all();
        $lensesGrade = LensesGrade::where('product_id', $product->id)->first();
        return view('pages.products.edit', ['product' => $product, 'productTypes' => $productTypes, 'lensesGrades' => $lensesGrades, 'lensesGrade' => $lensesGrade]);
    }

    public function update(ProductRequest $request, Product $product, LensesGrade $lensesGrade)
    {
        $formFields = $request->validated();

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $product->update([
            'en' => [
                'brand' => $formFields['brand_en'],
                'color' => $formFields['color_en'],
            ],
            'ar' => [
                'brand' => $formFields['brand_ar'],
                'color' => $formFields['color_ar'],
            ],
            'product_type' => $formFields['type'],
            'image' => isset($formFields['image']) ? $formFields['image'] : $product->image,
            'price' => $formFields['price']
        ]);

        if (isset($formFields['lenses_grade']) && isset($formFields['lenses_description'])) {
            if (!empty($lensesGrade->grade) && !empty($lensesGrade->description)) {
                $lensesGrade->update([
                    'product_id' => $product->id,
                    'grade' => $formFields['lenses_grade'],
                    'description' => $formFields['lenses_description']
                ]);
            } else {
                LensesGrade::create([
                    'product_id' => $product->id,
                    'grade' => $formFields['lenses_grade'],
                    'description' => $formFields['lenses_description']
                ]);
            }
        }

        if ($product->id == $lensesGrade->product_id && $product->product_type != 3) {
            $lensesGrade->delete();
        }

        return redirect('/products');
    }

    public function destroy(Product $product)
    {
        $lensesGrade = LensesGrade::where('product_id', $product->id);
        $productTranslations = ProductTranslation::where('product_id', $product->id);
        $productTranslations->delete();
        $lensesGrade->delete();
        $product->delete();
        return redirect('/products');
    }
}
