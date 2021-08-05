<?php
namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $categories = Category::latest('id')->get();
        return view('backend.admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $parent_cats = Category::latest()->where('is_parent', 1)->get();
        return view('backend.admin.category.create', compact('parent_cats'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'         => 'string|required',
            'summary'       => 'string|required',
            'photo'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_parent'     => 'sometimes|in:1',
            'parent_id'     =>'nullable|exists:categories,id',
            'status'        => 'required|in:active,inactive',
        ]);

        $slug   = Str::slug($request->title);
        $count  = Category::where('slug', $slug)->count();

        $public_path = public_path('images');
         $image = $request->file('photo');
        if ( $request->hasfile('photo') && isset($image)) {
            $imageName = $slug . '-' . date('ymdis') . '-' . time() . '-'. rand(0, 999). '.' . $image->extension();
            $imageSize = Image::make($image->path());
            $imageSize->resize(1600, 600,  function ($constraint) {
                $constraint->aspectRatio();
            })->save($public_path.'/categories/'. $imageName);
        } else {
            $imageName = 'default.jpg';
        }
         if($count>0){
            $slug = $slug . '-' . date('ymdis') . '-' . time() . '-'. rand(0, 999);
        }

        $status = Category::create([
            'title'     => $request->title,
            'slug'      => $slug,
            'summary'   => $request->summary,
            'photo'     => $imageName,
            'is_parent' => $request->filled('is_parent'),
            'parent_id' => $request->is_parent == 0 ? $request->parent_id : null,
            'added_by'  => Auth::id(),
            'status'    => $request->status,
            ]);

       /*  $data= $request->all();
        $count=Category::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']       = $slug;
        $data['photo']      = $imageName;
        $data['is_parent']  = $request->input('is_parent',0);
        // return $data;
        $status=Category::create($data); */

        if($status) {
            request()->session()->flash('success', 'Category has been created successfully......');
        }
        else {
            request()->session()->flash('error', 'Error!  Please try again......');
        }
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function edit(Category $category)
    {
        $parent_cats = Category::latest()->where('is_parent', 1)->get();
        return view('backend.admin.category.edit', compact('category', 'parent_cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'title'         => 'string|required',
            'summary'       => 'string|required',
            'photo'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_parent'     => 'sometimes|in:1',
            'parent_id'     =>'nullable|exists:categories,id',
            'status'        => 'required|in:active,inactive',
        ]);

        $slug   = Str::slug($request->title);
        $count  = Category::where('slug', $slug)->count();

        $public_path = public_path('images');
         $image = $request->file('photo');
        if ( $request->hasfile('photo') && isset($image)) {
            $imageName = $slug . '-' . date('ymdis') . '-' . time() . '-'. rand(0, 999). '.' . $image->extension();
            $imageSize = Image::make($image->path());
            $imageSize->resize(1600, 600,  function ($constraint) {
                $constraint->aspectRatio();
            })->save($public_path.'/categories/'. $imageName);
            if(file_exists( $public_path . '/categories/'. $category->photo)){
                unlink( $public_path . '/categories/' . $category->photo);
            }
        } else {
            $imageName = $category->photo;
        }

         if($count>0){
            $slug = $slug . '-' . date('ymdis') . '-' . time() . '-'. rand(0, 999);
        }

        $status = $category->update([
            'title'     => $request->title,
            'slug'      => $slug,
            'summary'   => $request->summary,
            'photo'     => $imageName,
            'is_parent' => $request->filled('is_parent'),
            'parent_id' => $request->is_parent == 0 ? $request->parent_id : null,
            'added_by'  => Auth::id(),
            'status'    => $request->status,
            ]);

       /*  $data= $request->all();
        $count=Category::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']       = $slug;
        $data['photo']      = $imageName;
        $data['is_parent']  = $request->input('is_parent',0);
        // return $data;
        $status=Category::create($data); */

        if($status) {
            request()->session()->flash('success', 'Category has been updated successfully......');
        }
        else {
            request()->session()->flash('error', 'Error!  Please try again......');
        }
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function destroy(Category $category)
    {
        $child_cat_id=Category::where('parent_id',$category->id)->pluck('id');
        // return $child_cat_id;
        $status=$category->delete();

        $public_path = public_path('images');
        if(file_exists( $public_path . '/categories/'. $category->photo)){
            unlink( $public_path . '/categories/' . $category->photo  );
        }
        if($status) {
            if(count($child_cat_id)>0){
                Category::shiftChild($child_cat_id);
            }
            request()->session()->flash('success', 'Category has been updated successfully......');
        }
        else {
            request()->session()->flash('error', 'Error!  Please try again......');
        }
        return redirect()->route('admin.categories.index');
    }

    public function getChildByParent(Request $request)
    {
        $category=Category::findOrFail($request->id);
        $child_cat=Category::getChildByParentID($request->id);
        // return $child_cat;
        if(count($child_cat)<=0){
            return response()->json(['status'=>false,'msg'=>'','data'=>null]);
        }
        else{
            return response()->json(['status'=>true,'msg'=>'','data'=>$child_cat]);
        }

    }

}
