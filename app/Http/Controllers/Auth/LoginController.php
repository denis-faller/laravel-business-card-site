<?php

namespace BusinessCardSite\Http\Controllers\Auth;

use BusinessCardSite\Http\Controllers\Controller;
use BusinessCardSite\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     * Установить title и description для страницы
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        view()->share(['title' => 'Авторизация', 'description' => 'Войти на сайт']);
    }
}
