<?php

namespace BusinessCardSite\Repositories;

use BusinessCardSite\Models\StaticPage;

/** 
 * Класс репозитория статических страниц
 */
class StaticPageRepository extends BaseRepository
{
    /**
    * Экземпляр модели статическиой страницы
    * @var StaticPage
    */ 
    protected $model;

    /**
    * Конструктор репозитория
    * @param StaticPage $page
    */ 
    public function __construct(StaticPage $page)
    {
        $this->model = $page;
    }
    
    /**
    * Находит элемент модели по url
    * @param string $url 
    * @return BusinessCardSite\Model
    */  
    public function findByUrl($url)
    {
        return $this->model->where('url', $url)->first();
    }
}