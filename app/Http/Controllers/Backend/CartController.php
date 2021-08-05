<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function carts()
    {
        $carts = Cart::latest('id')->where("user_id", Auth::id() )->get();
        return view('frontend.carts', compact('carts'));
    }

    public function addToCart(Request $request, $slug)
    {
        $product        = Product::where('slug', $slug)->first();
        $alreay_cart    = Cart::where('user_id', Auth::user()->id)->where('product_id', $product->id)->first();
        if ($alreay_cart) {
            $alreay_cart->quantity  = $alreay_cart->quantity + 1;
            $alreay_cart->amount    = $alreay_cart->price + $alreay_cart->amount;
            $alreay_cart->save();
        }else {
            $cart = new Cart();
            $cart->user_id      = Auth::user()->id;
            $cart->product_id   = $product->id;
            $cart->price        = $product->price - ($product->price * ($product->discount/100));
            $cart->quantity     = 1;
            $cart->amount       = $cart->price*$cart->quantity;
            $cart->save();
        }
        request()->session()->flash('success','Product successfully added to cart......');
        return back();
    }

    public function singleAddToCart(Request $request)
    {
        $this->validate($request, [
            'slug'      => 'required',
            'quant'     => 'required',
        ]);
        $product        = Product::where('slug', $request->slug)->first();
        $alreay_cart    = Cart::where('user_id', Auth::user()->id)->where('product_id', $product->id)->first();
        if ($alreay_cart) {
            $alreay_cart->quantity  = $alreay_cart->quantity + $request->quant['1'];
            $alreay_cart->amount    = ($alreay_cart->price * $request->quant['1']) + $alreay_cart->amount;
            $alreay_cart->save();
        }else {
            $cart = new Cart();
            $cart->user_id      = Auth::user()->id;
            $cart->product_id   = $product->id;
            $cart->price        = $product->price - ($product->price * ($product->discount/100));
            $cart->quantity     = $request->quant['1'];
            $cart->amount       = ($cart->price*$request->quant['1']);
            $cart->save();
        }
        request()->session()->flash('success','Product successfully added to cart......');
        return redirect()->route('carts');
    }

    public function deleteCart(Request $request)
    {
        $cart = Cart::find($request->id);
        if ($cart) {
            $cart->delete();
            $request->session()->flash('success', 'Cart successfully removed.....');
        } else {
            request()->session()->flash('error','Error please try again');
        }
        return redirect()->back();
    }

    public function updateCart(Request $request)
    {
        if($request->quant){
            $error = array();
            $success = '';
            foreach ($request->quant as $key => $quant) {
                $id = $request->qty_id[$key];
                $cart = Cart::find($id);
                if ($cart) {
                    $cart->quantity = $quant;
                    $cart->amount   = $cart->price * $quant;
                    $cart->save();
                    $request->session()->flash('success', 'Cart successfully updated!');
                }else {
                    $request->session()->flash('error', 'Cart is found....');
                }
            }
        }
        return back();
    }


    public function checkout()
    {
        return view('frontend.checkout');
    }


}
