<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Auth;

class WishListController extends Controller
{
    public function addToWishList(Request $request)
    {
        $user = Auth::user(); // Assuming you have authentication set up
        $productId = $request->input('product_id');

        $product = Product::findOrFail($productId);
        $user->wishlists()->attach($product);

        return response()->json(['message' => 'Item added to wishlist successfully']);
    }
}