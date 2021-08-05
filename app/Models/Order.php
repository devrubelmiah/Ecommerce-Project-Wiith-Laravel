<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function getAllOrders($id)
    {
        return Order::findOrfail($id);
    }

    public function countActiveOrder()
    {
        $data = Order::count();
        if($data){
            return $data;
        } else {
            return 0;
        }
    }

    public function carts()
    {
    return $this->hasMany(Cart::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function shipping() {
        return $this->belongsTo(Shipping::class, 'shipping_id');
    }

}