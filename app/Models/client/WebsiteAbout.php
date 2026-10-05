<?php

namespace App\Models\client;

use Illuminate\Database\Eloquent\Model;

class WebsiteAbout extends Model
{
    protected $table = 'website_about';

    protected $fillable = [
        'client_id', 'name', 'designation', 'organization', 'description',
        'primary_image', 'secondary_image',
        'stat_one_value', 'stat_one_label', 'stat_two_value', 'stat_two_label',
        'read_more_url',
    ];
}
