<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessStoryVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'course',
        'title',
        'video_url',
        'thumbnail_url',
        'earning_badge',
        'story_description',
        'order_num'
    ];

    /**
     * Helper to get clean YouTube embed URL or direct video
     */
    public function getEmbedUrlAttribute()
    {
        $url = $this->video_url;
        if (!$url) return '';

        if (preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $matches)) {
            return "https://www.youtube.com/embed/{$matches[1]}?autoplay=1&rel=0";
        }

        return $url;
    }

    /**
     * Helper to get YouTube ID
     */
    public function getYoutubeIdAttribute()
    {
        if (preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $this->video_url, $matches)) {
            return $matches[1];
        }
        return null;
    }
}
