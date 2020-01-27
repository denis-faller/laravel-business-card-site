<?php

namespace BusinessCardSite\Http\Controllers\Admin;

use BusinessCardSite\Services\SiteService;
use BusinessCardSite\Http\Requests\SiteRequest;
use BusinessCardSite\Models\Site;
use BusinessCardSite\Http\Controllers\Controller;

/** 
 * Контроллер для работы с информацией сайта
 */

class SiteController extends Controller
{
    /**
    * Возвращает представление страницы отображения информации о сайте
    * @param SiteService $service
    * @return Illuminate\Support\Facades\View
    */  
    
    public function index(SiteService $service)
    {
        $site = $service->find(Site::MAIN_SITE_ID);
        
        view()->share(['title' => 'Страница настроек сайта', 'description' => ' Страница информации о сайте']);
        return view('admin.site.index', ['site' => $site]);
    }
    
    /**
    * Возвращает представление страницы редактирования информации о сайте
    * @param int $id
    * @param SiteService $service
    * @return Illuminate\Support\Facades\View
    */  
    
    public function edit($id, SiteService $service)
    {
        $site = $service->find($id);
        
        view()->share(['title' => 'Страница редактирования сайта', 'description' => ' Страница редактирования информации о сайте']);
        return view('admin.site.edit', ['site' => $site]);
    }
    
    /**
    * Обновляет информацию о сайте
    * @param Illuminate\Http\SiteRequest $request
    * @param int $id
    * @param SiteService $service
    * @return Illuminate\Routing\Redirector
    */  
    public function update(SiteRequest $request, $id, SiteService $service)
    {   
        $service->update($id, array('name' => $request->name));
        
        return redirect(route('admin.Site.index'));
    }
}