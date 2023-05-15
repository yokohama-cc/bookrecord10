<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Membership;
use App\Models\User;

class TeamUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('team_user')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $users = User::all();
        foreach ($users as $user) {
            if ($user->id != 1) {
            \App\Models\Membership::factory()->create([
                'user_id' => $user->id,
                 ]);}
                }
    }
}
