<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Helper;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $orders = Order::latest('id')->paginate('10');
        return view('backend.admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name'=>'string|required',
            'last_name'=>'string|required',
            'address1'=>'string|required',
            'address2'=>'string|nullable',
            'coupon'=>'nullable|numeric',
            'phone'=>'numeric|required',
            'post_code'=>'string|nullable',
            'email'=>'string|required'
        ]);
        // return dd($request->all());
        if(empty(Cart::where('user_id',auth()->user()->id)->where('order_id',null)->first())){
            request()->session()->flash('error','Cart is Empty!');
            return back();
        }
        $order      = new Order();
        $order_data =  $request->all();
        $order_data['order_number'] = "ORD-" . strtoupper(Str::random(10));
        $order_data['user_id']      = Auth::user()->id;
        $order_data['shipping_id']  = $request->shipping;
        $shipping                  = Shipping::where('id', $order_data['shipping_id'])->pluck('price');
        $order_data['sub_total']    = Helper::totalCartPrice();
        $order_data['quantity']     = Helper::cartCount();
        if (session('coupon')) {
            $order_data['coupon']   = session('coupon')['value'];
        }
        
        if ($request->shipping) {
            if ( session('coupon') ) {
                $order_data['total_amount']  = Helper::totalCartPrice() + $shipping[0] + session('coupon')['value'];
            } else {
                $order_data['total_amount']  = Helper::totalCartPrice() + $shipping[0];
            }
        }else {
            if ( session('coupon') ) {
                $order_data['total_amount']  = Helper::totalCartPrice() + session('coupon')['value'];
            } else {
                $order_data['total_amount']  = Helper::totalCartPrice();
            }            
        }
        $order_data['status']  = 'new';
        if ( $request->payment_method == 'stripe' ) {
            $order_data['payment_method']  = 'stripe';
            $order_data['payment_status']  = 'unpaid';
        }
        else {
            $order_data['payment_method']  = 'cod';
            $order_data['payment_status']  = 'unpaid';
        }
        $order->fill($order_data);
        $status = $order->save();
        if ( $request->payment_method == 'stripe' ) {
            $total_amount = $order_data['total_amount'];
            $order_id = $order['id'];
            session(['id' => $order_id, 'total_amount' => $total_amount]);
             return redirect()->to('/stripe');
        } 

        if ( $status ) {
        // dd($users);
        request()->session()->flash('success','Your product successfully placed in order');
        return redirect()->route('index');
        }  
        return redirect()->back();      
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */

    public function show(Order $order)
    {
        return view('backend.admin.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */

    public function edit(Order $order)
    {
        return view('backend.admin.order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Order $order)
    {
        $this->validate($request, [
            'status'=>'required'
        ]);

        if($request->status=='delivered'){
            foreach($order->carts as $cart){
                $product->stock -=$cart->quantity;
                $product->save();
            }
        }

        $status = $order->update([
            'status' => $request->status
        ]);
        if($status){
            request()->session()->flash('success','Successfully updated order');
        }
        else{
            request()->session()->flash('error','Error while updating order');
        }
        return redirect()->route('admin.orders.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */

    public function destroy(Order $order)
    {
        if($order){
            $order->delete();
            request()->session()->flash('success','Order Successfully deleted');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('admin.orders.index');
    }

}
