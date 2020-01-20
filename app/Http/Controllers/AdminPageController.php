<?php

namespace BusinessCardSite\Http\Controllers;

use BusinessCardSite\Model\User;
use BusinessCardSite\Model\StaticPage;
use BusinessCardSite\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/** 
 * Контроллер для обработки админки
 */

class AdminPageController extends Controller
{
    /**
    * Возвращает представление админки
    * @return Illuminate\Routing\Redirector
    * @return Illuminate\Support\Facades\View
    */  
    
    public function index()
    {
        $pages = StaticPage::all();
        view()->share(['title' => 'Админка', 'description' => 'Админка сайта']);
        return view('admin', ['pages' => $pages, 'mainPageId' => StaticPage::MAIN_PAGE_ID]);
    }
}