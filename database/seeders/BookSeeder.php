<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('books')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('books')->insert([
            [
                'name'	=>  '教場',
                'author' => '長岡 弘樹',
                'company' => '小学館文庫',
                'year_publication' => 2015,
                'isbn' => 9784094062403,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'	=>  '傲慢と善良',
                'author' => '辻村 深月',
                'company' => '朝日新聞出版',
                'year_publication' => 2022,
                'isbn' => 9784022650597,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'	=>  '世界でいちばん透きとおった物語',
                'author' => '杉井 光',
                'company' => '新潮文庫',
                'year_publication' => 2023,
                'isbn' => 9784101802626,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'	=>  'クスノキの番人',
                'author' => '東野 圭吾',
                'company' => '実業之日本社文庫',
                'year_publication' => 2023,
                'isbn' => 9784408558035,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'	=>  '能面検事',
                'author' => '中山 七里',
                'company' => '光文社文庫',
                'year_publication' => 2020,
                'isbn' => 9784334791230,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'	=>  'ロスト・ケア',
                'author' => '葉真中顕',
                'company' => '光文社文庫',
                'year_publication' => 2015,
                'isbn' => 9784334768782,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'	=>  'すぐ死ぬんだから',
                'author' => '内館 牧子',
                'company' => '講談社文庫',
                'year_publication' => 2021,
                'isbn' => 9784065245859,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'	=>  '夜は短し歩けよ乙女',
                'author' => '森見 登美彦',
                'company' => '角川文庫',
                'year_publication' => 2008,
                'isbn' => 9784043878024,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'	=>  'セカンドライフ',
                'author' => '新津 きよみ',
                'company' => '徳間書店',
                'year_publication' => 2020,
                'isbn' => 9784198945992,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'	=>  'カケラ',
                'author' => '湊 かなえ',
                'company' => '集英社文庫',
                'year_publication' => 2023,
                'isbn' => 9784087444735,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
        ]);
        
        \App\Models\Book::factory(10)->create();
    }
}
