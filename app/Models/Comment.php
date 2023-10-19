<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'blog_id', 'content'];

    /**
     * 评论所属的博客
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function blog(){
        return $this -> belongsTo(Blog::class, 'blog_id','id');
    }

    /**
     * 评论所属的用户
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this -> belongsTo(User::class, 'user_id','id');
    }
}
