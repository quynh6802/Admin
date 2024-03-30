<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WidgetController extends Controller
{
    public function index()
    {
        return view('admin.widgets.list');
    }
    public function add()
    {
        return view('admin.widgets.add');
    }
    public function edit()
    {
        return view('admin.widgets.edit');
    }
}
