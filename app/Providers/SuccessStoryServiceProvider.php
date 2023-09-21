<?php

namespace App\Providers;

use App\Models\Success_Story;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SuccessStoryServiceProvider extends ServiceProvider
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
        View::composer('visitors.index', function ($view) {
            $success_story = Success_Story::latest()->limit(3)->get();
            $view->with('success_story', $success_story);
        });
    }
}
