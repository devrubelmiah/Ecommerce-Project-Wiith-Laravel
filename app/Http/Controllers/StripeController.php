<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\Order;

class StripeController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }

    public function stripePost(Request $request)
    {
        $order = Order::findOrfail($request->session()->get('id'));
        if ($order) {
        //return $order->email;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->price*100,
                "currency" => "INR",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose of ",
        ]);
    }

    $satus = $order->update([
            'payment_status' => 'paid'
        ]);
    if ($satus) {
        // Forget multiple keys...
        $request->session()->forget(['id', 'total_amount']);
        Session::flash('success', 'Order is Successful compleated with payment !');
        return redirect()->to('/');
    }else{
        Session::flash('success', 'payment not is compleated!');

        return redirect()->to('/stripe');
    }

    
    }
}
