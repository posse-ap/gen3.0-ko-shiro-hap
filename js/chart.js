'use strict';

// Register the plugin to all charts:
Chart.register(ChartDataLabels);

 // bar-char------------------------------------

{
  let barChartData = [
    {
        "day": 1,
        "time": 3
    },
    {
        "day": 2,
        "time": 4
    },
    {
        "day": 3,
        "time": 5
    },
    {
        "day": 4,
        "time": 3
    },
    {
        "day": 5,
        "time": 0
    },
    {
        "day": 6,
        "time": 0
    },
    {
        "day": 7,
        "time": 4
    },
    {
        "day": 8,
        "time": 2
    },
    {
        "day": 9,
        "time": 2
    },
    {
        "day": 10,
        "time": 8
    },
    {
        "day": 11,
        "time": 8
    },
    {
        "day": 12,
        "time": 2
    },
    {
        "day": 13,
        "time": 2
    },
    {
        "day": 14,
        "time": 1
    },
    {
        "day": 15,
        "time": 7
    },
    {
        "day": 16,
        "time": 4
    },
    {
        "day": 17,
        "time": 4
    },
    {
        "day": 18,
        "time": 3
    },
    {
        "day": 19,
        "time": 3
    },
    {
        "day": 20,
        "time": 3
    },
    {
        "day": 21,
        "time": 2
    },
    {
        "day": 22,
        "time": 2
    },
    {
        "day": 23,
        "time": 6
    },
    {
        "day": 24,
        "time": 2
    },
    {
        "day": 25,
        "time": 2
    },
    {
        "day": 26,
        "time": 1
    },
    {
        "day": 27,
        "time": 1
    },
    {
        "day": 28,
        "time": 1
    },
    {
        "day": 29,
        "time": 7
    },
    {
        "day": 30,
        "time": 8
    }
  ]

  const dayData = barChartData.map(function(e){
    return e.day;
  })

  const timeData = barChartData.map(function(e){
    return e.time;
  })

  const timeLogChart = document.getElementById('time-log-chart').getContext("2d");;
  const gradient = timeLogChart.createLinearGradient(0,20,0,100);
  gradient.addColorStop(0, "#3ccfff");
  gradient.addColorStop(1.0, "#0f71bc");
  timeLogChart.fillStyle = gradient;
  timeLogChart.fillRect(0,0,0,0);

  // bar-chart作成
  new Chart(timeLogChart, {
    type: 'bar',
    data: {
      labels: dayData,
      datasets: [{
        data:timeData,
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
          }
        },
        y: {
          grid: {
            display: false,
          }
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

  // pie-chart-----------------------------------

  let languagesData = [
    {
        "HTML": 30,
        "CSS": 20,
        "JavaScript": 10,
        "PHP": 5,
        "Laravel": 5,
        "SQL": 20,
        "SHELL": 20,
        "その他": 10
    }
]

  let contentsData = [
    {
        "N予備校": 40,
        "ドットインストール": 20,
        "課題": 40
    }
  ]

  const bgColor = [
    "#0000ff", "#4682b4", "#40e0d0", "#87ceeb", "#dda0dd", "#9400d3", "#0000cd", "#00008b"
  ]

  const languagesChart = document.getElementById('languages-chart')
  const languagesLabels = Object.keys(languagesData[0])
  const languagesPercent = Object.values(languagesData[0])

  const contentsChart = document.getElementById('contents-chart')
  const contentsLabels = Object.keys(contentsData[0])
  const contentsPercent = Object.values(contentsData[0])


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
        plugins: {
          legend: {
            display: false
          },
          datalabels: {
            labels: {
              title: {
                color: '#fff'
              }
            },
            formatter: function(value, context) {
              return  value + '%';
            }
          }
        },
      }
    })
  }

  createDoughnutChart(languagesChart, languagesLabels, languagesPercent, bgColor)
  createDoughnutChart(contentsChart, contentsLabels, contentsPercent, bgColor)
}