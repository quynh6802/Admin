<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'location', 'url', 'parent', 'order_no', 'status'];
    protected $hidden = ['id'];
    public function childs()
    {
        return $this->hasMany($this, 'parent', 'id');
    }
}
