<?php

namespace BusinessCardSite\Http\Controllers\Admin;

use BusinessCardSite\Model\User;
use BusinessCardSite\Model\Site;
use BusinessCardSite\Model\StaticPage;
use BusinessCardSite\Http\Requests\SiteRequest;
use BusinessCardSite\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/** 
 * Контроллер для работы с информацией сайта
 */

class SiteController extends Controller
{
    /**
    * Возвращает представление страницы отображения информации о сайте
    * @return Illuminate\Support\Facades\View
    */  
    
    public function index()
    {
        $site = Site::find(Site::MAIN_SITE_ID);
        view()->share(['title' => 'Страница настроек сайта', 'description' => ' Страница информации о сайте']);
        return view('admin.site.index', ['site' => $site]);
    }
    
    /**
    * Возвращает представление страницы редактирования информации о сайте
    * @return Illuminate\Support\Facades\View
    */  
    
    public function edit(Site $site)
    {
        view()->share(['title' => 'Страница редактирования сайта', 'description' => ' Страница редактирования информации о сайте']);
        return view('admin.site.edit', ['site' => $site]);
    }
    
    /**
    * Обновляет информацию о сайте
    * @param Illuminate\Http\SiteRequest $request
    * @param BusinessCardSite\Model\Site $site
    * @return Illuminate\Routing\Redirector
    */  
    public function update(SiteRequest $request, Site $site)
    {   
        $site->name = $request->name;
        $site->save();
        
        return redirect(route('admin.Site.index'));
    }
}