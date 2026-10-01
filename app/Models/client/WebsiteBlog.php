<?php

namespace App\Models\client;

use Illuminate\Database\Eloquent\Model;

class WebsiteBlog extends Model
{
    protected $fillable = [
        'client_id', 'title', 'excerpt', 'content', 'featured_image',
        'publish_date', 'status', 'meta_title', 'meta_description',
    ];

    protected $casts = ['publish_date' => 'date'];
}