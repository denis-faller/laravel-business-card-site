<?php

namespace BusinessCardSite\Services;

/** 
 * Абстрактный класс сервиса
 */
abstract class BaseService
{
    /**
    * Экземпляр репозитория
    * @var BaseRepository
    */
    protected $repo;

    /**
    * Возвращает все элементы модели
    * @return BusinessCardSite\Model
    */  
    public function all()
    {
        return $this->repo->all();
    }

    /**
    * Возвращает элементы модели постранично
    * @return BusinessCardSite\Model
    */  
    public function paginated()
    {
        return $this->repo->paginated(config('paginate'));
    }
    
   /**
    * Создает элемент модели
    * @param array $input
    * @return BusinessCardSite\Model
    */  
    public function create(array $input)
    {
        return $this->repo->create($input);
    }
    
    /**
    * Находит элемент модели
    * @param int $id
    * @return BusinessCardSite\Model
    */  
    public function find($id)
    {
        return $this->repo->find($id);
    }

    /**
    * Обновляет элемент модели
    * @param int $id
    * @param array $input
    * @return BusinessCardSite\Model
    */ 
    public function update($id, array $input)
    {
        return $this->repo->update($id, $input);
    }
    
    /**
    * Удаляет элемент модели
    * @param int $id
    * @return BusinessCardSite\Model
    */ 
    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }
}