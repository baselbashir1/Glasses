<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $dossiers = Dossier::all();
        return view('pages.shop', ['dossiers' => $dossiers]);
    }
}
