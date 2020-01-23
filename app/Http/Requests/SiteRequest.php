<?php

namespace BusinessCardSite\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/** 
 * Класс запроса по работе со страницей настройки сайта
 */
class SiteRequest extends FormRequest
{
    /**
     * Правила валидации запроса страницы настройки сайта
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
        ];
    }
    
    /**
    * Сообщения для валидации запроса страницы настройки сайта
    * @return array
    */
    public function messages()
    {
        return [
            'required' => 'Поле :attribute должно быть заполнено.',
        ];
    }
}
