<?php

namespace App\Models\client;

use Illuminate\Database\Eloquent\Model;

class WebsiteSlider extends Model
{
    protected $fillable = ['client_id', 'title', 'image', 'sort_order', 'is_active'];
}