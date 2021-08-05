<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * Get the user that owns the Post
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function user()
    {
        return $this->belongsTo(User::class, 'added_by', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(PostCategory::class, 'categorgy__blog__posts', 'post_id', 'post_cat_id');
    }

    /**
     * The roles that belong to the Post
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function tags()
    {
        return $this->belongsToMany(PostTag::class, 'tag__blog__posts', 'post_id', 'post_tag_id');
    }

       
    public function comments()
    {
        return $this->hasMany(PostComment::class);
    }
    

}
