<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    protected $table = 'email_templates';
    protected $fillable = ['id', 'name', 'subject', 'body', 'placeholders', 'created_at', '', 'updated_at'];
}
