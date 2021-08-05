<?php
namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $postCategories = PostCategory::latest('id')->get();
        return view('backend.admin.post-category.index', compact('postCategories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('backend.admin.post-category.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'string|required'
        ]);
        $slug   = Str::slug($request->title);
        $count  = PostCategory::where('slug', $slug)->count();
        if($count>0){
            $slug = $slug . '-' . date('ymdis') . '-' . time() . '-'. rand(0, 999);
        }
        $status = PostCategory::create([
            'title'     => $request->title,
            'slug'      => $slug,
            'status'    => $request->status,
            ]);
        if($status) {
            request()->session()->flash('success', 'Post Category has been created successfully......');
        }
        else {
            request()->session()->flash('error', 'Error!  Please try again......');
        }
        return redirect()->route('admin.post-categories.index');
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PostCategory $postCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PostCategory $postCategory)
    {
        return view('backend.admin.post-category.edit', compact('postCategory'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostCategory $postCategory)
    {
        $this->validate($request, [
            'title' => 'string|required'
        ]);
        $slug   = Str::slug($request->title);
        $count  = PostCategory::where('slug', $slug)->count();
        if($count>1){
            $slug = $slug . '-' . date('ymdis') . '-' . time() . '-'. rand(0, 999);
        }
        $status = $postCategory->update([
            'title'     => $request->title,
            'slug'      => $slug,
            'status'    => $request->status,
            ]);
        if($status) {
            request()->session()->flash('success', 'Post Category has been updated successfully......');
        }
        else {
            request()->session()->flash('error', 'Error!  Please try again......');
        }
        return redirect()->route('admin.post-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCategory $postCategory)
    {
        if($postCategory->delete()) {
            request()->session()->flash('success', 'Category has been deleted successfully......');
        }
        else {
            request()->session()->flash('error', 'Error!  Please try again......');
        }
        return redirect()->route('admin.post-categories.index');
    }
}
