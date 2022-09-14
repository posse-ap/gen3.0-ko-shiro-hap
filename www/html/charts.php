<?php

// 棒グラフ用のデータ
$bar_stmt = $pdo->query(
  "SELECT
    SUM(study_time)
  FROM
    records
  GROUP BY
    study_date
  HAVING
    DATE_FORMAT(study_date, '%M/%Y') = DATE_FORMAT(now(), '%M/%Y')"
);
$bar = $bar_stmt->fetchALL();


// 学習言語のデータ
$languages_stmt = $pdo->query(
  "SELECT
    SUM(records.study_time), languages.language
  FROM
    records
  JOIN
    languages ON records.language_id = languages.id
  GROUP BY
    languages.language"
    );
$languages = $languages_stmt->fetchAll() ?: 0;



// 学習コンテンツのデータ
$contents_stmt = $pdo->query(
  "SELECT
    SUM(records.study_time), contents.content
  FROM
    records
  JOIN
    contents ON records.language_id = contents.id
  GROUP BY
    contents.content"
    );
$contents = $contents_stmt->fetchAll() ?: 0;




?>

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
      labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27,
        28, 29, 30
      ],
      datasets: [{
        data: [<?php
          foreach ($bar as $bar_data) {
            echo $bar_data['SUM(study_time)'] . ',';
          }
          ?>],
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
  ]

  // 学習言語のドーナツチャート作成

  const languagesChart = document.getElementById('languages-chart');
  // ラベルの配列を作成
  const languagesLabels = [<?php
    foreach ($languages as $language) {
      echo "'" . $language['language'] . "'" . ',';
    }
  ?>];

  // 100分率で表示するための、言語学習の合計時間を格納する
  <?php
  $sumLanguagesRecords = 0;
  foreach ($languages as $language) {
    $sumLanguagesRecords+= $language['SUM(records.study_time)'];
  }
  ?>

  // 言語の学習時間の配列を作成、学習時間を百分率に変換
  const languagesRecords = [<?php
    foreach ($languages as $language) {
      echo intval($language['SUM(records.study_time)']/$sumLanguagesRecords*100) . ',';
    }
  ?>];

  createDoughnutChart(languagesChart, languagesLabels, languagesRecords, bgColor)


  // 学習コンテンツのドーナツチャート作成

  const contentsChart = document.getElementById('contents-chart');
  // ラベルの配列を作成
  const contentsLabels = [<?php
    foreach ($contents as $content) {
      echo "'" . $content['content'] . "'" . ',';
    }
  ?>];

  // 100分率で表示するための、コンテンツ学習の合計時間を格納する
  <?php
  $sumContentsRecords = 0;
  foreach ($contents as $content) {
    $sumContentsRecords+= $content['SUM(records.study_time)'];
  }
  ?>

  // コンテンツの学習時間の配列を作成、学習時間を百分率に変換
  const contentsRecords = [<?php
    foreach ($contents as $content) {
      echo intval($content['SUM(records.study_time)']/$sumContentsRecords*100) . ',';
    }
  ?>];

  createDoughnutChart(contentsChart, contentsLabels, contentsRecords, bgColor)


  // 円グラフ作成
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
        aspectRatio: 1 / 1,
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