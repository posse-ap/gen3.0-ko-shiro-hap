@extends('layouts.main')

@section('header-button')
    <button class="button header__button" id="modal-open">記録・投稿</button>
@endsection

@section('content')
    <div class="main__left">

        <section class="time-log">
            <ul class="time-log__items">
                <li class="time-log__item">
                    <h3 class="time-log__heading">Today</h3>
                    <div class="time-log__result">{{ $time_records['today_study_time'] }}</div>
                    <div class="time-log__hour">hour</div>
                </li>
                <li class="time-log__item">
                    <h3 class="time-log__heading">Month</h3>
                    <div class="time-log__result">{{ $time_records['month_study_time'] }}</div>
                    <div class="time-log__hour">hour</div>
                </li>
                <li class="time-log__item">
                    <h3 class="time-log__heading">Total</h3>
                    <div class="time-log__result">{{ $time_records['total_study_time'] }}</div>
                    <div class="time-log__hour">hour</div>
                </li>
            </ul>
        </section>

        <div class="main__left__line"></div>

        <section class="contents__left__bar-chart bar-chart">
            <canvas id="time-log-chart"></canvas>
        </section>

    </div>

    <div class="main__right">

        <section class="about__learnings languages">
            <h2 class="about__learnings__title">学習言語</h2>
            <div class="doughnut-chart languages-chart">
                <canvas id="languages-chart"></canvas>
            </div>
        </section>

        <section class="about__learnings contents">
            <h2 class="about__learnings__title">学習コンテンツ</h2>
            <div class="doughnut-chart contents-chart">
                <canvas id="contents-chart""></canvas>
            </div>
        </section>
    </div>

    <section class="post modal" id="post-modal">
        <div class="post__close" id="modal-close"></div>
        <div class="post__inner" id="post-modal-inner">
            <div class="post__left">
                <div class="post__contents">
                    <h3 class="post__lead">学習日</h3>
                    <label for="studied-date">
                        <input class="post__text" type="input" name="date" id="studied-date">
                    </label>
                </div>
                <div class="post__learnings">
                    <h3 class="post__lead">学習コンテンツ（複数選択可）</h3>
                    <ul class="post__learnings__items">
                        <li class="post__learnings__item">
                            <Label class="checkbox" for="Nyobiko">
                                <input class="checkbox__input" type="checkbox" name="content" id="Nyobiko">
                                <span class="checkbox__text">N予備校</span>
                            </Label>
                        </li>
                        <li class="post__learnings__item">
                            <Label class="checkbox" for="dotinstall">
                                <input class="checkbox__input" type="checkbox" name="content" id="dotinstall">
                                <span class="checkbox__text">ドットインストール</span>
                            </Label>
                        </li>
                        <li class="post__learnings__item">
                            <Label class="checkbox" for="POSSEkadai">
                                <input class="checkbox__input" type="checkbox" name="content" id="POSSEkadai">
                                <span class="checkbox__text">POSSE課題</span>
                            </Label>
                        </li>
                    </ul>
                </div>
                <div class="post__learnings">
                    <h3 class="post__lead">学習言語(複数選択可)</h3>
                    <ul class="post__learnings__items">
                        <li class="post__learnings__item">
                            <Label class="checkbox" for="html">
                                <input class="checkbox__input" type="checkbox" name="language" id="html">
                                <span class="checkbox__text">HTML</span>
                            </Label>
                        </li>
                        <li class="post__learnings__item">
                            <Label class="checkbox" for="css">
                                <input class="checkbox__input" type="checkbox" name="language" id="css">
                                <span class="checkbox__text">CSS</span>
                            </Label>
                        </li>
                        <li class="post__learnings__item">
                            <Label class="checkbox" for="php">
                                <input class="checkbox__input" type="checkbox" name="language" id="php">
                                <span class="checkbox__text">PHP</span>
                            </Label>
                        </li>
                        <li class="post__learnings__item">
                            <Label class="checkbox" for="laravel">
                                <input class="checkbox__input" type="checkbox" name="language" id="laravel">
                                <span class="checkbox__text">Laravel</span>
                            </Label>
                        </li>
                        <li class="post__learnings__item">
                            <Label class="checkbox" for="sql">
                                <input class="checkbox__input" type="checkbox" name="language" id="sql">
                                <span class="checkbox__text">SQL</span>
                            </Label>
                        </li>
                        <li class="post__learnings__item">
                            <Label class="checkbox" for="shell">
                                <input class="checkbox__input" type="checkbox" name="language" id="shell">
                                <span class="checkbox__text">SHELL</span>
                            </Label>
                        </li>
                        <li class="post__learnings__item">
                            <Label class="checkbox" for="others">
                                <input class="checkbox__input" type="checkbox" name="language" id="others">
                                <span class="checkbox__text">情報システム基礎知識（その他）</span>
                            </Label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="post__right">
                <div class="post__contents">
                    <h3 class="post__lead">学習時間</h3>
                    <label for="studied-time">
                        <input class="post__text" type="text" name="time" id="studied-time">
                    </label>
                </div>
                <div class="post__contents">
                    <h3 class="post__lead">Twitter用コメント</h3>
                    <textarea name="comment" id="twitter-comment" class="post__textarea"></textarea>
                    <Label class="checkbox checkbox__twitter" for="twitter">
                        <input class="checkbox__input checkbox__twitter__input" type="checkbox" name="twitter"
                            id="twitter" checked>
                        <span class="checkbox__text checkbox__twitter__text">Twitterにシェアする</span>
                    </Label>
                </div>
            </div>
            <button class="button post__button" id="post-button">記録・投稿</button>
        </div>

        <div class="post--loader" id="post-loader">
        </div>

        <div class="post--completion" id="post-completion">
            <div class="post--completion__lead">AWESOME!</div>
            <i class="fa-solid fa-circle-check post--completion__icon"></i>
            <p class="post--completion__text">記録・投稿<br>完了しました</p>
        </div>
    </section>
@endsection

@section('calendar')
    <section class="calendar modal" id="calendar-modal">
        <div class="calendar__close" id="calendar-close">
            <i class="fa-solid fa-arrow-left"></i>
        </div>
        <div class="calendar__move-page">
            <button class="calendar__previous" id="prev"></button>
            <div class="calendar__date" id="calendar-date"></div>
            <button class="calendar__next" id="next"></button>
        </div>
        <div class="calendar__inner" id="calendar"></div>
        <button class="button calendar__button" id="calendar-button">決定</button>
    </section>

    <div class="calendar__move-page">
        <button class="calendar__previous" id="home-prev"></button>
        <div class="calendar__date" id="home-calendar-date"></div>
        <button class="calendar__next" id="home-next"></button>
    </div>

    <button class="button sp-button" id="sp-modal-open">記録・投稿</button>
@endsection


@section('chart')
    <script>
        Chart.register(ChartDataLabels);

        {
            // 棒グラフ-----------------------------------

            const timeLogChart = document.getElementById('time-log-chart').getContext("2d");;
            const gradient = timeLogChart.createLinearGradient(0, 20, 0, 100);
            gradient.addColorStop(0, "#3ccfff");
            gradient.addColorStop(1.0, "#0f71bc");
            timeLogChart.fillStyle = gradient;
            timeLogChart.fillRect(0, 0, 0, 0);

            // 棒グラフ作成
            new Chart(timeLogChart, {
                type: 'bar',
                data: {
                    labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24,
                        25, 26, 27,
                        28, 29, 30
                    ],
                    datasets: [{
                        data: [
                            @foreach ($chart_data['bar_data'] as $data)
                                {{ $data }},
                            @endforeach
                        ],
                        backgroundColor: gradient,
                        borderWidth: 2,
                        borderRadius: 10,
                    }],
                },
                options: {
                    responsive: true,
                    scales: {

                        x: {
                            grid: {
                                display: false,
                            },
                            ticks: {
                                min: 1,
                                max: 31,
                                stepSize: 2,
                                callback: function(value) {
                                    if (value % 2 != 0 && value != 0) {
                                        return value + 1;
                                    };
                                }
                            },
                        },
                        y: {
                            grid: {
                                display: false,
                            },
                            ticks: {
                                stepSize: 2,
                                callback: function(value) {
                                    return value + 'h';
                                }
                            },
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        datalabels: {
                            display: false
                        }
                    },
                }
            })
            // }


            // 円グラフ-----------------------------------

            const bgColor = [
                "#0445ec", "#0f70bd", "#20bdde", "#3ccefe", "#b29ef3", "#4a17ef", "#3005c0", "#6c46eb"
            ];

            // 学習言語のドーナツチャート作成

            const languagesChart = document.getElementById('languages-chart');
            // ラベルの配列を作成
            const languagesLabels = [
                @foreach ($chart_data['language_names'] as $name)
                    '{{ $name->language }}',
                @endforeach
            ];
            console.log(languagesLabels);

            // 100分率で表示するための、言語学習の合計時間を格納する
            @php
                $sumLanguagesRecords = 0;
                foreach ($chart_data['language_data'] as $data) {
                    $sumLanguagesRecords += $data;
                }
            @endphp

            // 100分率に変換したものを配列に格納
            const languagesRecords = [
                @foreach ($chart_data['language_data'] as $data)
                    {{ intval(($data / $sumLanguagesRecords) * 100) }},
                @endforeach
            ];

            // 学習言語でチャートを作成
            createDoughnutChart(languagesChart, languagesLabels, languagesRecords, bgColor)


            // 学習コンテンツのドーナツチャート作成

            const contentsChart = document.getElementById('contents-chart');
            // ラベルの配列を作成
            const contentsLabels = [
                @foreach ($chart_data['content_names'] as $name)
                    '{{ $name->content }}',
                @endforeach
            ];
            console.log(contentsLabels);

            // 100分率で表示するための、コンテンツ学習の合計時間を格納する
            @php
                $sumContentsRecords = 0;
                foreach ($chart_data['content_data'] as $data) {
                    $sumContentsRecords += $data;
                }
            @endphp

            // 100分率に変換したものを配列に格納
            const contentsRecords = [
                @foreach ($chart_data['content_data'] as $data)
                    {{ intval(($data / $sumContentsRecords) * 100) }},
                @endforeach
            ];

            // 学習コンテンツでチャートを作成
            createDoughnutChart(contentsChart, contentsLabels, contentsRecords, bgColor)


            // 円グラフを作成するための関数
            function createDoughnutChart(place, labels, data, color) {


                new Chart(place, {
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: data,
                            backgroundColor: color,
                            borderWidth: 0,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                align: 'start',
                                labels: {
                                    padding: 10,
                                    usePointStyle: true,
                                    pointStyle: 'circle',
                                }
                            },
                            datalabels: {
                                labels: {
                                    title: {
                                        color: '#fff'
                                    }
                                },
                                formatter: function(value, context) {
                                    return value + '%';
                                }
                            }
                        },
                    }
                });
            }
        }
    </script>
@endsection
