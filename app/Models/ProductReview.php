<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user_info()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public static function getAllReview(){
        return ProductReview::with('user_info')->paginate(10);
    }

    public static function getAllUserReview(){
        return ProductReview::where('user_id', auth()->user()->id)->with('user_info')->paginate(10);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }   

}
