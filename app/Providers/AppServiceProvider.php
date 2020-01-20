<?php

namespace BusinessCardSite\Providers;

use Illuminate\Support\ServiceProvider;
use BusinessCardSite\Model\Site;
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
     * Задает переменную site и menu и name для всех представлений сайта
     * @return void
     */
    public function boot()
    {
        $site = Site::find(Site::MAIN_SITE_ID);
        $pages = StaticPage::all();
       
        view()->share(['site' => $site, 'menu' => $pages]);
    }
}
