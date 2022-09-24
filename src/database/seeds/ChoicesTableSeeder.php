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
                [ 'question_id' => 2,
                'choice' => 'INTECH',
                'valid' => false
                ],
                [ 'question_id' => 2,
                'choice' => 'BIZZTECH',
                'valid' => false
                ],
                [ 'question_id' => 2,
                'choice' => 'X-TECH',
                'valid' => true
                ],
                [ 'question_id' => 3,
                'choice' => 'Internet of Things',
                'valid' => true
                ],
                [ 'question_id' => 3,
                'choice' => 'Integrate into Technology',
                'valid' => false
                ],
                [ 'question_id' => 3,
                'choice' => 'Information  on Tool',
                'valid' => false
                ],
                [ 'question_id' => 4,
                'choice' => 'Society 5.0',
                'valid' => true
                ],
                [ 'question_id' => 4,
                'choice' => 'CyPhy',
                'valid' => false
                ],
                [ 'question_id' => 4,
                'choice' => 'SDGs',
                'valid' => false
                ],
                [ 'question_id' => 5,
                'choice' => 'Web3.0',
                'valid' => true
                ],
                [ 'question_id' => 5,
                'choice' => 'NFT',
                'valid' => false
                ],
                [ 'question_id' => 5,
                'choice' => 'メタバース',
                'valid' => false
                ],
                [ 'question_id' => 6,
                'choice' => '約2倍',
                'valid' => false
                ],
                [ 'question_id' => 6,
                'choice' => '約5倍',
                'valid' => true
                ],
                [ 'question_id' => 6,
                'choice' => '約11倍',
                'valid' => false
                ],
            ]
        );
    }
}
