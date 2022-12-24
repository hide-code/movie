<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        DB::table('categories')->insert([
            [
                'name' => 'ドラマ',
            ],
            [
                'name' => '映画',
            ],
            [
                'name' => 'アクション',
            ],
            [
                'name' => 'アドベンチャー',
            ],
            [
                'name' => 'コメディ',
            ],
            [
                'name' => 'ミュージカル',
            ],
            [
                'name' => 'SF',
            ],
            [
                'name' => 'サスペンス',
            ],
            [
                'name' => 'ミステリー',
            ],
            [
                'name' => 'その他',
            ],
        ]);
    }
}
