<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    use HasFactory;
    protected $table = 'project_category';
    protected $fillable = ['id', 'name', 'title', 'icon', 'created_at', 'updated_at'];
}
