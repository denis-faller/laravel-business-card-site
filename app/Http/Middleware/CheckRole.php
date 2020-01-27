<?php

namespace BusinessCardSite\Http\Middleware;

use Closure;
use BusinessCardSite\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;

/** 
 * Посредник для проверки роли пользователя
 */
class CheckRole
{
    /**
     * Проверяет пользователя на роль админа
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * @return Illuminate\Routing\Redirector
     */
    public function handle($request, Closure $next)
    {
        $userID = Auth::id();
        if(RoleController::isAdmin($userID)){
            return $next($request);
        }
        return redirect(route('login'));
    }
}
