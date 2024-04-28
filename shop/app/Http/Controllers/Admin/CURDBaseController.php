<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpes\CommonHelper;
use Auth;

class CURDBaseController extends Controller
{
    protected $model;
    protected $module = [];
    protected $whereRaw = false;
    protected $limit_default = 10;
    protected $orderByRaw = 'id desc';
    protected $quick_search = [
        'label' => 'ID, name',
        'fields' => 'id, name',
    ];
    protected $filter = [];
    public function __construct()
    {
        $this->model = new $this->module['modal'];
    }
    public function getDataList(Request $request)
    {
        $data['module'] = $this->module;
        $listItem = $this->model->orderByRaw($this->orderByRaw);
        $listItem = $this->quickSearch($listItem, $request);
        if ($this->whereRaw) {
            $data['listItem'] = $listItem->whereRaw($this->whereRaw);
        }
        $data['listItem'] = $listItem->paginate($this->limit_default);
        return $data;
    }
    public function getDataAdd(Request $request)
    {
        $data['module'] = $this->module;
        $data['page_title'] = 'Add ' . $this->module['label'];
        return $data;
    }
    public function getDataEdit(Request $request, $item)
    {
        $data['module'] = $this->module;
        $data['result'] = $item;
        $data['page_title'] = 'Edit ' . $this->module['label'];
        $data['page_type'] = 'edit';
        return $data;
    }
    public function getAllFormFields()
    {
        $fields = [];
        foreach ($this->module['form'] as $tab) {
            foreach ($tab as $field) {
                $fields[] = $field;
            }
        }
        return $fields;
    }

    public function processingValueInFields($request, $fields, $prefix = '')
    {
        $data = [];
        foreach ($fields as $field) {
            if (!in_array($field['type'], ['inner'])) {
                if (in_array($field['type'], ['checkbox'])) {
                    $data[$field['name']] = $request->has($prefix . $field['name']) ? 1 : 0;
                } elseif (in_array($field['type'], ['select_model_tree'])) {
                    $data[$field['name']] = $request->get($prefix . $field['name']);
                } elseif (in_array($field['type'], ['text'])) {
                    $data[$field['name']] = $request->get($prefix . $field['name']);
                } elseif (in_array($field['type'], ['file_editor'])) {
                    if ($request->get('delete_' . $field['name'], 0) == 0) {
                        if ($request->hasFile($field['name'])) {
                            if ($request->file($prefix . $field['name']) != null) {
                                $path = "uploads";
                                $data[$field['name']] = CommonHelper::saveFile($request->file($field['name']), $path);
                            }
                        }
                    } else {
                        $data[$field['name']] = '';
                    }
                } elseif (in_array($field['type'], ['multi_image_extra'])) {
                    $data[$field['name']] = implode('|', $request->get($prefix . $field['name']));
                } elseif (in_array($field['type'], ['custom'])) {
                    $data[$field['name']] = $request->get($prefix . $field['name']);
                } elseif (in_array($field['type'], ['number'])) {
                    $data[$field['name']] = $request->get($prefix . $field['name']);
                } elseif (in_array($field['type'], ['select'])) {
                    $data[$field['name']] = $request->get($prefix . $field['name']);
                }
            }
        }
        return $data;
    }
    public function afterAddLog($request, $item)
    {
        try {
            if ($request->ajax()) {
                $item->company_id = $request->company_id;
                $item->admin_id = $request->admin_id;
            } else {
                $item->company_id = \Auth::guard('admin')->user()->last_company_id;
                $item->admin_id = \Auth::guard('admin')->user()->id;
            }
            $item->save();
        } catch (\Exception $ex) {
            return false;
        }
        return true;
    }
    public function quickSearch($listItem, $r)
    {
        if (@$r->quick_search != '') {
            $listItem = $listItem->where(function ($query) use ($r) {
                foreach (explode(',', $this->quick_search['fields']) as $field) {
                    $query->orWhere(trim($field), 'LIKE', '%' . $r->quick_search . '%');    //  truy vấn các tin thuộc các danh mục con của danh mục hiện tại
                }
            });
        }
        return $listItem;
    }
    public function filterSimple($request)
    {
        $where = '1=1 ';
        if (!is_null($request->id)) {
            $where .= " AND " . 'id' . " = " . $request->id;
        }
        #
        foreach ($this->filter as $filter_name => $filter_option) {
            if (!is_null($request->get($filter_name))) {
                if ($filter_option['query_type'] == 'like') {
                    $where .= " AND " . $filter_name . " LIKE '%" . $request->get($filter_name) . "%'";
                } elseif ($filter_option['query_type'] == 'from_to_date') {
                    if (!is_null($request->get('from_date')) || $request->get('from_date') != '') {
                        $where .= " AND " . $filter_name . " >= '" . date('Y-m-d 00:00:00', strtotime($request->get('from_date'))) . "'";
                    }
                    if (!is_null($request->get('to_date')) || $request->get('to_date') != '') {
                        $where .= " AND " . $filter_name . " <= '" . date('Y-m-d 23:59:59', strtotime($request->get('to_date'))) . "'";
                    }
                } elseif ($filter_option['query_type'] == '=') {
                    $where .= " AND " . $filter_name . " = '" . $request->get($filter_name) . "'";
                }
            }
        }
        return $where;
    }
}
