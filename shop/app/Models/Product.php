<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'slug', 'image', 'image_extra', 'category_id', 'quantity', 'promotion', 'import_price', 'price', 'size', 'color', 'intro', 'description', 'detail_description', 'status'];
    protected $hidden = ['id'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
