<?php
namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $brands = Brand::latest('id')->get();
        return view('backend.admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function create()
    {
        return view('backend.admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'string|required'
        ]);

        $slug   = Str::slug($request->title);
        $count  = Brand::where('slug', $slug)->count();
        if($count>0){
            $slug = $slug . '-' . date('ymdis') . '-' . time() . '-'. rand(0, 999);
        }

        $status = Brand::create([
            'title'     => $request->title,
            'slug'      => $slug,
            'status'    => $request->status,
            ]);
        if($status) {
            request()->session()->flash('success', 'Brand has been created successfully......');
        }
        else {
            request()->session()->flash('error', 'Error!  Please try again......');
        }
        
        return redirect()->route('admin.brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */

    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */

    public function edit(Brand $brand)
    {
        return view('backend.admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, Brand $brand)
    {
        $this->validate($request, [
            'title' => 'string|required'
        ]);

        $slug   = Str::slug($request->title);
        $count  = Brand::where('slug', $slug)->count();
        if($count>1){
            $slug = $slug . '-' . date('ymdis') . '-' . time() . '-'. rand(0, 999);
        }
        $status = $brand->update([
            'title'     => $request->title,
            'slug'      => $slug,
            'status'    => $request->status,
            ]);
        if($status) {
            request()->session()->flash('success', 'Brand has been updated successfully......');
        }
        else {
            request()->session()->flash('error', 'Error!  Please try again......');
        }
        
        return redirect()->route('admin.brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */

    public function destroy(Brand $brand)
    {
        $status = $brand->delete();
        if($status) {
            request()->session()->flash('success', 'Brand has been deleted successfully......');
        }
        else {
            request()->session()->flash('error', 'Error!  Please try again......');
        }
        
        return redirect()->route('admin.brands.index');
    }


}
