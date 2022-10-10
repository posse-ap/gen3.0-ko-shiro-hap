<?php

namespace App\Http\Controllers;

    // 追記
    use App\Record;
    use App\Language;
    use App\Content;

use Illuminate\Http\Request;

class RecordsController extends Controller
{
    public function index()
    {
        // 今日の学習時間
        $today_study_time = Record::whereDate('study_date', '=', date('Y-m-d'))->sum('study_time');

        // 月の学習時間
        $month_study_time = Record::whereYear('study_date', date('Y'))->whereMonth('study_date', date('m'))->sum('study_time');

        // 合計学習時間
        $total_study_time = Record::sum('study_time');

        // 学習時間の変数を渡すために配列に格納
        $time_records = [
            'today_study_time' => $today_study_time,
            'month_study_time' => $month_study_time,
            'total_study_time' => $total_study_time,
        ];


        // 棒グラフのデータを取得 全ての合計を選択->今月に絞る->日毎にgroupBy->配列で返す
        $bar_data = Record::selectRaw("SUM(study_time) as sum")
        ->whereYear('study_date', date('Y'))->whereMonth('study_date', date('m'))
        ->groupBy('study_date')
        ->pluck('sum');


        // 学習言語のデータを取得
        $language_data =  Record::selectRaw("SUM(study_time) as sum")
        ->groupBy('language_id')
        ->pluck('sum');

        // 学習言語の名前を取得
        $language_names = Language::get('language');


        // 学習コンテンツのデータを取得
        $content_data =  Record::selectRaw("SUM(study_time) as sum")
        ->groupBy('content_id')
        ->pluck('sum');

        // 学習コンテンツの名前を取得
        $content_names = Content::get('content');


        // チャートの変数を渡すために配列に格納
        $chart_data = [
            'bar_data' => $bar_data,
            'language_data' => $language_data,
            'language_names' => $language_names,
            'content_data' => $content_data,
            'content_names' => $content_names,
        ];

        return view('top.index', ['time_records' => $time_records, 'chart_data' => $chart_data]);
    }
}