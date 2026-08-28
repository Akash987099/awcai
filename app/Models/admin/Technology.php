<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
    protected $table = 'technologies';
    protected $fillable = ['id', 'name', 'tiitle', 'sub_title', 'icon', 'created_at', 'updated_at'];
}
