<?php

namespace App\Http\Controllers\Admin;

use App\Helpes\CommonHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function ajax_upload_file(Request $request)
    {
        if ($request->has('file')) {
            foreach ($request->file as $key => $fileRequest) {
                if (in_array($fileRequest->getClientOriginalExtension(), ['jpg', 'gif', 'png', 'jpeg'])) {
                    $path = 'uploads';
                    $base_path = public_path();
                    $dir_name = $base_path . $path;
                    if (!is_dir($dir_name)) {
                        // Tạo thư mục của chúng tôi nếu nó không tồn tại
                        mkdir($dir_name, 0777, true);
                    }
                    if (is_dir($dir_name)) {
                        $file = CommonHelper::saveFile($fileRequest, $path);
                        $img[] = [
                            'status' => true,
                            'file' => '/uploads/' . $file,
                            'value' => $file,
                            'msg' => 'Thành công !',
                        ];
                    } else {
                        $img[] = [
                            'status' => false,
                            'msg' => 'Không đúng định dạng !',
                        ];
                    }
                }
            }
        } else {
            return "bcd";
        }
        return response()->json([
            'data' => $img
        ]);
    }
}
