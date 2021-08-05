<?php
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Shipping;

    class Helper {
    public static function totalCartPrice($user_id = '')
    {
        if ( Auth::check() ) {
            if ($user_id == '') {
                $user_id = Auth::user()->id;                
            }
            return Cart::where('user_id', $user_id)->where('order_id', null)->sum('amount');
        } else {
            return 0;
        }
    }

    public static function shippings()
    {
        return Shipping::latest('id')->get();
    }

    public static function cartCount($user_id='')
    {
        if ( Auth::check() ) {
            if ($user_id == '') {
                $user_id = Auth::user()->id;                
            }
            return Cart::where('user_id', $user_id)->where('order_id', null)->sum('quantity');
        }else{
            return 0;
        }   
    }


    public static function getAllProductFromCart($user_id=''){
        if(Auth::check()){
            if($user_id == "") $user_id = auth()->user()->id;
            return Cart::latest('id')->where('user_id', $user_id)->get();
        }
        else{
            return 0;
        }
    }


    }
