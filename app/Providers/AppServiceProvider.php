<?php

namespace App\Providers;

use App\Repository\v1\ImageRepository;
use App\Repository\v1\Interfaces\ImageRepositoryInterface;
use App\Services\v1\ImageServices;
use App\Services\v1\Interfaces\ImageServicesInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
