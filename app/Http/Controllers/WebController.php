<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WebController extends Controller
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

    public function detail($id): View
    {
        if (empty($id))
            abort(404);

        $product = Product::where('id', $id)->first();

        $seo = [
            'title' => $product->name,
        ];

        $data = [
            'seo' => $seo,
            'product' => $product
        ];

        return view('detail.index', $data);
    }
}
