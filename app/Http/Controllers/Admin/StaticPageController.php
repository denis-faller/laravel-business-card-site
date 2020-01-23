<?php

namespace BusinessCardSite\Http\Controllers\Admin;

use BusinessCardSite\Model\User;
use BusinessCardSite\Model\StaticPage;
use BusinessCardSite\Model\Site;
use BusinessCardSite\Http\Requests\StaticPageRequest;
use BusinessCardSite\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/** 
 * Контроллер для работы со статической страницы
 */

class StaticPageController extends Controller
{
    /**
    * Возвращает представление страницы отображения статических страниц
    * @return Illuminate\Support\Facades\View
    */  
    public function index()
    {
        $pages = StaticPage::all();
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
    * @return Illuminate\Routing\Redirector
    */  
    public function store(StaticPageRequest $request)
    {   
        $page = new StaticPage();
        $page->site_id = Site::MAIN_SITE_ID;
        $page->name = $request->name;
        $page->description = $request->description;
        $page->url = $request->url;
        $page->html = $request->html;
        $page->save();
        
        return redirect(route('admin.StaticPage.index'));
    }
    
    /**
    * Возвращает представление страницы редактирования статической страницы
    * @return Illuminate\Support\Facades\View
    */  
    public function edit(StaticPage $page)
    {
        view()->share(['title' => 'Редактирование статической страницы', 'description' => 'Редактирование статической страницы сайта']);
        return view('admin.staticPage.edit', ['page' => $page]);
    }
    
    /**
    * Обновляет статическую страницу
    * @param Illuminate\Http\StaticPageRequest $request
    * @param BusinessCardSite\Model\StaticPage $page
    * @return Illuminate\Routing\Redirector
    */  
    public function update(StaticPageRequest $request, StaticPage $page)
    {   
        $page->site_id = Site::MAIN_SITE_ID;
        $page->name = $request->name;
        $page->description = $request->description;
        $page->url = $request->url;
        $page->html = $request->html;
        $page->save();
        
        return redirect(route('admin.StaticPage.index'));
    }
    
    /**
    * Удаляет статическую страницу
    * @param BusinessCardSite\Model\StaticPage $page
    * @return Illuminate\Http\Response
    */  
    public function destroy(StaticPage $page)
    {   
        $page->delete();

        return response('OK', 200);
    }
}