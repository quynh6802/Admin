<?php

namespace App\Http\Controllers\Admin;

use App\Helpes\CommonHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends CURDBaseController
{
    protected $module = [
        'code' => 'contact',
        'table' => 'contacts',
        'label' => 'Contact',
        'modal' => '\App\Models\Contact',
        'list' => [
            ['name' => 'image', 'type' => 'image', 'class' => '', 'label' => 'Image'],
            ['name' => 'name', 'type' => 'text', 'class' => '', 'label' => 'Name'],
            ['name' => 'gender', 'type' => 'text', 'class' => '', 'label' => 'Gender'],
            ['name' => 'phone', 'type' => 'text', 'class' => '', 'label' => 'Phone'],
            ['name' => 'email', 'type' => 'text', 'class' => '', 'label' => 'Email'],
            ['name' => 'order_id', 'type' => 'text', 'class' => '', 'label' => 'Order Id'],
            ['name' => 'address', 'type' => 'text', 'class' => '', 'label' => 'Address'],
            ['name' => 'status', 'type' => 'status', 'class' => '', 'label' => 'Status']
        ],
        'form' => [
            'general_tab' => [
                ['name' => 'name', 'type' => 'text', 'class' => 'required', 'label' => 'Name'],
                ['name' => 'location', 'type' => 'select', 'class' => '', 'option' => [
                    'vị trí 1' => 'vị trí 1',
                    'vị trí 2' => 'vị trí 2',
                ], 'label' => 'Location', 'group_class' => 'col-md-4'],
                ['name' => 'order_no', 'type' => 'number', 'class' => '', 'label' => 'Order no', 'group_class' => 'col-md-4'],
                ['name' => 'link', 'type' => 'text', 'class' => '', 'label' => 'Link to'],
                ['name' => 'intro', 'type' => 'textarea', 'class' => '', 'label' => 'Intro', 'inner' => 'rows=1'],
                ['name' => 'description', 'type' => 'textarea', 'class' => '', 'label' => 'Description', 'inner' => 'rows=1'],
                ['name' => 'status', 'type' => 'checkbox', 'class' => '', 'label' => 'Status', 'group_class' => 'col-md-2'],
            ],
            'image_tab' => [
                ['name' => 'image', 'type' => 'file_editor', 'class' => 'required', 'label' => 'Avatar'],
                ['name' => 'image_extra', 'type' => 'multi_image_extra', 'class' => 'required', 'label' => 'Avatar'],
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
