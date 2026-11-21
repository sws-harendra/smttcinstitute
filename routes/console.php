<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Services\SitemapService;

Artisan::command('sitemap:generate', function () {
    $this->info('Generating real-time sitemap.xml...');
    $success = SitemapService::generateSitemapXml();
    if ($success) {
        $this->info('✓ Sitemap successfully generated and saved to public/sitemap.xml and root sitemap.xml!');
    } else {
        $this->error('✗ Failed to generate sitemap.');
    }
})->purpose('Generate and update real-time sitemap.xml');
