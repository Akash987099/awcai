<?php

namespace App\Models\client;

use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    protected $fillable = [
        'client_id', 'website_name', 'tagline', 'website_url',
        'primary_email', 'support_email', 'phone', 'whatsapp',
        'address', 'city', 'state', 'pincode',
        'meta_title', 'meta_description',
        'facebook_url', 'instagram_url', 'linkedin_url', 'youtube_url',
        'header_logo', 'footer_logo', 'favicon', 'copyright_text',
    ];
}