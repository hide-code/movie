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
                'avatar' => 'https://1.bp.blogspot.com/-ZOg0qAG4ewU/Xub_uw6q0DI/AAAAAAABZio/MshyuVBpHUgaOKJtL47LmVkCf5Vge6MQQCNcBGAsYHQ/s400/pose_pien_uruuru_woman.png',
                'comment' => '仲の良い友達がいれば何もいらない!!世界でいちばん視聴されたコメディドラマ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => '1',
                'title' => 'フルハウス',
                'avatar' => 'https://1.bp.blogspot.com/-ZOg0qAG4ewU/Xub_uw6q0DI/AAAAAAABZio/MshyuVBpHUgaOKJtL47LmVkCf5Vge6MQQCNcBGAsYHQ/s400/pose_pien_uruuru_woman.png',
                'comment' => 'こんな家族になりたい!!心温まるファミリードラマ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => '1',
                'title' => 'スパイダーマン（マーベル）',
                'avatar' => 'https://1.bp.blogspot.com/-ZOg0qAG4ewU/Xub_uw6q0DI/AAAAAAABZio/MshyuVBpHUgaOKJtL47LmVkCf5Vge6MQQCNcBGAsYHQ/s400/pose_pien_uruuru_woman.png',
                'comment' => 'トム・ホランドがドンピシャでハマっている、まじで見た目がスパイダーマン',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => '1',
                'title' => 'スパイダーマン(元祖)',
                'avatar' => 'https://1.bp.blogspot.com/-ZOg0qAG4ewU/Xub_uw6q0DI/AAAAAAABZio/MshyuVBpHUgaOKJtL47LmVkCf5Vge6MQQCNcBGAsYHQ/s400/pose_pien_uruuru_woman.png',
                'comment' => 'ヒーロー映画なのに何故か深い',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => '1',
                'title' => 'スパイダーマン(元祖)',
                'avatar' => 'https://1.bp.blogspot.com/-ZOg0qAG4ewU/Xub_uw6q0DI/AAAAAAABZio/MshyuVBpHUgaOKJtL47LmVkCf5Vge6MQQCNcBGAsYHQ/s400/pose_pien_uruuru_woman.png',
                'comment' => 'ヒーロー映画なのに何故か深い',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => '1',
                'title' => 'スパイダーマン(元祖)',
                'avatar' => 'https://1.bp.blogspot.com/-ZOg0qAG4ewU/Xub_uw6q0DI/AAAAAAABZio/MshyuVBpHUgaOKJtL47LmVkCf5Vge6MQQCNcBGAsYHQ/s400/pose_pien_uruuru_woman.png',
                'comment' => 'ヒーロー映画なのに何故か深い',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => '1',
                'title' => 'スパイダーマン(元祖)',
                'avatar' => 'https://1.bp.blogspot.com/-ZOg0qAG4ewU/Xub_uw6q0DI/AAAAAAABZio/MshyuVBpHUgaOKJtL47LmVkCf5Vge6MQQCNcBGAsYHQ/s400/pose_pien_uruuru_woman.png',
                'comment' => 'ヒーロー映画なのに何故か深い',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

