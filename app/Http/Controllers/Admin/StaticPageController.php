<?php

namespace BusinessCardSite\Http\Controllers\Admin;

use BusinessCardSite\Services\StaticPageService;
use BusinessCardSite\Http\Requests\StaticPageRequest;
use BusinessCardSite\Models\StaticPage;
use BusinessCardSite\Models\Site;
use BusinessCardSite\Http\Controllers\Controller;

/** 
 * Контроллер для работы со статической страницы
 */

class StaticPageController extends Controller
{
    /**
    * Возвращает представление страницы отображения статических страниц
    * @param StaticPageService $service
    * @return Illuminate\Support\Facades\View
    */  
    public function index(StaticPageService $service)
    {
        $pages = $service->all();
        
        view()->share(['title' => 'Админка', 'description' => 'Админка сайта']);
        return view('admin.index', ['pages' => $pages, 'mainPageId' => StaticPage::MAIN_PAGE_ID]);
    }
    
    /**
    * Возвращает представление страницы создания статической страницы
    * @return Illuminate\Support\Facades\View
    */  
    public function create()
    {
        view()->share(['title' => 'Создание статической страницы', 'description' => 'Создание статической страницы сайта']);
        return view('admin.staticPage.create');
    }
    
    /**
    * Создает статическую страницу
    * @param Illuminate\Http\StaticPageRequest $request
    * @param StaticPageService $service
    * @return Illuminate\Routing\Redirector
    */  
    public function store(StaticPageRequest $request, StaticPageService $service)
    {   
        $service->create(array('site_id' => Site::MAIN_SITE_ID, 
            'name' => $request->name, 
            'description' => $request->description, 
            'url' => $request->url, 
            'html' => $request->html));
        
        return redirect(route('admin.StaticPage.index'));
    }
    
    /**
    * Возвращает представление страницы редактирования статической страницы
    * @param int $id
    * @param StaticPageService $service
    * @return Illuminate\Support\Facades\View
    */  
    public function edit($id, StaticPageService $service)
    {
        $page = $service->find($id);
        
        view()->share(['title' => 'Редактирование статической страницы', 'description' => 'Редактирование статической страницы сайта']);
        return view('admin.staticPage.edit', ['page' => $page]);
    }
    
    /**
    * Обновляет статическую страницу
    * @param Illuminate\Http\StaticPageRequest $request
    * @param int $id
    * @param StaticPageService $service
    * @return Illuminate\Routing\Redirector
    */  
    public function update(StaticPageRequest $request, $id, StaticPageService $service)
    {   
        $service->update($id, array('site_id' => Site::MAIN_SITE_ID, 
            'name' => $request->name, 
            'description' => $request->description, 
            'url' => $request->url, 
            'html' => $request->html));
        
        return redirect(route('admin.StaticPage.index'));
    }
    
    /**
    * Удаляет статическую страницу
    * @param int $id
    * @param StaticPageService $service
    * @return Illuminate\Http\Response
    */  
    public function destroy($id, StaticPageService $service)
    {   
        $service->destroy($id);

        return response('OK', 200);
    }
}