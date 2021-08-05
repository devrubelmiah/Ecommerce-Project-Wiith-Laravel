<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addToWislist(Request $request, $slug)
    {
        $product         = Product::where('slug', $slug)->first();
        $alreay_wishlist = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $product->id)->first();
        if ( $alreay_wishlist ) {
            $request->session()->flash('error', 'You already added in wishlist.....');
            return back();
        } else {
            $wishlist = new Wishlist();
            $wishlist->user_id      = Auth::user()->id;
            $wishlist->product_id   = $product->id;
            $wishlist->price        = $product->price - ($product->price * ($product->discount/100));
            $wishlist->quantity     = 1;
            $wishlist->amount       = $wishlist->price * $wishlist->quantity;
            $wishlist->save();
            $request->session()->flash('success', 'Product has been successfully added to wishlist....');
        }
        return back();

    }
}
