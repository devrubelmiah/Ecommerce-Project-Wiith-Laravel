<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function shiftChild($cat_id){
        return Category::whereIn('id',$cat_id)->update(['is_parent'=>1]);
    }

    public static function getChildByParentID($id){
        return Category::where('parent_id',$id)->orderBy('id','ASC')->pluck('title','id');
    }

    /**
     * Get the user that owns the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function product()
    // {
    //     return $this->belongsTo(Product::class, 'cat_id', 'id');
    // }

    public function products()
    {
        return $this->hasMany(Product::class, 'cat_id', 'id')->where('status', 'active');
    }

    public function sub_products()
    {
        return $this->hasMany(Product::class, 'child_cat_id', 'id')->where('status', 'active');
    }

/**
 * The roles that belong to the Category
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
 */
/*

public function roles(): BelongsToMany
{
    return $this->belongsToMany(Role::class, 'role_user_table', 'user_id', 'role_id');
}
*/
    

}
