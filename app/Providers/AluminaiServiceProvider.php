<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Aluminai;


class AluminaiServiceProvider extends ServiceProvider
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
            $aluminais = Aluminai::latest()->limit(30)->get();
            $view->with('aluminais', $aluminais);
        });
    }
}
