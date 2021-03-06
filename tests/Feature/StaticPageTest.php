<?php

namespace Tests\Feature;

use BusinessCardSite\Services\StaticPageService;
use BusinessCardSite\Models\User;
use BusinessCardSite\Models\StaticPage;
use BusinessCardSite\Models\Site;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StaticPageTest extends TestCase
{
    use WithFaker;
    
    /**
     * Тест проверяет отображение страницы админки
     * @return void
     */
    public function testView()
    {
        $user = User::find(User::ID_ADMIN);

        $response = $this->actingAs($user)
                        ->get(route("admin.StaticPage.index"));
        
        $response->assertStatus(200);
        
        $this->assertDatabaseHas('static_pages', ['id' => StaticPage::MAIN_PAGE_ID]);
    }
    
    /**
     * Тест проверяет создание новой страницы
     * @return void
     */
    public function testCreate()
    {
        $user = User::find(User::ID_ADMIN);

        $response = $this->actingAs($user)
                         ->get(route('admin.StaticPage.create'));
        
        $url = $this->faker->word();
        $response = $this->post(route('admin.StaticPage.store'), [
            'name' => $this->faker->company(),
            'description' => $this->faker->company(),
            'url' => $url,
            'html' => $this->faker->company(),
        ]);
        
        $response->assertLocation(route("admin.StaticPage.index"));
        
        $this->assertDatabaseHas('static_pages', ['url' => $url]);
        
        $service = app(StaticPageService::class);
        
        $page = $service->findByUrl($url);
        
        $service->destroy($page->id);
    }
    
    /**
     * Тест проверяет обновление новой страницы
     * @return void
     */
    public function testUpdate()
    {
        $service = app(StaticPageService::class);
        
        $page = $service->create(['site_id' => Site::MAIN_SITE_ID, 
            'name' => 'История компании', 
            'description' => 'История компании', 
            'url' => 'history', 
            'html' => '<p>История компании</p>']);
        
        $id = $page->id;
        
        $user = User::find(User::ID_ADMIN);

        $response = $this->actingAs($user)
                         ->get(route("admin.StaticPage.edit", $id));
        
        $response = $this->patch(route("admin.StaticPage.update", $id), [
            'name' => $this->faker->company(),
            'description' => $this->faker->company(),
            'url' => $this->faker->word(),
            'html' => $this->faker->company(),
        ]);
        
        $response->assertLocation(route("admin.StaticPage.index"));
        
        $this->assertDatabaseHas('static_pages', ['id' => $id]);
        
        $service->destroy($id);
    }
    
    /**
     * Тест проверяет удаление новой страницы
     * @return void
     */
    public function testDelete()
    {
        $service = app(StaticPageService::class);
        
        $page = $service->create(['site_id' => Site::MAIN_SITE_ID, 
            'name' => 'История компании', 
            'description' => 'История компании', 
            'url' => 'history', 
            'html' => '<p>История компании</p>']);
        
        $id = $page->id;
        
        $user = User::find(User::ID_ADMIN);

        $response = $this->actingAs($user)
                         ->get(route("admin.StaticPage.index"));
        
        $response = $this->delete(route("admin.StaticPage.destroy", $id));
        
        $response->assertStatus(200);
        
        $this->assertDatabaseMissing('static_pages', ['id' => $id]);
    }
}
