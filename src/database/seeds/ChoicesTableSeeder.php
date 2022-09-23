<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Choice;

class ChoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('choices')->insert (
            [
                [ 'question_id' => 1,
                'choice' => '約28万人',
                'valid' => false
                ],
                [ 'question_id' => 1,
                'choice' => '約79万人',
                'valid' => true
                ],
                [ 'question_id' => 1,
                'choice' => '約183万人',
                'valid' => false
                ],
            ]
        );
    }
}
