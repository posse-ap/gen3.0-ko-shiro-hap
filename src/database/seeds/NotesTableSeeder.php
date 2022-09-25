<?php

use Illuminate\Database\Seeder;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notes')->insert (
            [
                [
                    'question_id' => 1,
                    'note' => '経済産業省 2019年3月 - IT 人材需給に関する調査'
                ],
                [
                    'question_id' => 4,
                    'note' => 'Society5.0 - 科学技術政策 - 内閣府'
                ],
                [
                    'question_id' => 6,
                    'note' => 'Accenture Technology Vision 2021'
                ],
            ]
        );
    }
}