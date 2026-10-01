<?php

namespace App\Models\client;

use Illuminate\Database\Eloquent\Model;

class PncVideo extends Model
{
    protected $table = 'pnc_videos';

    protected $fillable = [
        'client_id',
        'title',
        'video_path',
        'description',
        'status',
    ];
}
