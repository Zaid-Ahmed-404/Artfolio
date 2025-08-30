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
        //
        //service binding
        $this->app->bind(ImageServicesInterface::class, ImageServices::class);


        //repostory binding
        $this->app->bind(ImageRepositoryInterface::class, ImageRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
