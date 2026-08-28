<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = ['id', 'category_id', 'name', 'created_at', 'updated_at'];
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
