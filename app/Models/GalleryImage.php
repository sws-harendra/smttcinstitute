<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'media_type',
        'image_url',
        'video_url',
        'thumbnail_url',
    ];

    /**
     * Get Embed URL for YouTube/Vimeo/Direct video
     */
    public function getEmbedUrlAttribute()
    {
        if (empty($this->video_url)) {
            return null;
        }

        // YouTube Watch URL or Shorts -> Embed URL
        if (preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $this->video_url, $matches)) {
            return 'https://www.youtube.com/embed/' . $matches[1] . '?autoplay=1&rel=0';
        }

        // Vimeo -> Embed URL
        if (preg_match('/vimeo\.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|)(\d+)/', $this->video_url, $matches)) {
            return 'https://player.vimeo.com/video/' . $matches[3] . '?autoplay=1';
        }

        return $this->video_url;
    }

    /**
     * Get YouTube Video ID if applicable
     */
    public function getYoutubeIdAttribute()
    {
        if (empty($this->video_url)) {
            return null;
        }
        if (preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $this->video_url, $matches)) {
            return $matches[1];
        }
        return null;
    }
}
