<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScreenShot extends Model
{
    use HasFactory;
    protected $table = 'project_screen_shot';
    protected $fillable = ['id', 'project_id', 'image', 'created_at', 'updated_at'];
}
