<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert (
            [
                [ 'language'=>'HTML'],
                [ 'language'=>'CSS'],
                [ 'language'=>'Javascript'],
                [ 'language'=>'PHP'],
                [ 'language'=>'Laravel'],
                [ 'language'=>'SQL'],
                [ 'language'=>'SHELL'],
                [ 'language'=>'その他']
            ]
        );
    }
}
