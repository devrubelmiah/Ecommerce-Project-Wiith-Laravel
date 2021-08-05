<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Image extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
 
    /**
     * Get the user that owns the Product_Image
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    
}
