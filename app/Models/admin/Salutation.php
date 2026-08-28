<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salutation extends Model
{
    use HasFactory;
    protected $table = 'salutation';
    protected $fillable = ['id', 'name', 'created_at', 'updated_at'];
}
