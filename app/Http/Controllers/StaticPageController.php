<?php

namespace BusinessCardSite\Http\Controllers;

use BusinessCardSite\Model\StaticPage;
use BusinessCardSite\Model\Site;
use BusinessCardSite\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/** 
 * Контроллер для обработки статической страницы
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
    
    /**
    * Создает статическую страницу
    * @param Illuminate\Http\Request $request
    * @return Illuminate\Routing\Redirector
    */  
    
    public function create(Request $request)
    {   
        $messages = array(
            'required' => 'Поле :attribute должно быть заполнено.',
            'unique' => 'Страница с таким :attribute уже существует.',
        );
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'url' => 'required|unique:static_pages|max:255',
            'html' => 'required',
        ], $messages);

        if ($validator->fails()) {
          return redirect('/admin/static-page/create/show/')
            ->withInput()
            ->withErrors($validator);
        }
        
        $this->authorize('create', StaticPage::class);
        
        $page = new StaticPage();
        $page->site_id = Site::MAIN_SITE_ID;
        $page->name = $request->name;
        $page->description = $request->description;
        $page->url = $request->url;
        $page->html = $request->html;
        $page->save();
        
        return redirect('/admin');
    }
    
    /**
    * Создает статическую страницу
    * @param Illuminate\Http\Request $request
    * @return Illuminate\Routing\Redirector
    */  
    
    public function edit(Request $request, StaticPage $page)
    {   
        $messages = array(
            'required' => 'Поле :attribute должно быть заполнено.',
            'unique' => 'Страница с таким :attribute уже существует.',
        );
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'url' => "required|unique:static_pages,url,{$page->id} |max:255",
            'html' => 'required',
        ], $messages);

        if ($validator->fails()) {
          return redirect()
            ->route('adminStaticPageEdit', ['id' => $page->id] )
            ->withInput()
            ->withErrors($validator);
        }
        
        $this->authorize('update',  $page);
        
        $page->site_id = Site::MAIN_SITE_ID;
        $page->name = $request->name;
        $page->description = $request->description;
        $page->url = $request->url;
        $page->html = $request->html;
        $page->save();
        
        return redirect('/admin');
    }
}