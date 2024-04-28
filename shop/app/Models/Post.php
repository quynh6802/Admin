<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'slug', 'image', 'category_id', 'intro', 'detail-description', 'status'];
    protected $hidden = ['id'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
