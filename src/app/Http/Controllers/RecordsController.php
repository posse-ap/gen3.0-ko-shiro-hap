<?php

namespace App\Http\Controllers;

// 追記
use App\Record;
use Carbon\Carbon;

use Illuminate\Http\Request;

class RecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 今日の学習時間
        $today_study_time = Record::whereDate('study_date', '=', date('Y-m-d'))->sum('study_time');

        // 月の学習時間
        $month_study_time = Record::whereYear('study_date', date('Y'))->whereMonth('study_date', date('m'))->sum('study_time');

        // 合計学習時間
        $total_study_time = Record::sum('study_time');

        $time_records = [
            'today_study_time' => $today_study_time,
            'month_study_time' => $month_study_time,
            'total_study_time' => $total_study_time,
        ];

        // 棒グラフのデータを取得 全ての合計を選択->今月に絞る->日毎にgroupBy->配列で返す
        $bar_data = Record::selectRaw("SUM(study_time) as sum")
        ->whereYear('study_date', date('Y'))->whereMonth('study_date', date('m'))
        ->groupBy('study_date')
        ->pluck("sum");
        // dd($bar_data);

        $chart_data = [
            'bar_data' => $bar_data,
        ];

        return view('top.index', ['time_records' => $time_records, 'chart_data' => $chart_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}