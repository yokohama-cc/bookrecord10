<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ReaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('readers')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
/*        DB::table('readers')->insert([
            [
                'name'	=>  'shu',
                'school_number'		=>	'1234567',
                'class'			=>'A',
                'user_id'		=>'1',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ]
        ]);*/
        $users = User::all();
        foreach ($users as $user) {
            
            \App\Models\Reader::factory()->create([
                'user_id' => $user->id,
                'name' => $user->name,
                 ]);    
        }
    }
}
