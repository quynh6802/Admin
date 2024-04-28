<?php

namespace App\Http\Controllers\Admin;

use App\Helpes\CommonHelper;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends CURDBaseController
{
    protected $module = [
        'code' => 'menu',
        'table' => 'menus',
        'label' => 'Menu',
        'modal' => '\App\Models\Menu',
        'list' => [
            ['name' => 'name', 'type' => 'text', 'class' => '', 'label' => 'Name'],
            ['name' => 'url', 'type' => 'text', 'class' => '', 'label' => 'Url'],
            ['name' => 'location', 'type' => 'text', 'class' => '', 'label' => 'Location'],
            ['name' => 'parent', 'type' => 'parent', 'class' => '', 'label' => 'Parent', 'model' => Menu::class],
            ['name' => 'order_no', 'type' => 'text', 'class' => '', 'label' => 'Order no'],
            ['name' => 'status', 'type' => 'status', 'class' => '', 'label' => 'Status']
        ],
        'form' => [
            'general_tab' => [
                ['name' => 'name', 'type' => 'text', 'class' => 'required', 'label' => 'Name'],
                ['name' => 'location', 'type' => 'select', 'class' => '', 'option' => [
                    'vị trí 1' => 'vị trí 1',
                    'vị trí 2' => 'vị trí 2',
                ], 'label' => 'Location', 'group_class' => 'col-md-4'],
                ['name' => 'parent', 'type' => 'custom', 'class' => '', 'field' => 'admin.form.fields.select_model_tree', 'model' => Menu::class, 'label' => 'Parent Category', 'group_class' => 'col-md-4'],

                ['name' => 'order_no', 'type' => 'number', 'class' => '', 'label' => 'Order no', 'group_class' => 'col-md-4'],
                ['name' => 'url', 'type' => 'text', 'class' => '', 'label' => 'Url'],
                ['name' => 'status', 'type' => 'checkbox', 'class' => '', 'label' => 'Status', 'group_class' => 'col-md-2'],
            ],
            'image_tab' => [
                //     ['name' => 'image', 'type' => 'file_editor', 'class' => 'required', 'label' => 'Avatar'],
                //     ['name' => 'image_extra', 'type' => 'multi_image_extra', 'class' => 'required', 'label' => 'Avatar'],
            ],
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
            } else if ($_POST) {
                $data = $this->processingValueInFields($request, $this->getAllFormFields());
                $data['type'] = 10;
                // dd($data);
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
                return redirect('admin/' . $this->module['code']);
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
            }
            foreach ($data as $k => $v) {
                $item->$k = $v;
            }
            if ($item->save()) {
                CommonHelper::flushCache($this->module['table_name']);
                CommonHelper::one_time_message('success', 'Sửa thành công!');
            } else {
                CommonHelper::one_time_message('error', 'Lỗi! Vui lòng load lại trang và thử lại!');
            }
            return redirect('admin/' . $this->module['code']);
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
