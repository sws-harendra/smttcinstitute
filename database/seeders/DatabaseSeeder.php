<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Blog;
use App\Models\SliderImage;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed Default Admin User if not exists
        if (!User::where('username', 'admin')->exists()) {
            User::create([
                'username' => 'admin',
                'password' => Hash::make('admin123'),
            ]);
        }
        // Seed Default Slider Images if empty
        if (SliderImage::count() === 0) {
            $defaultSlides = [
                '/assets/images/hero1.webp',
                '/assets/images/hero2.webp',
                '/assets/images/hero3.webp',
                '/assets/images/hero4.webp',
            ];
            foreach ($defaultSlides as $slide) {
                SliderImage::create(['image_url' => $slide]);
            }
        }

        // Seed Sample Blog Post if empty
        if (Blog::count() === 0) {
            Blog::create([
                'title' => 'Welcome to Smart Technical Training Institute Patna',
                'content' => 'Join the best AC, Refrigerator, Washing Machine, Mobile and Laptop Repairing institute in Patna. Get 100% practical training with industry experts and job assistance.',
                'image_url' => '/assets/images/lab.webp',
            ]);
        }
    }
}
