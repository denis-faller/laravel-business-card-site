<?php

namespace BusinessCardSite\Http\Controllers;

use BusinessCardSite\Model\StaticPage;
use BusinessCardSite\Http\Controllers\Controller;

/** 
 * Контроллер для обработки статической страницы
 */

class StaticPageController extends Controller
{
    /**
    * Возвращает представление статической страницы
    * @param string $url
    * @return Illuminate\Support\Facades\View
    */  
    
    public function show($url = null)
    {
        if($url == null){
            $mainPage = StaticPage::find(1);
            return view('index', ['content' => $mainPage]);
        }
        
        $page = StaticPage::where('url', $url)->first();
        
        if(isset($page)){       
            return view('index', ['content' => $page]);
        }
        else{
            abort(404);
        }
    }
}