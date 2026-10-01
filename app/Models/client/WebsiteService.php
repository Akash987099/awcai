<?php

namespace App\Models\client;

use Illuminate\Database\Eloquent\Model;

class WebsiteService extends Model
{
    protected $fillable = [
        'client_id', 'title', 'short_description', 'description',
        'service_url', 'image', 'sort_order', 'is_active',
    ];
}