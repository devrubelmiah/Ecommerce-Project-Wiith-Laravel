<?php
namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product_Image;
use Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $products = Product::latest('id')->get();
        return view('backend.admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $categories = Category::latest('id')->get();
        $brands     = Brand::latest('id')->get();
        return view('backend.admin.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'         => 'string|required',
            'summary'       => 'string|required',
            'description'   => 'string|nullable',
            'photo'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'size'          => 'nullable',
            'stock'         => "required|numeric",
            'cat_id'        => 'required|exists:categories,id',
            'brand_id'      => 'required|exists:brands,id',
            'child_cat_id'  => 'nullable|exists:categories,id',
            'is_featured'   => 'sometimes|in:1',
            'status'        => 'required|in:active,inactive',
            'condition'     => 'required|in:default,new,hot',
            'price'         => 'required|numeric',
            'discount'      => 'nullable|numeric'
        ]);

        

        $slug   = Str::slug($request->title);
        $count  = Category::where('slug', $slug)->count();       
        $public_path = public_path('images');
        // ==========Feature Images===========
         $image = $request->file('photo');
        if ( $request->hasfile('photo') && isset($image)) {
            $imageName = $slug . '-' . date('ymdis') . '-' . time() . '-'. rand(0, 999). '.' . $image->extension();
            $imageSize = Image::make($image->path());
            $imageSize->resize(1600, 600,  function ($constraint) {
                $constraint->aspectRatio();
            })->save($public_path.'/products/features/'. $imageName);
        } else {
            $imageName = 'default.jpg';
        }
         if($count>0){
            $slug = $slug . '-' . date('ymdis') . '-' . time() . '-'. rand(0, 999);
        }

        $status = Product::create([
            'title'     => $request->title,
            'slug'      => $slug,
            'summary'   => $request->summary,
            'description' => $request->description,
            'photo'     => $imageName,
            'stock'     => $request->stock,
            'size'      => isset($request->size) ? implode(',', $request->size) : null,
            'condition' => $request->condition,
            'status'    => $request->status,
            'price'     => $request->price,
            'discount'  => $request->discount,
            'is_featured'   => $request->filled('is_featured'),
            'cat_id'        => $request->cat_id,
            'child_cat_id'  => $request->child_cat_id,
            'brand_id'   => $request->brand_id,
            ]); 
           // return dd($request->all());

        if($request->hasfile('images'))
        {
           foreach($request->file('images') as $file)
           {
            $multi_img = strrev($slug) . '-' . date('ymdis') . '-' . time().'-'.rand(1111,3333).'.'.$file->extension();
            $multiSize = Image::make($file->path());
            $multiSize->resize(800, 400,  function ($constraint) {
                $constraint->aspectRatio();
            })->save($public_path.'/products/'. $multi_img);
            
            Product_Image::create([
                'product_id'    => $status->id,
                'image'         => $multi_img
                ]);
           }
    }

        if($status) {
            request()->session()->flash('success', 'Product has been created successfully......');
        }
        else {
            request()->session()->flash('error', 'Error!  Please try again......');
        }
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function edit(Product $product)
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('backend.admin.product.edit', compact('product', 'brands', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Product $product)
    {
        //return dd($request->all());

        $this->validate($request,[
            'title'         => 'string|required',
            'summary'       => 'string|required',
            'description'   => 'string|nullable',
            'photo'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'size'          => 'nullable',
            'stock'         => "required|numeric",
            'cat_id'        => 'required|exists:categories,id',
            'brand_id'      => 'required|exists:brands,id',
            'child_cat_id'  => 'nullable|exists:categories,id',
            'is_featured'   => 'sometimes|in:1',
            'status'        => 'required|in:active,inactive',
            'condition'     => 'required|in:default,new,hot',
            'price'         => 'required|numeric',
            'discount'      => 'nullable|numeric'
        ]);

        $slug   = Str::slug($request->title);
        $count  = Category::where('slug', $slug)->count();       
        $public_path = public_path('images');
        // ==========Feature Images===========
         $image = $request->file('photo');
        if ( $request->hasfile('photo') && isset($image)) {
            $imageName = $slug . '-' . date('ymdis') . '-' . time() . '-'. rand(0, 999). '.' . $image->extension();
            $imageSize = Image::make($image->path());
            $imageSize->resize(1600, 600,  function ($constraint) {
                $constraint->aspectRatio();
            })->save($public_path.'/products/features/'. $imageName);

            if(file_exists( $public_path . '/products/features/'. $product->photo)){
                unlink( $public_path . '/products/features/' . $product->photo);
            }

        } else {
            $imageName = $product->photo;
        }
         if($count>1){
            $slug = $slug . '-' . date('ymdis') . '-' . time() . '-'. rand(0, 999);
        }
        $status = $product->update([
            'title'     => $request->title,
            'slug'      => $slug,
            'summary'   => $request->summary,
            'description' => $request->description,
            'photo'     => $imageName,
            'stock'     => $request->stock,
            'size'      => isset($request->size) ? implode(',', $request->size) : null,
            'condition' => $request->condition,
            'status'    => $request->status,
            'price'     => $request->price,
            'discount'  => $request->discount,
            'is_featured'   => $request->filled('is_featured'),
            'cat_id'        => $request->cat_id,
            'child_cat_id'  => $request->child_cat_id,
            'brand_id'   => $request->brand_id,
            ]); 
           // return dd($request->all());

        if($request->hasfile('images'))
        {
            foreach($product->images as $image){
                if(file_exists( $public_path . '/products/'. $image->image)){
                    unlink( $public_path . '/products/' . $image->image);
                }
                $image->delete();
            }
           foreach($request->file('images') as $file)
           {
            $multi_img = strrev($slug) . '-' . date('ymdis') . '-' . time().'-'.rand(1111,3333).'.'.$file->extension();
            $multiSize = Image::make($file->path());
            $multiSize->resize(800, 400,  function ($constraint) {
                $constraint->aspectRatio();
            })->save($public_path.'/products/'. $multi_img);
            Product_Image::create([
                'product_id'    => $product->id,
                'image'         => $multi_img
                ]);            
           }
    }

        if($status) {
            request()->session()->flash('success', 'Product has been updated successfully......');
        }
        else {
            request()->session()->flash('error', 'Error!  Please try again......');
        }
        return redirect()->route('admin.products.index');
        
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function destroy(Product $product)
    {
        $public_path = public_path('images');
        foreach($product->images as $image){
            if(file_exists( $public_path . '/products/'. $image->image)){
                unlink( $public_path . '/products/' . $image->image);
            }
            $image->delete();
        }
        if(file_exists( $public_path . '/products/features/'. $product->photo)){
            unlink( $public_path . '/products/features/' . $product->photo  );
        }
        $status=$product->delete();
        if($status) {
            request()->session()->flash('success', 'Product has been deleted successfully......');
        }
        else {
            request()->session()->flash('error', 'Error!  Please try again......');
        }
        return redirect()->route('admin.products.index');
    }
    
}
