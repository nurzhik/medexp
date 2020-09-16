<?php

namespace App\Providers;

use App\Map\CityObject;
use App\News;
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function (View $view) {
            $city = CityObject::where('lang', App::getLocale())->get();

            $news = News::where('lang', App::getLocale())->take(4)->get();
            config(['map.list' => $city]);
            config(['news' => $news]);
        });
    }
}
