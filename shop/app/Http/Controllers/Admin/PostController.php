<?php

namespace App\Http\Controllers\Admin;

use App\Helpes\CommonHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends CURDBaseController
{
    protected $module = [
        'code' => 'post',
        'table_name' => 'post',
        'label' => 'Post',
        'modal' => '\App\Models\Post',
        'list' => [
            ['name' => 'image', 'type' => 'image', 'class' => '', 'label' => 'Image'],
            ['name' => 'name', 'type' => 'text', 'class' => '', 'label' => 'Name'],
            ['name' => 'parent', 'type' => 'custom', 'td' => 'admin.themes.td.parent', 'class' => '', 'label' => 'Parent', 'model' => Category::class],
            ['name' => 'status', 'type' => 'status', 'class' => '', 'label' => 'Status']
        ],
        'form' => [
            'general_tab' => [
                ['name' => 'name', 'type' => 'text', 'class' => 'required', 'label' => 'Name', 'group_class' => ''],
                ['name' => 'category_id', 'type' => 'custom', 'class' => '', 'field' => 'admin.form.fields.select_model_tree', 'model' => Category::class, 'label' => 'Parent Category', 'group_class' => 'col-md-4', 'where' => 'type=10'],
                ['name' => 'slug', 'type' => 'text', 'class' => 'required', 'label' => 'Slug', 'group_class' => '', 'properties' => ''],
                ['name' => 'intro', 'type' => 'textarea', 'class' => '', 'label' => 'Intro', 'group_class' => '', 'inner' => 'rows=1'],
                ['name' => 'detail_description', 'type' => 'textarea_ckeditor', 'class' => '', 'label' => 'Detail Description', 'group_class' => ''],
                ['name' => 'status', 'type' => 'checkbox', 'class' => '', 'label' => 'Status', 'group_class' => 'col-md-3'],
            ],
            'image_tab' => [
                ['name' => 'image', 'class' => 'required', 'type' => 'file_editor', 'group_class' => '', 'label' => 'Avatar'],
            ]
        ],
    ];
    public function index(Request $request)
    {
        $data = $this->getDataList($request);
        return view('admin.list')->with($data);
    }
    public function add(Request $request)
    {
        try {
            if (!$_POST) {
                $data = $this->getDataAdd($request);
                return view('admin.add')->with($data);
            } elseif ($_POST) {
                $data = $this->processingValueInFields($request, $this->getAllFormFields());
                foreach ($data as $k => $v) {
                    $this->model->$k = $v;
                }
                if ($this->model->save()) {
                    CommonHelper::flushCache($this->module['table_name']);
                    $this->afterAddLog($request, $this->model);
                    CommonHelper::one_time_message('success', 'Thêm mới thành công!');
                } else {
                    CommonHelper::one_time_message('error', 'Lỗi tao mới. Vui lòng load lại trang và thử lại!');
                }
                return redirect("admin/" . $this->module['code']);
            }
        } catch (\Exception $e) {
            CommonHelper::one_time_message('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
    public function edit(Request $request)
    {
        try {
            $item = $this->model->find($request->id);
            if (!$_POST) {
                $data = $this->getDataEdit($request, $item);
                return view('admin.edit')->with($data);
            } elseif ($_POST) {
                $data = $this->processingValueInFields($request, $this->getAllFormFields());
                foreach ($data as $k => $v) {
                    $item->$k = $v;
                }
                if ($item->save()) {
                    CommonHelper::flushCache($this->module['table_name']);
                    $this->afterAddLog($request, $this->model);
                    CommonHelper::one_time_message('success', 'Thêm mới thành công!');
                } else {
                    CommonHelper::one_time_message('error', 'Lỗi tao mới. Vui lòng load lại trang và thử lại!');
                }
                return redirect("admin/" . $this->module['code']);
            }
        } catch (\Exception $e) {
            CommonHelper::one_time_message('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
    public function delete(Request $request)
    {
        try {
            $item = $this->model->find($request->id);
            $item->delete();
            CommonHelper::one_time_message('success', 'Xoá thành công!');
            return redirect('admin/' . $this->module['code']);
        } catch (\Exception $e) {
            CommonHelper::one_time_message('error', $e->getMessage());
            return redirect()->back();
        }
    }
}
