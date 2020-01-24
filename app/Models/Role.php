<?php

namespace BusinessCardSite\Models;

use Illuminate\Database\Eloquent\Model;
use BusinessCardSite\Models\User;

class Role extends Model
{
    // Роль админа
    const ROLE_ADMIN = 1;
    
    /**
    * Проверяет пользователя на роль админа
    * @param int $userID
    * @return boolean
    */
    public static function isAdmin($userID){
        $roles = User::find($userID)->roles;
        foreach($roles as $role){
          if($role->id == self::ROLE_ADMIN){
              return true;
          }
        }
        return false;
    }
    
}
