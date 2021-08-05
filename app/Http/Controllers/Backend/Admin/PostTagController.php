<?php
namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\PostTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostTagController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $postTags = PostTag::latest('id')->get();
        return view('backend.admin.post-tag.index', compact('postTags'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('backend.admin.post-tag.create');
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
        $count  = PostTag::where('slug', $slug)->count();
        if($count>0){
            $slug = $slug . '-' . date('ymdis') . '-' . time() . '-'. rand(0, 999);
        }

        $status = PostTag::create([
            'title'     => $request->title,
            'slug'      => $slug,
            'status'    => $request->status,
            ]);

        if($status) {
            request()->session()->flash('success', 'Tag has been created successfully......');
        }
        else {
            request()->session()->flash('error', 'Error!  Please try again......');
        }
        return redirect()->route('admin.post-tags.index');
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\PostTag  $postTag
     * @return \Illuminate\Http\Response
     */

    public function show(PostTag $postTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\PostTag  $postTag
     * @return \Illuminate\Http\Response
     */

    public function edit(PostTag $postTag)
    {
        return view('backend.admin.post-tag.edit', compact('postTag'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostTag  $postTag
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, PostTag $postTag)
    {

        $this->validate($request, [
            'title' => 'string|required'
        ]);

        $slug   = Str::slug($request->title);
        $count  = PostTag::where('slug', $slug)->count();
        if($count>1){
            $slug = $slug . '-' . date('ymdis') . '-' . time() . '-'. rand(0, 999);
        }

        $status = $postTag->update([
            'title'     => $request->title,
            'slug'      => $slug,
            'status'    => $request->status,
            ]);

            if($status) {
            request()->session()->flash('success', 'Post Tag has been updated successfully......');
        }
        else {
            request()->session()->flash('error', 'Error!  Please try again......');
        }
        return redirect()->route('admin.post-tags.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostTag  $postTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostTag $postTag)
    {
        if($postTag->delete()) {
            request()->session()->flash('success', 'Tag has been deleted successfully...
        ...');
        }
        else {
            request()->session()->flash('error', 'Error!  Please try again......');
        }
        return redirect()->route('admin.post-tags.index');
    }
}
