<?php
namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $coupons = Coupon::latest()->get();
        return view('backend.admin.coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('backend.admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request,[
            'code'=>'string|required',
            'type'=>'required|in:fixed,percent',
            'value'=>'required|numeric',
            'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();
        $status=Coupon::create($data);
        if($status){
            request()->session()->flash('success','Coupon Successfully added');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('admin.coupons.index');
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */

    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */

    public function edit(Coupon $coupon)
    {
        return view('backend.admin.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Coupon $coupon)
    {
        $this->validate($request,[
            'code'=>'string|required',
            'type'=>'required|in:fixed,percent',
            'value'=>'required|numeric',
            'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();
        $status=$coupon->update($data);
        if($status){
            request()->session()->flash('success','Coupon Successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('admin.coupons.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */

    public function destroy(Coupon $coupon)
    {
        if($coupon){
            $coupon->delete();
            request()->session()->flash('success','Coupon Successfully deleted');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('admin.coupons.index');
    }

    public function storeCoupon(Request $request)
    {
        $coupon = Coupon::where('code', $request->code)->first();
        if(!$coupon){
            request()->session()->flash('error','Invalid coupon code, Please try again');
            return redirect()->back();
        }
        if ($coupon) {
            $total_price = Cart::where('user_id', Auth::user()->id)->where('order_id', null)->sum('price');
             session()->put('coupon', [
                 'id'       => $coupon->id,
                 'code'     => $coupon->code,
                 'value'    => $coupon->discount($total_price)
             ]);
            request()->session()->flash('success','Coupon successfully applied');
            return redirect()->back();
        }
    }

}
