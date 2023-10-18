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
}
