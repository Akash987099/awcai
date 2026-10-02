<?php

namespace App\Models\client;

use Illuminate\Database\Eloquent\Model;

class WebsiteCmsPage extends Model
{
    protected $fillable = [
        'client_id',
        'title',
        'slug',
        'content',
        'status',
        'meta_title',
        'meta_description',
    ];
}
