<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Omochi\Shop\Domain\Models\Item\ItemRepository;
use Omochi\Shop\Infrastructure\Repositories\Domain\Eloquent\EloquentItemRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ItemRepository::class,
            EloquentItemRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
