<?php

namespace  App\Helpes;

use Session;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class CommonHelper
{
    function __construct()
    {
        setlocale(LC_ALL, 'vi_VN.UTF8');
    }
    public static function saveFile($file, $path)
    {
        $base_path = public_path() . 'uploads';
        $dir_name = $base_path . $path;
        if (!is_dir($dir_name)) {
            // Tạo thư mục của chúng tôi nếu nó không tồn tại
            mkdir($dir_name, 0755, true);
        }
        if (is_string($file)) {
            return "abc";
        } else {
            $file_name = $file->getClientOriginalName();
            $name = explode('.', $file_name);
            $file_name_insert = Str::slug(str_replace(end($name), '', $file_name . rand()), '-') . '.' . end($name);
            // $file_extension = $file->getClientOriginalExtension();
            // $name = $slug . "." . $file_extension;
            $file->move(base_path() . '/public/' . $path, $file_name_insert);
        }
        return  $file_name_insert;
    }
    public static function flushCache($tags = [])
    {
        if (env('CACHE_ACTIVE') == false) {
            return false;
        }
        Cache::tags($tags)->flush();
        Artisan::call('view:clear');
        return true;
    }
    public static function one_time_message($class, $message)
    {
        Session::flash('alert-class', $class);
        Session::flash('message', $message);
    }
}
