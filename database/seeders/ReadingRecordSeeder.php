<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class ReadingRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reading_records')->truncate();
        DB::table('reading_records')->insert([
            [
                'book_id'	=>  1,
                'reader_id'		=>	1,
                'year_read'		=> 2018,
                'month_read'    => 02,
                'report'		=>'私達の１円でも安いものを買うという行動が格差を広げてしまうということを知り心が痛んだ。',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ]
        ]);
        \App\Models\ReadingRecord::factory(100)->create();
    }
}
