<?php

namespace Tests\Unit;

use App\Http\Controllers\Content\StoreContentController;
use App\Models\User;
use Database\Seeders\CategoriesTableSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

/**
 * StoreContentControllerTest class
 */
class StoreContentControllerTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var StoreContentController
     */

    /**
     * set up
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->seed(CategoriesTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * @test
    */
    public function コンテンツ一覧ページにリダイレクトすること()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/content', [
            'title' => 'タイトル',
            'comment' => 'コメント' ,
            'avatar' => UploadedFile::fake()->image('photo1.jpg'),
            'category_ids' => [
                0 => 1
            ]
        ]);

        $response->assertRedirect('/content');
    }

    /**
     * @test
    */
    public function ログイン指定な状態であくせあくせにリダイレクトすること()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/content', [
            'title' => 'タイトル',
            'comment' => 'コメント' ,
            'avatar' => UploadedFile::fake()->image('photo1.jpg'),
            'category_ids' => [
                0 => 1
            ]
        ]);

        $response->assertRedirect('/content');
    }
}