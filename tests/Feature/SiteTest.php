<?php

namespace Tests\Feature;

use BusinessCardSite\Model\User;
use BusinessCardSite\Model\Site;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SiteTest extends TestCase
{
    /**
     * Тест проверяет отображение страницы информации о сайте
     * @return void
     */
    public function testView()
    {
        $user = User::find(User::ID_ADMIN);

        $response = $this->actingAs($user)
                        ->get(route('admin.Site.index'));
        
        $response->assertStatus(200);
        
        $this->assertDatabaseHas('sites', ['id' => Site::MAIN_SITE_ID]);
    }
    
     /**
     * Тест проверяет обновление информации о сайте
     * @return void
     */
    public function testUpdate()
    {
        $id = Site::MAIN_SITE_ID;
        
        $site = Site::find(Site::MAIN_SITE_ID);
        
        $user = User::find(User::ID_ADMIN);

        $response = $this->actingAs($user)
                        ->get(route('admin.Site.index'));
        
        $response = $this->patch(route("admin.StaticPage.update", $id), [
            'name' => $site->name
        ]);
        
        $response->assertLocation(route('admin.Site.index'));
        
        $this->assertDatabaseHas('sites', ['id' => $id]);
    }
}
