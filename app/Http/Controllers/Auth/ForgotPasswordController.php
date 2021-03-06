<?php

namespace BusinessCardSite\Http\Controllers\Auth;

use BusinessCardSite\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    
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
