<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Share categories data to all views
        View::composer('*', function ($view) {
            try {
                $categories = Category::active()->ordered()->get();
                $view->with('globalCategories', $categories);
            } catch (\Exception $e) {
                // Fallback jika tabel belum ada
                $view->with('globalCategories', collect());
            }
        });
    }
}
