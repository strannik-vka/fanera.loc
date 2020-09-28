<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('path.public', function () {
            return base_path('public_html');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // head
        View::composer('layouts.head', function ($view) {
            $view->with([
                'setting' => Setting::first(),
            ]);
        });

        // header
        View::composer('layouts.header', function ($view) {
            $categories = Category::where('status', 0)
                ->orderBy('sort', 'asc')
                ->orderBy('id', 'desc')
                ->get();

            $view->with([
                'categories' => $categories,
                'setting' => Setting::first(),
            ]);
        });

        // footer
        View::composer('layouts.footer', function ($view) {
            $view->with([
                'setting' => Setting::first(),
            ]);
        });
    }
}
