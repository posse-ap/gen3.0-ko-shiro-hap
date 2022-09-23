<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Question;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert (
            [
                [
                    'question' => '日本のIT人材が2030年には最大どれくらい不足すると言われているでしょうか?',
                    'image' => 'img-quiz01.png'
                ],
                [
                    'question' => '既存業界のビジネスと、先進的なテクノロジーを結びつけて生まれた、新しいビジネスのことをなんと言うでしょう？',
                    'image' => 'img-quiz02.png'
                ],
                [
                    'question' => 'IoTとは何の略でしょう？',
                    'image' => 'img-quiz03.png'
                ],
                [
                    'question' => '日本が目指すサイバー空間とフィジカル空間を高度に融合させたシステムによって開かれる未来社会のことをなんと言うでしょうか？',
                    'image' => 'img-quiz04.png'
                ],
                [
                    'question' => 'イギリスのコンピューター科学者であるギャビン・ウッド氏が提唱した、ブロックチェーン技術を活用した「次世代分散型インターネット」のことをなんと言うでしょう？',
                    'image' => 'img-quiz05.png'
                ],
                [
                    'question' => '先進テクノロジー活用企業と出遅れた企業の収益性の差はどれくらいあると言われているでしょうか？',
                    'image' => 'img-quiz06.png'
                ],
            ]
        );
    }
}
