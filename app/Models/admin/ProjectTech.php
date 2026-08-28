<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTech extends Model
{
    use HasFactory;
    protected $table = 'project_technology';
    protected $fillable = ['id', 'project_id', 'technology_id', 'created_at', 'updated_at'];
}
