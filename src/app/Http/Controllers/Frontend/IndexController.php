<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function ProductDetails($id, $slug)
    {
        $product = Product::findOrFail($id);
        return view('frontend.product.product_details', compact('product'));
    }
    public function showProduct($productId)
    {
        $product = Product::findOrFail($productId);
        return view('product.show', ['product' => $product]);
    }

}