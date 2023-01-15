<?php

namespace Tests\Requests;

use App\Http\Requests\Content\ContentRequest;
use Database\Seeders\CategoriesTableSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ContentRequestTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var ContentRequest
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
     * ContentRequestテスト
     *
     * @test
     * @dataProvider validationProvider
     * @param array $params
     * @param boolean $expected
     * @return void
     */
    public function validation(array $params, bool $expected)
    {
        $request = new ContentRequest();
        $rules = $request->rules();
        $validator = Validator::make($params, $rules);
        $result = $validator->passes();
        $this->assertEquals($expected, $result);
    }

     /**
     * バリデーションチェック用データ
     *
     * @return void
     */
    public function validationProvider()
    {
        return [
            '通常のリクエストが通ること' => [
                [
                    'title' => 'タイトル',
                    'comment' => 'コメント' ,
                    'avatar' => UploadedFile::fake()->image('photo1.jpg'),
                    'category_ids' => [
                        0 => 1
                    ]
                ],
                true,
            ],
            'タイトルがnullだとバリデーションエラーになること' => [
                [
                    'title' => null,
                    'comment' => 'コメント' ,
                    'avatar' => UploadedFile::fake()->image('photo1.jpg'),
                    'category_ids' => [
                        0 => 1
                    ]
                ],
                false,
            ],
            'タイトルが50文字以上だとバリデーションエラーになること' => [
                [
                    'title' => mt_rand(51),
                    'comment' => 'コメント' ,
                    'avatar' => UploadedFile::fake()->image('photo1.jpg'),
                    'category_ids' => [
                        0 => 1
                    ]
                ],
                false,
            ],
        ];
    }
}
