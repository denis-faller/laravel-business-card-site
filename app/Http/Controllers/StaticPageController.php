<?php

namespace BusinessCardSite\Http\Controllers;

use BusinessCardSite\Services\StaticPageService;
use BusinessCardSite\Models\StaticPage;

/** 
 * Контроллер для вывода контента страницы
 */

class StaticPageController extends Controller
{
    
    /**
    * Возвращает представление главной страницы
    * @param StaticPageService $service
    * @return Illuminate\Support\Facades\View
    */  
    public function index(StaticPageService $service)
    {        
        $mainPage = $service->find(StaticPage::MAIN_PAGE_ID);
        
        return view('index', ['content' => $mainPage]);
    }

    /**
    * Возвращает представление статической страницы
    * @param string $url
    * @param StaticPageService $service
    * @return Illuminate\Support\Facades\View
    */  
    
    public function show($url, StaticPageService $service)
    {        
        $page = $service->findByUrl($url);
        
        if(isset($page)){       
            return view('index', ['content' => $page]);
        }
        else{
            abort(404);
        }
    }
}