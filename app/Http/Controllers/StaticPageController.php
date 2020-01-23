<?php

namespace BusinessCardSite\Http\Controllers;

use BusinessCardSite\Model\StaticPage;
use BusinessCardSite\Model\Site;
use BusinessCardSite\Http\Requests\StaticPageRequest;
use BusinessCardSite\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/** 
 * Контроллер для вывода контента страницы
 */

class StaticPageController extends Controller
{
    
    /**
    * Возвращает представление главной страницы
    * @return Illuminate\Support\Facades\View
    */  
    public function index()
    {        
        $mainPage = StaticPage::find(StaticPage::MAIN_PAGE_ID);
        return view('index', ['content' => $mainPage]);
    }

    /**
    * Возвращает представление статической страницы
    * @param string $url
    * @return Illuminate\Support\Facades\View
    */  
    
    public function show($url)
    {        
        $page = StaticPage::where('url', $url)->first();
        
        if(isset($page)){       
            return view('index', ['content' => $page]);
        }
        else{
            abort(404);
        }
    }
}