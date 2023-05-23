<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('teams')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('teams')->insert([
            [
                'name'	=>  '多田ゼミ（文学）',
                'user_id' => 2,
                'personal_team' => false,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'	=>  '多田ゼミ（臨床教育）',
                'user_id' => 2,
                'personal_team' => false,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'	=>  '岡本ゼミ',
                'user_id' => 3,
                'personal_team' => false,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'	=>  '横田ゼミ',
                'user_id' => 4,
                'personal_team' => false,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'	=>  '所属前',
                'user_id' => 1,
                'personal_team' => false,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            
        ]);
    }
}
