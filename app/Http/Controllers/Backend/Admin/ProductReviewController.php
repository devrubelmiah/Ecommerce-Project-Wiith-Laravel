<?php
namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = ProductReview::latest('id')->get();
        return view('backend.admin.review.index', compact('reviews'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'rate'=>'required|numeric|min:1'
        ]);

        //  return $product_info;
        // return $request->all();

        $data['status']='active';

        // dd($data);

        $status=ProductReview::create([
            'user_id'       => $request->user_id,
            'product_id'    => $request->product_id,
            'rate'          => $request->rate,
            'review'        => $request->review,
            'status'        => 'active',
        ]);

        if($status){
            request()->session()->flash('success','Review is created successfully...');
        }
        else{
            request()->session()->flash('error','Something went wrong! Please try again!!');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function show(ProductReview $productReview)
    {
        $review = ProductReview::find($id);
        // $review = $productReview;
        return view('backend.admin.review.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $review = ProductReview::find($id);
        // $review = $productReview;
        return view('backend.admin.review.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {        

        //  return $product_info;
        // return $request->all();
        // dd($data);

        $review = ProductReview::find($id);
        $status = $review->update([
            'review'        => $request->review,
            'status'        => $request->status,
        ]);

        if($status){
            request()->session()->flash('success','Review is updated successfully...');
        }
        else{
            request()->session()->flash('error','Something went wrong! Please try again!!');
        }
        return redirect()->route('admin.reviews.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = ProductReview::find($id);
        if($review){
            $review->delete();
            request()->session()->flash('success','Review Successfully deleted');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('admin.reviews.index');


    }
}
