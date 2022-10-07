<?php

use Illuminate\Database\Seeder;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contents')->insert (
            [
                [ 'content'=>'N予備校'],
                [ 'content'=>'課題'],
                [ 'content'=>'ドットインストール']
            ]
        );
    }
}
