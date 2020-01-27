<?php

namespace Tests\Feature;

use BusinessCardSite\Services\StaticPageService;
use BusinessCardSite\Models\User;
use BusinessCardSite\Models\StaticPage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

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

        DB::table('static_pages')->where('url', '=', $url)->delete();
    }
    
    /**
     * Тест проверяет обновление новой страницы
     * @return void
     */
    public function testUpdate()
    {
        $id = DB::table('static_pages')->insertGetId(
            ['site_id' => 1, 'name' => 'История компании', 'description' => 'История компании', 'url' => 'history', 'html' => '<p>История компании</p>']
        );
        
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
        
        DB::table('static_pages')->where('id', '=', $id)->delete();
    }
    
    /**
     * Тест проверяет удаление новой страницы
     * @return void
     */
    public function testDelete()
    {
        $id = DB::table('static_pages')->insertGetId(
            ['site_id' => 1, 'name' => 'История компании', 'description' => 'История компании', 'url' => 'history', 'html' => '<p>История компании</p>']
        );
        
        $user = User::find(User::ID_ADMIN);

        $response = $this->actingAs($user)
                         ->get(route("admin.StaticPage.index"));
        
        $response = $this->delete(route("admin.StaticPage.destroy", $id));
        
        $response->assertStatus(200);
        
        $this->assertDatabaseMissing('static_pages', ['id' => $id]);
    }
}
