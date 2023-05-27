<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('users')->insert([
            [
                'name'	=>  'システム管理者',
                'email'		=>	'admin@bookrecord.com',
                'password'			=> bcrypt('password'),
                'current_team_id' => 1,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'	=>  '多田 かずみ',
                'email'		=>	'tada_1218@example.com',
                'password'			=> bcrypt('password'),
                'current_team_id' => 1,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'	=>  '岡本 洋明',
                'email'		=>	'okamoto216@example.jp',
                'password'			=> bcrypt('password'),
                'current_team_id' => 3,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'	=>  '横田 彩',
                'email'		=>	'yokota826@example.net',
                'password'			=> bcrypt('password'),
                'current_team_id' => 4,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'	=>  '馬場 晃久',
                'email'		=>	'akihisa_baba@example.co.jp',
                'password'			=> bcrypt('password'),
                'current_team_id' => 1,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
        
        ]);
        \App\Models\User::factory(10)->create();
        
    }
}
