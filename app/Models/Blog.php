<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image_url',
        'cover_link',
        'title_color',
        'title_font',
        'title_size',
        'title_weight',
        'title_transform',
        'author_name',
    ];
}
