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
              'category_id' => '5',
              'content_id' => '1',
          ],
          [
              'category_id' => '1',
              'content_id' => '2',
          ],
          [
            'category_id' => '5',
            'content_id' => '2',
          ],
          [
              'category_id' => '3',
              'content_id' => '3',
          ],
          [
              'category_id' => '4',
              'content_id' => '3',
          ],
          [
              'category_id' => '7',
              'content_id' => '3',
          ],
          [
              'category_id' => '1',
              'content_id' => '4',
          ],
          [
              'category_id' => '5',
              'content_id' => '4',
          ],
          [
              'category_id' => '8',
              'content_id' => '4',
          ],
          [
            'category_id' => '1',
            'content_id' => '5',
          ],
          [
            'category_id' => '5',
            'content_id' => '5',
          ],
          [
            'category_id' => '2',
            'content_id' => '6',
          ],
          [
            'category_id' => '6',
            'content_id' => '6',
          ],
          [
            'category_id' => '8',
            'content_id' => '6',
          ],
          [
            'category_id' => '2',
            'content_id' => '7',
          ],
          [
            'category_id' => '5',
            'content_id' => '7',
          ],
          [
            'category_id' => '2',
            'content_id' => '8',
          ],
          [
            'category_id' => '8',
            'content_id' => '8',
          ],
          [
            'category_id' => '2',
            'content_id' => '9',
          ],
          [
            'category_id' => '5',
            'content_id' => '9',
          ],
          [
            'category_id' => '2',
            'content_id' => '10',
          ],
          [
            'category_id' => '4',
            'content_id' => '10',
          ],
          [
            'category_id' => '5',
            'content_id' => '10',
          ],
          [
            'category_id' => '7',
            'content_id' => '10',
          ],
          [
            'category_id' => '2',
            'content_id' => '11',
          ],
          [
            'category_id' => '5',
            'content_id' => '11',
          ],
          [
            'category_id' => '2',
            'content_id' => '12',
          ],
          [
            'category_id' => '5',
            'content_id' => '12',
          ],
          [
            'category_id' => '1',
            'content_id' => '13',
          ],
          [
            'category_id' => '4',
            'content_id' => '13',
          ],
          [
            'category_id' => '2',
            'content_id' => '14',
          ],
          [
            'category_id' => '4',
            'content_id' => '14',
          ],
          [
            'category_id' => '2',
            'content_id' => '15',
          ],
          [
            'category_id' => '3',
            'content_id' => '15',
          ],
          [
            'category_id' => '2',
            'content_id' => '16',
          ],
          [
            'category_id' => '3',
            'content_id' => '16',
          ],
          [
            'category_id' => '4',
            'content_id' => '16',
          ],
          [
            'category_id' => '7',
            'content_id' => '16',
          ],
          [
            'category_id' => '1',
            'content_id' => '17',
          ],
          [
            'category_id' => '2',
            'content_id' => '18',
          ],
          [
            'category_id' => '3',
            'content_id' => '18',
          ],
          [
            'category_id' => '2',
            'content_id' => '19',
          ],
          [
            'category_id' => '3',
            'content_id' => '19',
          ],
          [
            'category_id' => '2',
            'content_id' => '20',
          ],
          [
            'category_id' => '2',
            'content_id' => '21',
          ],
          [
            'category_id' => '5',
            'content_id' => '21',
          ],
      ]);
    }
}