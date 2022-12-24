<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryContentTableSeeder extends Seeder
{
    public function run()
    {
      DB::table('category_content')->truncate();
      DB::table('category_content')->insert([
          [
              'category_id' => '1',
              'content_id' => '1',
          ],
          [
              'category_id' => '2',
              'content_id' => '1',
          ],
          [
              'category_id' => '1',
              'content_id' => '2',
          ],
          [
              'category_id' => '3',
              'content_id' => '3',
          ],
          [
              'category_id' => '1',
              'content_id' => '4',
          ],
          [
              'category_id' => '2',
              'content_id' => '5',
          ],
          [
              'category_id' => '2',
              'content_id' => '6',
          ],
          [
              'category_id' => '1',
              'content_id' => '6',
          ],
          [
              'category_id' => '1',
              'content_id' => '7',
          ],

      ]);
    }
}