<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    /**
     * Get the user that owns the PostComment
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    

}