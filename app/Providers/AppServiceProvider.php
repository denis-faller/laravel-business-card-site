<?php

namespace BusinessCardSite\Providers;

use Illuminate\Support\ServiceProvider;
use BusinessCardSite\Model\StaticPage;

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
     * Задает переменную $menu для всех представлений сайта
     * @return void
     */
    public function boot()
    {
       $pages = StaticPage::all();
       
        view()->share('menu', $pages);
    }
}
