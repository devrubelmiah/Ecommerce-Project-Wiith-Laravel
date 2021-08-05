<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Backend
use App\Http\Controllers\Backend\Users\UsersLoginController;
use App\Http\Controllers\Backend\Users\UsersRegisterController;
use App\Http\Controllers\Backend\Users\UsersController;
use App\Http\Controllers\Backend\Admin\AdminLoginController;
use App\Http\Controllers\Backend\Admin\AdminRegisterController;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\BrandController;
use App\Http\Controllers\Backend\Admin\BannerController;
use App\Http\Controllers\Backend\Admin\CategoryController;
use App\Http\Controllers\Backend\Admin\ProductController;
use App\Http\Controllers\Backend\Admin\PostCategoryController;
use App\Http\Controllers\Backend\Admin\PostTagController;
use App\Http\Controllers\Backend\Admin\PostController;
use App\Http\Controllers\Backend\Admin\CouponController;
use App\Http\Controllers\Backend\Admin\ShippingController;
use App\Http\Controllers\Backend\Admin\ProductReviewController;
use App\Http\Controllers\Backend\Admin\PostCommentController;

//Frontend Controller
use App\Http\Controllers\Frontend\FontendController;
use App\Http\Controllers\Backend\CartController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\WishlistController;
use App\Http\Controllers\StripeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FontendController::class, 'index'])->name('index');
Route::get('/product-details/{slug}', [FontendController::class, 'productDetail'])->name('product.detail');

//Grid layout..............................................
Route::get('/product-lists', [FontendController::class, 'productLists'])->name('product.lists');
Route::get('/product-grids', [FontendController::class, 'productGrids'])->name('product.grids');
Route::get('/product-categories/{slug}/', [FontendController::class, 'productByCategory'])->name('product-categories');

//Blog.............................
Route::get('/blogs', [FontendController::class, 'allPost'])->name('blog');
Route::get('/blog-detail/{slug}', [FontendController::class, 'blogDetail'])->name('blog.detail');

//Comment.............
Route::post('post/{slug}/comment', [PostCommentController::class, 'store'])->name('post.comment.store');

Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*****************************Carts Section ***************************/
Route::get('carts', [CartController::class, 'carts'])->name('carts')->middleware('auth');
Route::get('add-to-cart/{slug}', [CartController::class, 'addToCart'])->name('add-to-cart')->middleware('auth');
Route::post('add-to-cart', [CartController::class, 'singleAddToCart'])->name('single-add-to-cart')->middleware('auth');
Route::get('cart-delete/{id}', [CartController::class, 'deleteCart'])->name('delete-cart')->middleware('auth');
Route::post('carts-update', [CartController::class, 'updateCart'])->name('update-carts')->middleware('auth');
Route::post('store-coupon', [CouponController::class, 'storeCoupon'])->name('store.coupon')->middleware('auth');

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::post('cart/order', [OrderController::class, 'store'])->name('cart.order');

/*****************************Whishlist Section***************************/
Route::get('add-to-wishlist/{slug}', [WishlistController::class, 'addToWislist'])->name('add-to-wishlist')->middleware('auth');

/************************Product Review **************************/
Route::post('/porduct/{slug}/review', [ProductReviewController::class, 'store'])->name('review.store');

//admin controoler....................................
Route::prefix('admin')->name('admin.')->group(function () {
Route::get('login', [AdminLoginController::class, 'adminLoginForm'])->name('login');
Route::post('login', [AdminLoginController::class, 'adminLogin'])->name('login');

Route::get('register', [AdminRegisterController::class, 'adminRegisterForm'])->name('register');
Route::post('register', [AdminRegisterController::class, 'adminRegister'])->name('register');

Route::middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AdminController::class, 'adminLogout'])->name('logout');

    Route::resource('brands', BrandController::class);
    Route::resource('banners', BannerController::class);
    Route::resource('categories', CategoryController::class);
    Route::post('category/{id}/child', [CategoryController::class, 'getChildByParent']);
    Route::resource('products', ProductController::class);

    //blog category, tag and post controllers
    Route::resource('post-categories', PostCategoryController::class);
    Route::resource('post-tags', PostTagController::class);
    Route::resource('posts', PostController::class);
    Route::resource('coupons', CouponController::class);
    Route::resource('shippings', ShippingController::class);
    Route::resource('orders', OrderController::class)->except(['store']);
    Route::resource('reviews', ProductReviewController::class)->except('store');;   
    Route::resource('comments', PostCommentController::class)->except('store');
 });
});

//User Controller...............................
Route::prefix('users')->group(function () {
    Route::get('login', [UsersLoginController::class, 'usersLoginForm'])->name('login');
    Route::post('login', [UsersLoginController::class, 'usersLogin'])->name('login');

    Route::get('register', [UsersRegisterController::class, 'usersRegisterForm'])->name('register');
    Route::post('register', [UsersRegisterController::class, 'usersRegister'])->name('register');

    Route::middleware(['auth'])->name('user.')->group(function () {
        Route::get('/dashboard', [UsersController::class, 'index'])->name('dashboard');
        // Route::get('/dashboard', [UsersController::class, 'index'])->name('dashboard');
        Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
    });
});


/*****************Stripe Payment **************/
Route::get('stripe', [StripeController::class, 'stripe']);
 Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');


 