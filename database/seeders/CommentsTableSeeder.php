<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->truncate();
        DB::table('comments')->insert([
            [
                'content_id' => '1',
                'title' => 'セントラルパークみたいな入り浸る（コーヒーハウス）欲しい',
                'content' => 'カフェっていうとスタバみたいに仕事するところとか、インスタ映えしそうなお高いカフェが多い。なんか画一的だね。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content_id' => '1',
                'title' => 'ちょくちょく出てくるサンタの仮装',
                'content' => 'あまり日本では仮装はしないけど、ひとつくらい持っておくとユーモアが出て良いかも。',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
