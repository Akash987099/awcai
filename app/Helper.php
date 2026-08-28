<?php

use App\Models\admin\ProjectCategory;
use App\Models\admin\Technology;
use App\Models\PurchaseTrancation;
use App\Models\Review;
use App\Models\CMS;

if (!function_exists('category')) {
    function category($id)
    {
        return ProjectCategory::find($id);
    }
}

if (!function_exists('technology')) {
    function technology($id)
    {
        return Technology::find($id);
    }
}

if (!function_exists('sales')) {
    function sales($id)
    {
        return PurchaseTrancation::where('project_id', $id)->count();
    }
}

if (!function_exists('rating')) {
    function rating($project_id)
    {
        try {
            $avg = Review::where('project_id', $project_id)
                ->avg('rating');

            if (!$avg) {
                $avg = 0;
            }

            if ($avg > 5) {
                $avg = 5;
            }

            return round($avg);
        } catch (\Exception $e) {
            return 0;
        }
    }
}


if(!function_exists('cms')){
    function cms(){
        return CMS::select('id', 'name')->get();
    }
}
