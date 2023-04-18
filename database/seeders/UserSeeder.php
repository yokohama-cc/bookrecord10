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
        /*DB::table('users')->insert([
            [
                'name'	=>  'システム管理者',
                'email'		=>	'admin@bookrecord.com',
                'password'			=> bcrypt('sayakakenta'),
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
        
        ]);*/
        \App\Models\User::factory(10)->create();
        
    }
}
