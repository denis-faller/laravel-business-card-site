<?php

namespace BusinessCardSite\Providers;

use Illuminate\Support\ServiceProvider;
use BusinessCardSite\Services\StaticPageService;
use BusinessCardSite\Services\SiteService;
use BusinessCardSite\Repositories\StaticPageRepository;
use BusinessCardSite\Repositories\SiteRepository;
use BusinessCardSite\Models\StaticPage;
use BusinessCardSite\Models\Site;
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
     * Регистрирует привязки для сервисов
     * Задает переменную site и menu и name для всех представлений сайта
     * @return void
     */
    public function boot()
    {
        $this->app->bind(StaticPageService::class, function () {
            return new StaticPageService(new StaticPageRepository(new StaticPage()));
        });
        
       $this->app->bind(SiteService::class, function () {
            return new SiteService(new SiteRepository(new Site()));
        });
        
        $serviceSite = app(SiteService::class);
        $site = $serviceSite->find(Site::MAIN_SITE_ID);
        
        $servicePage = app(StaticPageService::class);
        $pages = $servicePage->all();
       
        view()->share(['site' => $site, 'menu' => $pages]);
    }
}
