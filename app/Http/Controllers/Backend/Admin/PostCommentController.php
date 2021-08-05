<?php
namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\PostComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $comments = PostComment::latest('id')->get();
        return view('backend.admin.comment.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request, $postId)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);

        $status = PostComment::create([
            'user_id'   => Auth::id(),
            'post_id'   => $postId,
            'comment'   => $request->comment,
            'status'    => 'active',
        ]);
        
        if($status) {
            request()->session()->flash('success', 'Comment has been submitt successfully......');
        }
        else {
            request()->session()->flash('error', 'Error!  Please try again......');
        }
        return back();
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $comment = PostComment::find($id);        
        return view('backend.admin.comment.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);
        $comment = PostComment::find($id);

        $status = $comment->create([
            'comment'   => $request->comment,
            'status'    => $request->status,
        ]);
        
        if($status) {
            request()->session()->flash('success', 'Comment has been updated successfully......');
        }
        else {
            request()->session()->flash('error', 'Error!  Please try again......');
        }
        return redirect()->route('admin.comments.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $comment = PostComment::find($id);
        if($comment->delete()) {
            request()->session()->flash('success', 'Comments has been deleted successfully...
        ...');
        }
        else {
            request()->session()->flash('error', 'Error!  Please try again......');
        }
        return redirect()->route('admin.comments.index');
    }


}
