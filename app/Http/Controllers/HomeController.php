<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View {
        $products = Product::all();
        $seo = [
            'title' => "Home"
        ];

        $data = [
            'products' => $products,
            'seo' => $seo
        ];

        return view('home.index', $data);
    }
}
