<?php

namespace App\Models\client;

use Illuminate\Database\Eloquent\Model;

class PncVideo extends Model
{
    protected $table = 'pnc_videos';

    protected $fillable = [
        'client_id',
        'title',
        'source_type',
        'video_path',
        'youtube_url',
        'description',
        'status',
    ];

    public function getYoutubeEmbedUrlAttribute(): ?string
    {
        if (!$this->youtube_url) {
            return null;
        }

        $host = strtolower((string) parse_url($this->youtube_url, PHP_URL_HOST));
        $path = trim((string) parse_url($this->youtube_url, PHP_URL_PATH), '/');

        if (str_contains($host, 'youtu.be')) {
            $videoId = explode('/', $path)[0] ?? '';
        } else {
            parse_str((string) parse_url($this->youtube_url, PHP_URL_QUERY), $query);
            $videoId = $query['v'] ?? (str_starts_with($path, 'embed/') ? substr($path, 6) : '');
        }

        $videoId = preg_replace('/[^A-Za-z0-9_-]/', '', (string) $videoId);

        return $videoId ? 'https://www.youtube-nocookie.com/embed/' . $videoId : null;
    }
}
