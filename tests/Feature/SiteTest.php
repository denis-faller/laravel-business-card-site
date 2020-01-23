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
                        ->get('/admin/site');
        
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
                        ->get('/admin/site');
        
        $response = $this->patch("/admin/site/edit/$id", [
            'name' => $site->name
        ]);
        
        $response->assertLocation('/admin/site');
        
        $this->assertDatabaseHas('sites', ['id' => $id]);
    }
}