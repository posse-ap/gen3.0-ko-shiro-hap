<?php

use Illuminate\Database\Seeder;

class RecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('records')->insert (
            [
                [ 'study_date'=>2022-10-1, 'study_time'=>2, 'language_id'=>1, 'content_id'=>1],
                [ 'study_date'=>2022-10-2, 'study_time'=>2, 'language_id'=>1, 'content_id'=>1],
                [ 'study_date'=>2022-10-3, 'study_time'=>2, 'language_id'=>1, 'content_id'=>1],
                [ 'study_date'=>2022-10-4, 'study_time'=>2, 'language_id'=>1, 'content_id'=>1],
                [ 'study_date'=>2022-10-5, 'study_time'=>2, 'language_id'=>1, 'content_id'=>1],
                [ 'study_date'=>2022-10-6, 'study_time'=>2, 'language_id'=>1, 'content_id'=>1],
                [ 'study_date'=>2022-10-7, 'study_time'=>2, 'language_id'=>1, 'content_id'=>1],
                [ 'study_date'=>2022-10-8, 'study_time'=>2, 'language_id'=>1, 'content_id'=>1],
                [ 'study_date'=>2022-10-9, 'study_time'=>2, 'language_id'=>1, 'content_id'=>1],
                [ 'study_date'=>2022-10-10, 'study_time'=>2, 'language_id'=>1, 'content_id'=>1],
                [ 'study_date'=>2022-10-11, 'study_time'=>2, 'language_id'=>1, 'content_id'=>1],
                [ 'study_date'=>2022-10-12, 'study_time'=>2, 'language_id'=>1, 'content_id'=>1],
                [ 'study_date'=>2022-10-13, 'study_time'=>2, 'language_id'=>1, 'content_id'=>1],
                [ 'study_date'=>2022-10-14, 'study_time'=>2, 'language_id'=>1, 'content_id'=>1],
                [ 'study_date'=>2022-10-15, 'study_time'=>2, 'language_id'=>1, 'content_id'=>1],
                [ 'study_date'=>2022-10-16, 'study_time'=>3, 'language_id'=>2, 'content_id'=>1],
                [ 'study_date'=>2022-10-17, 'study_time'=>4, 'language_id'=>3, 'content_id'=>1],
                [ 'study_date'=>2022-10-18, 'study_time'=>2, 'language_id'=>4, 'content_id'=>1],
                [ 'study_date'=>2022-10-19, 'study_time'=>0, 'language_id'=>1, 'content_id'=>2],
                [ 'study_date'=>2022-10-20, 'study_time'=>4, 'language_id'=>2, 'content_id'=>2],
                [ 'study_date'=>2022-10-21, 'study_time'=>2, 'language_id'=>3, 'content_id'=>2],
                [ 'study_date'=>2022-10-22, 'study_time'=>3, 'language_id'=>4, 'content_id'=>2],
                [ 'study_date'=>2022-10-23, 'study_time'=>3, 'language_id'=>1, 'content_id'=>3],
                [ 'study_date'=>2022-10-24, 'study_time'=>3, 'language_id'=>2, 'content_id'=>3],
                [ 'study_date'=>2022-10-25, 'study_time'=>2, 'language_id'=>3, 'content_id'=>3],
                [ 'study_date'=>2022-10-26, 'study_time'=>3, 'language_id'=>4, 'content_id'=>3],
                [ 'study_date'=>2022-10-27, 'study_time'=>4, 'language_id'=>1, 'content_id'=>1],
                [ 'study_date'=>2022-10-27, 'study_time'=>3, 'language_id'=>2, 'content_id'=>1],
                [ 'study_date'=>2022-10-28, 'study_time'=>3, 'language_id'=>2, 'content_id'=>3],
                [ 'study_date'=>2022-10-29, 'study_time'=>3, 'language_id'=>2, 'content_id'=>3],
                [ 'study_date'=>2022-10-30, 'study_time'=>3, 'language_id'=>2, 'content_id'=>3],
                [ 'study_date'=>2022-10-31, 'study_time'=>2, 'language_id'=>3, 'content_id'=>3]
            ]
        );
    }
}