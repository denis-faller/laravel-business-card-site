<?php

namespace BusinessCardSite\Http\Controllers\Admin;

use BusinessCardSite\Model\User;
use BusinessCardSite\Model\StaticPage;
use BusinessCardSite\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/** 
 * Контроллер для обработки админки статической страницы
 */

class StaticPageController extends Controller
{
    /**
    * Возвращает представление страницы создания статистической страницы
    * @return Illuminate\Support\Facades\View
    */  
    
    public function create()
    {
        view()->share(['title' => 'Создание статической страницы', 'description' => 'Создание статической страницы сайта']);
        return view('adminStaticPageCreate', ['url' => '/admin/static-page/create/']);
    }
    
    /**
    * Возвращает представление страницы редактирования статистической страницы
    * @return Illuminate\Support\Facades\View
    */  
    
    public function edit($id)
    {
        $page = StaticPage::findOrFail($id);
        view()->share(['title' => 'Редактирование статической страницы', 'description' => 'Редактирование статической страницы сайта']);
        return view('adminStaticPageEdit', ['page' => $page,'url' => "/admin/static-page/edit/{$page->id}"]);
    }
}