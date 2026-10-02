<?php

namespace App\Models\client;

use Illuminate\Database\Eloquent\Model;

class WebsiteFaq extends Model
{
    protected $fillable = [
        'client_id',
        'question',
        'answer',
        'sort_order',
        'status',
    ];
}
