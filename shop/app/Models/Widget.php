<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'location', 'order_no', 'image', 'status', 'content', 'link'];
    protected $hidden = ['id'];
}
