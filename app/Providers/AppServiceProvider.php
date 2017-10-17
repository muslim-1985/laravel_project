<?php

namespace App\Providers;

use App\AdminModels\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //вызываем функцию доступа ко всем категориям из любого места
        \View::composer('admin.layouts.partials._nav', function ($view){

            $view->with('categories', Category::all());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
