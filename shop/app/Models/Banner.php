<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'image', 'image_extra', 'link', 'intro', 'description', 'location', 'order_no', 'status'];
    protected $hidden = ['id'];
}
