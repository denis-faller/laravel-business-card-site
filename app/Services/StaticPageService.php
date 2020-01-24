<?php

namespace BusinessCardSite\Services;

use BusinessCardSite\Repositories\StaticPageRepository;

/** 
 * Класс сервиса сайта
 */
class StaticPageService extends BaseService
{
    /**
    * Конструктор сервиса
    * @param StaticPageRepository $pageRepository
    */ 
   public function __construct(StaticPageRepository $pageRepository)
   {
       $this->repo = $pageRepository;
   }
   
    /**
    * Находит элемент модели по url
    * @param string $url
    * @return BusinessCardSite\Model
    */  
    public function findByUrl($url)
    {
        return $this->repo->findByUrl($url);
    }
}