<?php

namespace BusinessCardSite\Http\Controllers\Auth;

use BusinessCardSite\Http\Controllers\Controller;
use BusinessCardSite\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ConfirmsPasswords;

class ConfirmPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Confirm Password Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password confirmations and
    | uses a simple trait to include the behavior. You're free to explore
    | this trait and override any functions that require customization.
    |
    */

    use ConfirmsPasswords;

    /**
     * Where to redirect users when the intended url fails.
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
        $this->middleware('auth');
        view()->share(['title' => 'Сброс пароля', 'description' => 'Сброс пароля к сайту']);
    }
}
