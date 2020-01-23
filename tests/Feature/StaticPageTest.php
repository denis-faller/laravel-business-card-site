<?php

namespace Tests\Feature;

use BusinessCardSite\Model\User;
use BusinessCardSite\Model\StaticPage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use DB;

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
                        ->get('/admin');
        
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
                         ->get('/admin/static-page/create/show/');
        
        $url = $this->faker->word();
        $response = $this->post('/admin/static-page/create/', [
            'name' => $this->faker->company(),
            'description' => $this->faker->company(),
            'url' => $url,
            'html' => $this->faker->company(),
        ]);
        
        $response->assertLocation('/admin');
        
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
                         ->get("/admin/static-page/edit/show/$id");
        
        $response = $this->post("/admin/static-page/edit/$id", [
            'name' => $this->faker->company(),
            'description' => $this->faker->company(),
            'url' => $this->faker->word(),
            'html' => $this->faker->company(),
        ]);
        
        $response->assertLocation('/admin');
        
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
                         ->get("/admin");
        
        $response = $this->delete("/admin/static-page/delete/$id");
        
        $response->assertStatus(200);
        
        $this->assertDatabaseMissing('static_pages', ['id' => $id]);
    }
}
