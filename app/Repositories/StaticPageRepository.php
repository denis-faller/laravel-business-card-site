<?php

namespace BusinessCardSite\Repositories;

use BusinessCardSite\Models\StaticPage;
use BusinessCardSite\Repositories\Traits\Sortable;

/** 
 * Класс репозитория статических страниц
 */
class StaticPageRepository extends BaseRepository
{
    use Sortable;
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