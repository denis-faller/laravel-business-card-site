<?php

namespace BusinessCardSite\Http\Middleware;

use Closure;
use BusinessCardSite\Model\Role;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     * Проверяет пользователя на роль админа
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * @return Illuminate\Routing\Redirector
     */
    public function handle($request, Closure $next)
    {
        $userID = Auth::id();
        if(Role::isAdmin($userID)){
            return $next($request);
        }
        return redirect('/login');
    }
}
