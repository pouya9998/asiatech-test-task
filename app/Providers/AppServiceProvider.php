<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Category\Entities\Category;
use Modules\Category\Repositories\CategoryInterface;
use Modules\Category\Repositories\CategoryRepository;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {

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
