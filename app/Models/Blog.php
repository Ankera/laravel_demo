<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    /**
     * 允许批量添加的字段
     */
    protected $fillable = ['user_id', 'title', 'content', 'category_id'];

    /**
     * 博客所属的博客
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this -> belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * 博客属于哪个分类
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(){
        return $this -> belongsTo(Category::class, 'category_id', 'id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'blog_id', 'id');
    }
}
