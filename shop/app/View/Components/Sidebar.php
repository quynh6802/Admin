<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * add a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    protected $sidebars = [
        'list' => [
            ['name' => 'dashboard', 'link' => 'admin/dashboard', 'icon' => '<i class="nav-icon fas fa-tachometer-alt"></i>', 'label' => 'Dashboard'],
            ['name' => 'theme', 'icon' => '<i class="nav-icon fas fa-desktop"></i>', 'items' => [
                ['name' => 'banner', 'link' => 'admin/banner', 'icon' => '<i class="far fa-circle nav-icon"></i>', 'label' => 'Banner'],
                ['name' => 'widget', 'link' => 'admin/widget', 'icon' => '<i class="far fa-circle nav-icon"></i>', 'label' => 'Widget'],
                ['name' => 'menu', 'link' => 'admin/menu', 'icon' => '<i class="far fa-circle nav-icon"></i>', 'label' => 'Menu'],
            ], 'label' => 'Theme'],
            ['name' => 'post', 'icon' => '<i class="nav-icon fas fa-envelope-open-text"></i>', 'items' => [
                ['name' => 'all post', 'link' => 'admin/post', 'icon' => '<i class="far fa-circle nav-icon"></i>', 'label' => 'All Post'],
                ['name' => 'add post', 'link' => 'admin/post/add', 'icon' => '<i class="far fa-circle nav-icon"></i>', 'label' => 'Add Post'],
                ['name' => 'category post', 'link' => 'admin/category-post', 'icon' => '<i class="far fa-circle nav-icon"></i>', 'label' => 'Category'],
            ], 'label' => 'Post'],
            ['name' => 'Product', 'icon' => '<i class="nav-icon fas fa-folder"></i>', 'items' => [
                ['name' => 'all product', 'link' => 'admin/product', 'icon' => '<i class="far fa-circle nav-icon"></i>', 'label' => 'All Product'],
                ['name' => 'add product', 'link' => 'admin/product/add', 'icon' => '<i class="far fa-circle nav-icon"></i>', 'label' => 'Add Product'],
                ['name' => 'category product', 'link' => 'admin/category-product', 'icon' => '<i class="far fa-circle nav-icon"></i>', 'label' => 'Category'],
            ], 'label' => 'Product'],
            ['name' => 'contact', 'link' => 'admin/contact', 'icon' => '<i class="nav-icon fas fa-address-book"></i>', 'label' => 'Contact'],
        ],
        'setting' => [
            ['name' => 'admin', 'icon' => '<i class="nav-icon fas fa-user"></i>', 'items' => [
                ['name' => 'all user', 'link' => 'admin/user', 'icon' => '<i class="far fa-circle nav-icon"></i>', 'label' => 'All User'],
                ['name' => 'add new user', 'link' => 'admin/user/add', 'icon' => '<i class="far fa-circle nav-icon"></i>', 'label' => 'Add New User'],
                ['name' => 'view profile', 'link' => 'admin/profile', 'icon' => '<i class="far fa-circle nav-icon"></i>', 'label' => 'View Profile'],
                ['name' => 'decentralization', 'link' => 'admin/decentralization', 'icon' => '<i class="far fa-circle nav-icon"></i>', 'label' => 'Decentralization'],
            ], 'label' => 'Admin'],
            ['name' => 'configuration', 'icon' => '<i class="nav-icon fas fa-cog"></i>', 'items' => [
                ['name' => 'general configuration', 'link' => 'admin/general', 'icon' => '<i class="far fa-circle nav-icon"></i>', 'label' => 'General Configuration'],
            ], 'label' => 'Configuration'],
        ],

    ];
    public function render()
    {
        $data['sidebar'] = $this->sidebars;
        return view('admin/partials.sidebar')->with($data);
    }
}
