<?php

namespace BusinessCardSite\Models;

use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    // id главной страницы
    const MAIN_PAGE_ID = 1;
    
    protected $fillable = array('site_id', 'name', 'description', 'url', 'html');
}
