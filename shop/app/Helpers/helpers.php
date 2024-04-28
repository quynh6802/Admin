<?php
if (!function_exists('level_chill')) {
    function level_chill($list, $parent, $level = 0)
    {
        $tree = array();
        foreach ($list as $item) {
            if ($item['parent'] == $parent) {
                $item['level'] = $level;
                $tree[] = $item;
                $child = level_chill($list, $item['id'], $level + 1);
                $tree = array_merge($tree, $child);
            }
        }
        return $tree;
    }
}
if (!function_exists("formatPrice")) {
    function formatPrice($price)
    {
        echo number_format($price, 0, ",", ".") . " VNĐ";
    }
}
