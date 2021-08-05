<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * Get the brand that owns the Product
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function images()
    {
        return $this->hasMany(Product_Image::class, 'product_id', 'id' );
    }

    /**
     * Get the user associated with the Product
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

     public function cat_info()
    {
        return $this->hasOne(Category::class, 'id', 'cat_id');
    }

    /**
     * Get the user associated with the Product
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function sub_cat_info()
    {
        return $this->hasOne(Category::class, 'id', 'child_cat_id');
    }

    public static function getAllProduct()
    {
        return Category::with('cat_info', 'sub_cat_info')->orderBy('id', 'DESC')->paginate('10');
    }

    /**
     * Get the user that owns the Product
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }
    
    public function mycate()
    {
        return $this->hasOne(category::class, 'cat_id', 'id');
    }

    public function sub_category()
    {
        return $this->belongsTo(Category::class, 'child_cat_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    /**
     * Get all of the comments for the Product
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function carts()
    {
        return $this->hasMany(Cart::class)->whereNotNull('order_id');
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class)->whereNotNull('cart_id');
    }

    public function reviews()
    {
        return $this->hasMany();
    }

    /**
     * Get all of the comments for the Product
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    
    public function getReviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id', 'id')->with('user_info')->where('status', 'active')->orderBy('id', 'DESC');
    }
}
