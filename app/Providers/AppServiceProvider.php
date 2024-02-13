<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        ini_set('upload_max_filesize', '100M');
        ini_set('post_max_size', '100M');
    }
}
