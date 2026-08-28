<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';

    protected $fillable = [
        'id',
        'name',
        'project_url',
        'preview_link',
        'price',
        'actual_price',
        'project_technology',
        'banner',
        'category',
        'created_at',
        'updated_at'
    ];

}
