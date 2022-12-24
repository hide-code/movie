<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'name' => '',
                'email' => 'hoge@gmail.com',
                'password' => 'hogehoge',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
