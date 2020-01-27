<?php

namespace BusinessCardSite\Http\Controllers;

use BusinessCardSite\Models\User;
use BusinessCardSite\Models\Role;


/** 
 * Контроллер для вывода контента страницы
 */

class RoleController extends Controller
{
    /**
    * Проверяет пользователя на роль админа
    * @param int $userID
    * @return boolean
    */
    public static function isAdmin($userID){
        $roles = User::find($userID)->roles;
        foreach($roles as $role){
          if($role->id == Role::ROLE_ADMIN){
              return true;
          }
        }
        return false;
    }
}