<?php
namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;

class BannerController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $banners = Banner::latest('id')->get();
        return view('backend.admin.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('backend.admin.banner.create');
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
            'description'   => 'string|required',
            'photo'         =>  'required',
            'status'=>'required|in:active,inactive',
        ]);
        
        $slug   = Str::slug($request->title);
        $count  = Banner::where('slug', $slug)->count();
       
        $public_path = public_path('images');
         $image = $request->file('photo');
        if ( $request->hasfile('photo') && isset($image)) {            
            $imageName = $slug . '-' . date('ymdis') . '-' . time() . '-'. rand(0, 999). '.' . $image->extension();
            $imageSize = Image::make($image->path());
            $imageSize->resize(1600, 600,  function ($constraint) {
                $constraint->aspectRatio();
            })->save($public_path.'/sliders/'. $imageName);
        } else {
            $imageName = 'default.jpg';
        }

        if($count>0){
            $slug = $slug . '-' . date('ymdis') . '-' . time() . '-'. rand(0, 999);
        }

        $status = Banner::create([
            'title'     => $request->title,
            'photo'     => $imageName,
            'slug'      => $slug,
            'description'=> $request->description,
            'status'    => $request->status,
            ]);
        if($status) {
            request()->session()->flash('success', 'Banner has been created successfully......');
        }
        else {
            request()->session()->flash('error', 'Error!  Please try again......');
        }
        return redirect()->route('admin.banners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */

    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */

    public function edit(Banner $banner)
    {
        return view('backend.admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Banner $banner)
    {
        $this->validate($request, [
            'title'         => 'string|required',
            'description'   => 'string|required',
            'photo'         =>  'nullable|image',
            'status'        => 'required|in:active,inactive',
        ]);
        
        $slug   = Str::slug($request->title);
        $count  = Banner::where('slug', $slug)->count();
       
        $public_path = public_path('images');
         $image = $request->file('photo');
        if ( $request->hasfile('photo') && isset($image)) {            
            $imageName = $slug . '-' . date('ymdis') . '-' . time() . '-'. rand(0, 999). '.' . $image->extension();
            $imageSize = Image::make($image->path());
            $imageSize->resize(1600, 600,  function ($constraint) {
                $constraint->aspectRatio();
            })->save($public_path.'/sliders/'. $imageName);
            
            if(file_exists( $public_path . '/sliders/'. $banner->photo)){
                unlink( $public_path . '/sliders/' . $banner->photo  );
            }

        } else {
            $imageName = $banner->photo;
        }
        if($count>1){
            $slug = $slug . '-' . date('ymdis') . '-' . time() . '-'. rand(0, 999);
        }
        $status = $banner->update([
            'title'     => $request->title,
            'photo'     => $imageName,
            'slug'      => $slug,
            'description'=> $request->description,
            'status'    => $request->status,
            ]);
        if($status) {
            request()->session()->flash('success', 'Banner has been updated successfully......');
        }
        else {
            request()->session()->flash('error', 'Error!  Please try again......');
        }
        return redirect()->route('admin.banners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */

    public function destroy(Banner $banner)
    {

        if(isset($banner)){
            $status         = $banner->delete();
            $public_path    = public_path('images');
            if(file_exists( $public_path . '/sliders/'. $banner->photo)){
                unlink( $public_path . '/sliders/' . $banner->photo);
            }
        }

        if($status) {
            request()->session()->flash('success', 'Banner has been deleted successfully......');
        }
        else {
            request()->session()->flash('error', 'Error!  Please try again......');
        }
        return redirect()->route('admin.banners.index');
    }

}