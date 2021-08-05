<?php
namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $shippings = Shipping::latest('id')->get();
        return view('backend.admin.shipping.index', compact('shippings'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('backend.admin.shipping.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request,[
            'type'=>'string|required',
            'price'=>'nullable|numeric',
            'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();
        // return $data;
        $status=Shipping::create($data);
        if($status){
            request()->session()->flash('success','Shipping successfully created');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('admin.shippings.index');
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */

    public function show(Shipping $shipping)
    {
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */

    public function edit(Shipping $shipping)
    {
        return view('backend.admin.shipping.edit', compact('shipping'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Shipping $shipping)
    {
        $this->validate($request,[
            'type'=>'string|required',
            'price'=>'nullable|numeric',
            'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();
        // return $data;
        $status=$shipping->update($data);
        if($status){
            request()->session()->flash('success','Shipping successfully updated');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('admin.shippings.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */

    public function destroy(Shipping $shipping)
    {
        if($shipping){
            $shipping->delete();
            request()->session()->flash('success','shipping Successfully deleted');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('admin.shippings.index');
    }

}
