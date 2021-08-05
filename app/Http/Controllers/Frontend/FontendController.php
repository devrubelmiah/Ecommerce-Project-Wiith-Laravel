<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Post;

class FontendController extends Controller
{
    public function index(){
        $banners        = Banner::latest('id')->where('status', 'active')->get();
        $categories     = Category::latest('id')->where('status', 'active')->where('is_parent', 1)->limit(3)->get();
        $productCategories = Category::latest('id')->where('status', 'active')->where('is_parent', 1)->limit(10)->get();
        $hotProducts    = Product::latest('id')->where('status', 'active')->whereIn('condition', ['hot', 'new'])->limit(15)->get();
        $latestProducts = Product::latest('id')->where('status', 'active')->inRandomOrder()->limit(6)->get();
        $posts          = Post::latest('id')->limit(3)->get();
        return view('frontend.index', compact('banners', 'categories', 'productCategories', 'hotProducts', 'latestProducts', 'posts'));
    }

    public function productDetail($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $categoryProduct = $product->category->products;
        //return Category::where('slug', $product->category->slug)->first();
        return view('frontend.single-product', compact('product', 'categoryProduct'));
    }

    public function blogDetail($slug)
    {
       $post=Post::where( 'slug', $slug)->first();
        return view('frontend.single-blog', compact('post'));
    }

    public function productGrids()
    {
        // $categories = Category::latest('id')->where('status', 'active')->where('is_parent', 1)->limit(3)->get();
        $categories = Category::latest('id')->where('status', 'active')->where('is_parent', 1)->limit(15)->get();
        $products   = Product::latest('id')->where('status', 'active')->inRandomOrder()->paginate(9);
        return view('frontend.product-list', compact( 'products', 'categories') );
    }

    public function productLists()
    {
        return 'remain the create list page';
    }

    public function productByCategory($slug)
    {
        $category = Category::where( 'slug', $slug)->first();
        $products = Product::where('cat_id', $category->id)->paginate(6);
        //return dd($products);
        // foreach ( $products as $key => $value) {
        //     echo $value->title . " ";
        // }
        return view('frontend.single-category', compact('category', 'products'));
    }

   public function allPost()
   {
    $posts = Post::where( 'status', 'active')->paginate(9);
        return view('frontend.blog', compact('posts'));
   }

}
