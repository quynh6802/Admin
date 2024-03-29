<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.list');
    }
    public function add()
    {
        return view('admin.products.add');
    }
    public function edit()
    {
        return view('admin.products.edit');
    }
    public function category()
    {
        return view('admin.categories_product.list');
    }
    public function addCategory()
    {
        return view('admin.categories_product.add');
    }
    public function editCategory()
    {
        return view('admin.categories_product.edit');
    }
}
