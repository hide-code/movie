<?php

namespace Tests\Unit;

use App\Models\Content;
use App\Models\User;
use Database\Seeders\CategoriesTableSeeder;
use Domain\Service\UseCase\Content\StoreContent;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

/**
 * StoreContentTest class
 */
class StoreContentTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var StoreContent
     */
    private $useCase;

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
    public function コンテンツを一件作成できること()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $useCase = new StoreContent(new Content());
        $useCase
        (
            'タイトル',
            'コメント' ,
            UploadedFile::fake()->image('photo1.jpg'),
            [1]
        );

        $this->assertDatabaseHas('contents', [
            'title' => 'タイトル',
            'comment' => 'コメント'
        ]);
    }

    /**
     * @test
    */
    public function 複数カテゴリーのコンテンツを一件作成できること()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $useCase = new StoreContent(new Content());
        $useCase
        (
            'タイトル',
            'コメント' ,
            UploadedFile::fake()->image('photo1.jpg'),
            [1, 2]
        );

        $this->assertDatabaseCount('category_content', 2);
    }
}
