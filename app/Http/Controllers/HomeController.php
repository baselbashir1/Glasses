<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Dossier;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $dossiers = Dossier::all();
        return view('pages.shop', ['dossiers' => $dossiers]);
    }

    public function getAgentCategory($id)
    {
        $agent = Agent::findOrFail($id);
        return (string) $agent->agentCategory->category;
    }

    public function getProductType($id)
    {
        $product = Product::findOrFail($id);
        return (string) $product->productType->type;
    }

    public function getProductPrice($id)
    {
        $product = Product::findOrFail($id);
        return (string) $product->price;
    }
}
