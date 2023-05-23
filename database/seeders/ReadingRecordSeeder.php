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
                'reader_id'		=>	7,
                'year_read'		=> 2023,
                'month_read'    => 04,
                'report'		=>'とてもおもしろくて引き込まれました。',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'book_id'	=>  1,
                'reader_id'		=>	5,
                'year_read'		=> 2023,
                'month_read'    => 05,
                'report'		=>'格エピソードで視点となる人物が変わるが、登場人物が多くそれぞれの背景が浅いので、人物像が印象に残らない。
                内容も刺激的ではあるが、誰にも感情移入できなかった。
                映像にすると、そのわかりにくさが解消されていいのかもしれない。',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'book_id'	=>  1,
                'reader_id'		=>	6,
                'year_read'		=> 2021,
                'month_read'    => 02,
                'report'		=>'ドラマが面白かったので原作を読みたくなって購入。一気に読み上げました。ちょっと毛色の異なる警察小説でありミステリーです。',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'book_id'	=>  2,
                'reader_id'		=>	7,
                'year_read'		=> 2023,
                'month_read'    => 05,
                'report'		=>'辻村さんの作品初めて手に取りました
                全体的にちょっとわかりづらかったけどテンポはよく見れました
                人間の表と裏みたいな部分がかきたかったのかな。
                いろんな感情や場面いりまじってごちゃになる。。。主人公真美と婚約者西澤のことばのやりとりにどきどきしました。真美の過去や西澤元恋人までさかのぼって話が変化するのが面白かった',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'book_id'	=>  2,
                'reader_id'		=>	8,
                'year_read'		=> 2023,
                'month_read'    => 05,
                'report'		=>'読みやすく面白かったです。
                ただ、主人公の架（男性）の描写には違和感があります。私だ男性だからかもしれませんが、男性ならこういうふうには考えないよな・・・という所が所々にあったし、女性からみえる男性心理というのは、こいう感じなのかな・・・と少し冷静になってしまう自分がいました。',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'book_id'	=>  2,
                'reader_id'		=>	9,
                'year_read'		=> 2023,
                'month_read'    => 05,
                'report'		=>'自分は、リアルに婚活中でもあり、主人公たちの気持ちがとてもわかりました。
                結婚相談所に登録して、婚活していたときのもやもやしてた気持ち…結婚に向いていないのでは？と思い、２ヶ月で辞めた結婚相談所笑　つらくてつらくて、なんでこんなに自分は人を好きになれないのか？まさに、主人公のたちの、気持ちがわかりました。',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'book_id'	=>  3,
                'reader_id'		=>	7,
                'year_read'		=> 2023,
                'month_read'    => 05,
                'report'		=>'帯にも記載されていますが、本当にネタバレ厳禁です。面白さ激減してしまいます。紙書籍の良さを最大限活用されていて感服しました。ラストにはホッコリ。',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'book_id'	=>  3,
                'reader_id'		=>	5,
                'year_read'		=> 2023,
                'month_read'    => 05,
                'report'		=>'本書は、非常に読みやすいミステリー小説となっている。
                各登場人物についても心理描写、情景描写など、どれもシンプルでわかりやすいです。
                後半に差し掛かり、謎解きが本書の中で繰り広げられますが、いつの間にかその謎解きに自身も溶け込み、巻き込まれていることに気づきました。
                これだけシンプルな表現で読み手をここまで惹きつけることができる作品は少ないと思います。',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'book_id'	=>  3,
                'reader_id'		=>	6,
                'year_read'		=> 2023,
                'month_read'    => 05,
                'report'		=>'腰巻きに「予測不能の衝撃のラスト」とありますが、確かに「衝撃」でした。ミステリには、まだ「まったく新しい」仕掛けがあるのだと心底驚かされました。
                この作品は、物語としての深みや語り口の技巧といった要素を潔く切り捨てて、ひたすらこの仕掛けに収斂するように設計されています。正直、繰り返し読み返すかといったらそんなことはないと思いますが、初見で仕掛けに気づいた時は、１冊まるごと見返しました。きっとみなさんそうしたくなると思います。',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'book_id'	=>  4,
                'reader_id'		=>	4,
                'year_read'		=> 2023,
                'month_read'    => 05,
                'report'		=>'山手線の広告を見て御神木の物語かなと思い初めての東野圭吾体験でした。
                推理作家の豊かな経験が生かされた芳醇な物語だと思います。この本が読まれていると知ってまだまだ日本は大丈夫だと感じました。
                ただカレーの後片付けは結構大変だなと思います。',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'book_id'	=>  4,
                'reader_id'		=>	5,
                'year_read'		=> 2023,
                'month_read'    => 05,
                'report'		=>'悲惨な殺人事件は起きませんが、とても引き込まれ、後半は一気に読んでしまいました。',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'book_id'	=>  4,
                'reader_id'		=>	6,
                'year_read'		=> 2023,
                'month_read'    => 05,
                'report'		=>'読み終えて 心が温かくなりました。
                東野圭吾さんはやっぱり最高！',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
        ]);
        \App\Models\ReadingRecord::factory(50)->create();
    }
}
