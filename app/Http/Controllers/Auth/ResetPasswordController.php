<?php

namespace BusinessCardSite\Http\Controllers\Auth;

use BusinessCardSite\Http\Controllers\Controller;
use BusinessCardSite\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
        view()->share(['title' => 'Сброс пароля', 'description' => 'Сброс пароля к сайту']);
    }
}
