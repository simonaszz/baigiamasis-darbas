<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // public function AddToWishList(Request $request, $product_id)
    // {
    //     if (Auth::check()) {
    //         $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();

    //         if (!$exists) {
    //             Wishlist::insert([
    //                 'user_id' => Auth::id(),
    //                 'product_id' => $product_id,
    //                 'created_at' => Carbon::now(),
    //             ]);
    //             return response()->json(['success' => 'Successfully Added On Your Wishlist']);
    //         } else {
    //             return response()->json(['error' => 'This Product Has Already On Your Wishlist']);

    //         }
    //     } else {
    //         return response()->json(['error' => 'At First Login Your Account']);

    //     }
    // }



    // public function showProduct($productId)
    // {
    //     $product = Product::findOrFail($productId);
    //     return view('product.show', compact('product'));
    // }





    public function addToWishList(Request $request)
    {
        $user = Auth::user(); // Assuming you have authentication set up
        $productId = $request->input('product_id');

        $wishList = new WishList();
        $wishList->user_id = $user->id;
        $wishList->product_id = $productId;
        $wishList->save();

        return response()->json(['message' => 'Item added to wishlist successfully']);
    }

}