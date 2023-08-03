<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('pages.shop', ['products' => $products]);
    }

    public function create()
    {
        return view('pages.add');
    }
}
