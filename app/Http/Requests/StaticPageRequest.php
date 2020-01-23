<?php

namespace BusinessCardSite\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/** 
 * Класс запроса по работе со статистической страницы
 */
class StaticPageRequest extends FormRequest
{
    /**
     * Правила валидации запроса статистической страницы
     * @return array
     */
    public function rules()
    {
        $urlRule = "";
        if($this->url() == route('admin.StaticPage.store')){
            $urlRule = "required|unique:static_pages|max:255";
        }
        elseif($this->url() == route('admin.StaticPage.update', $this->page->id)){
            $urlRule = "required|unique:static_pages,url,{$this->page->id}|max:255";
        }
        
        return [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'url' => $urlRule,
            'html' => 'required',
        ];
    }
    
    /**
    * Сообщения для валидации запроса статистической страницы
    * @return array
    */
    public function messages()
    {
        return [
            'required' => 'Поле :attribute должно быть заполнено.',
            'unique' => 'Страница с таким :attribute уже существует.',
        ];
    }
}
