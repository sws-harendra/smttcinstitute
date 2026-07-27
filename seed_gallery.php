<?php

use App\Models\GalleryImage;

GalleryImage::create(['image_url' => 'assets/images/g1.webp']);
GalleryImage::create(['image_url' => 'assets/images/g2.webp']);
GalleryImage::create(['image_url' => 'assets/images/g3.webp']);
GalleryImage::create(['image_url' => 'assets/images/g4.webp']);
GalleryImage::create(['image_url' => 'assets/images/g5.webp']);
GalleryImage::create(['image_url' => 'assets/images/g6.webp']);

echo "Gallery seeded\n";
