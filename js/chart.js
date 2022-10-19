"use strict";

// Register the plugin to all charts:
Chart.register(ChartDataLabels);

{
  // bar-chart-----------------------------------

  const TIME_LOG_DATA_URL =
    "http://posse-task.anti-pattern.co.jp/1st-work/study_time.json";
  fetch(TIME_LOG_DATA_URL)
    .then((response) => response.json())
    .then((jsonData) => {
      // JSONデータを扱った処理
      createTimeLogChart(jsonData);
    });

  function createTimeLogChart(data) {
    const dayData = data.map(function (e) {
      return e.day;
    });

    const timeData = data.map(function (e) {
      return e.time;
    });

    const timeLogChart = document
      .getElementById("time-log-chart")
      .getContext("2d");
    const gradient = timeLogChart.createLinearGradient(0, 20, 0, 100);
    gradient.addColorStop(0, "#3ccfff");
    gradient.addColorStop(1.0, "#0f71bc");
    timeLogChart.fillStyle = gradient;
    timeLogChart.fillRect(0, 0, 0, 0);

    // 棒グラフ作成
    new Chart(timeLogChart, {
      type: "bar",
      data: {
        labels: dayData,
        datasets: [
          {
            data: timeData,
            backgroundColor: gradient,
            borderWidth: 2,
            borderRadius: 10,
          },
        ],
      },
      options: {
        responsive: true,
        scales: {
          x: {
            grid: {
              display: false,
            },
            ticks: {
              stepSize: 2,
              callback: function (value) {
                if (value % 2 != 0 && value != 0) {
                  return value + 1;
                }
              },
            },
          },
          y: {
            grid: {
              display: false,
            },
            ticks: {
              stepSize: 2,
              callback: function (value) {
                return value + "h";
              },
            },
          },
        },
        plugins: {
          legend: {
            display: false,
          },
          datalabels: {
            display: false,
          },
        },
      },
    });
  }

  // pie-chart-----------------------------------

  // 学習言語のデータ取得
  const LANGUAGE_DATA_URL =
    "http://posse-task.anti-pattern.co.jp/1st-work/study_language.json";
  fetch(LANGUAGE_DATA_URL)
    .then((response) => response.json())
    .then((jsonData) => {
      // JSONデータを扱った処理
      createLanguagesChart(jsonData);
    });

  // 学習コンテンツのデータ取得
  const CONTENTS_DATA_URL =
    "http://posse-task.anti-pattern.co.jp/1st-work/study_contents.json";
  fetch(CONTENTS_DATA_URL)
    .then((response) => response.json())
    .then((jsonData) => {
      // JSONデータを扱った処理
      createContentsChart(jsonData);
    });

  const bgColor = [
    "#0000ff",
    "#4682b4",
    "#40e0d0",
    "#87ceeb",
    "#dda0dd",
    "#9400d3",
    "#0000cd",
    "#00008b",
  ];

  // 学習言語のドーナツチャート作成
  function createLanguagesChart(data) {
    const languagesChart = document.getElementById("languages-chart");
    const languagesLabels = Object.keys(data[0]);
    const languagesPercent = Object.values(data[0]);

    createDoughnutChart(
      languagesChart,
      languagesLabels,
      languagesPercent,
      bgColor
    );
  }

  // 学習コンテンツのドーナツチャート作成
  function createContentsChart(data) {
    const contentsChart = document.getElementById("contents-chart");
    const contentsLabels = Object.keys(data[0]);
    const contentsPercent = Object.values(data[0]);

    createDoughnutChart(
      contentsChart,
      contentsLabels,
      contentsPercent,
      bgColor
    );
  }

  // 円グラフ作成
  function createDoughnutChart(place, labels, data, color) {
    new Chart(place, {
      type: "doughnut",
      data: {
        labels: labels,
        datasets: [
          {
            data: data,
            backgroundColor: color,
            borderWidth: 0,
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        aspectRatio: 1 / 1,
        plugins: {
          legend: {
            position: "bottom",
            align: "start",
            labels: {
              padding: 10,
              usePointStyle: true,
              pointStyle: "circle",
            },
          },
          datalabels: {
            labels: {
              title: {
                color: "#fff",
              },
            },
            formatter: function (value, context) {
              return value + "%";
            },
          },
        },
      },
    });
  }
}
