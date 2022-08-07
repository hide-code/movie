<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contents')->truncate();
        DB::table('contents')->insert([
            [
                'user_id' => '1',
                'title' => 'フレンズ',
                'avatar' => '',
                'comment' => '仲の良い友達がいれば何もいらない!!世界でいちばん視聴されたコメディドラマ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => '1',
                'title' => 'フルハウス',
                'avatar' => '',
                'comment' => 'こんな家族になりたい!!心温まるファミリードラマ',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

