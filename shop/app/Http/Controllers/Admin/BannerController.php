<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        return view('admin.banners.list');
    }
    public function add()
    {
        return view('admin.banners.add');
    }
    public function edit()
    {
        return view('admin.banners.edit');
    }
}
