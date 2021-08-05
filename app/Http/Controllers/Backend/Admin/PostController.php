<?php
namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTag;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $posts      = Post::latest('id')->get();
        return view('backend.admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $categories = PostCategory::latest('id')->get();
        $tags       = PostTag::latest('id')->get();
        return view('backend.admin.post.create', compact('categories', 'tags'));
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
            'quote'         => 'string|required',
            'summary'       => 'string|required',
            'description'   => 'string|required',
            'post_cat_id'   => 'required',
            'post_tag_id'   => 'required',
            'photo'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'        => 'required|in:active,inactive',
        ]);

        $slug   = Str::slug($request->title);
        $count  = Post::where('slug', $slug)->count();

        $public_path = public_path('images');
        $image = $request->file('photo');
        if ( $request->hasfile('photo') && isset($image)) {
            $imageName = $slug . '-' . date('ymdis') . '-' . time() . '-'. rand(0, 999). '.' . $image->extension();
            $imageSize = Image::make($image->path());
            $imageSize->resize(1600, 600,  function ($constraint) {
                $constraint->aspectRatio();
            })->save($public_path.'/blogs/'. $imageName);
        } else {
            $imageName = 'default.jpg';
        }
         if($count>0){
            $slug = $slug . '-' . date('ymdis') . '-' . time() . '-'. rand(0, 999);
        }

        $blog = new Post();

            $blog->title        = $request->title;
            $blog->slug         = $slug;
            $blog->summary      = $request->summary;
            $blog->description  = $request->description;
            $blog->quote        = $request->quote;
            $blog->photo        = $imageName;
            $blog->added_by     = Auth::id();
            $blog->status       = $request->status;
            $blog->save();

            $blog->categories()->attach($request->post_cat_id);
            $blog->tags()->attach($request->post_tag_id);

        if($blog) {
            request()->session()->flash('success', 'Post has been created successfully......');
        }
        else {
            request()->session()->flash('error', 'Error!  Please try again......');
        }
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function edit(Post $post)
    {
        $categories = PostCategory::latest('id')->get();
        $tags       = PostTag::latest('id')->get();
        return view('backend.admin.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title'         => 'string|required',
            'quote'         => 'string|required',
            'summary'       => 'string|required',
            'description'   => 'string|required',
            'post_cat_id'   => 'required',
            'post_tag_id'   => 'required',
            'photo'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'        => 'required|in:active,inactive',
        ]);

        $slug   = Str::slug($request->title);
        $count  = Post::where('slug', $slug)->count();

        $public_path = public_path('images');
        $image = $request->file('photo');
        if ( $request->hasfile('photo') && isset($image)) {
            $imageName = $slug . '-' . date('ymdis') . '-' . time() . '-'. rand(0, 999). '.' . $image->extension();
            $imageSize = Image::make($image->path());
            $imageSize->resize(1600, 600,  function ($constraint) {
                $constraint->aspectRatio();
            })->save($public_path.'/blogs/'. $imageName);

            if(file_exists( $public_path . '/blogs/'. $post->photo)){
                unlink( $public_path . '/blogs/' . $post->photo);
            }

        } else {
            $imageName = $post->photo;
        }
         if($count>0){
            $slug = $slug . '-' . date('ymdis') . '-' . time() . '-'. rand(0, 999);
        }

            $post->title        = $request->title;
            $post->slug         = $slug;
            $post->summary      = $request->summary;
            $post->description  = $request->description;
            $post->quote        = $request->quote;
            $post->photo        = $imageName;
            $post->added_by     = Auth::id();
            $post->status       = $request->status;
            $post->save();

            $post->categories()->sync($request->post_cat_id);
            $post->tags()->sync($request->post_tag_id);

        if($post) {
            request()->session()->flash('success', 'Post has been updated successfully......');
        }
        else {
            request()->session()->flash('error', 'Error!  Please try again......');
        }
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function destroy(Post $post)
    {
        $public_path = public_path('images');
        if(file_exists( $public_path . '/blogs/'. $post->photo)){
            unlink( $public_path . '/blogs/' . $post->photo  );
        }
        $post->categories()->detach();
        $post->tags()->detach();
        $staus = $post->delete();
        if($staus) {
            request()->session()->flash('success', 'Post has been deleted successfully......');
        }
        else {
            request()->session()->flash('error', 'Error!  Please try again......');
        }
        return redirect()->route('admin.posts.index');
    }

}
