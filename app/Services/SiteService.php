<?php

namespace BusinessCardSite\Services;

use BusinessCardSite\Repositories\SiteRepository;

/** 
 * Класс сервиса статической страницы
 */
class SiteService extends BaseService
{    
    /**
    * Конструктор сервиса
    * @param SiteRepository $siteRepository
    */ 
   public function __construct(SiteRepository $siteRepository)
   {
       $this->repo = $siteRepository;
   }
}