<?php

namespace App\Providers;

use App\Repositories\Interfaces\ProductCategoryRepositoryInterface;
use App\Repositories\Interfaces\ProductsRepositoryInterface;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductsRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductsRepositoryInterface::class, ProductsRepository::class);
        $this->app->bind(ProductCategoryRepositoryInterface::class, ProductCategoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
