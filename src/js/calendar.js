'use strict';

{
  const calendarModal = document.getElementById('calendar-modal');
  const calendarDate = document.getElementById('calendar-date');
  const homeCalendarDate = document.getElementById('home-calendar-date');
  const calendarClose = document.getElementById('calendar-close');
  const studiedDate = document.getElementById('studied-date');
  const fullPage = document.body;
  let selectedDay;

  // 日にち選択時にカレンダーを開く

    homeCalendarDate.addEventListener('click', () => {
      calendarModal.classList.add('js-flex');
      fullPage.classList.add('js-body');
    })

    studiedDate.addEventListener('click', () => {
      calendarModal.classList.add('js-flex');
      fullPage.classList.add('js-body');
      fullPage.classList.add('js-post-opened');
    })


  // カレンダーを閉じる
  calendarClose.addEventListener('click', () => {
    calendarModal.classList.remove('js-flex');
    if(fullPage.classList.contains('js-post-opened') != true) {
      fullPage.classList.remove('js-post-opened');
      fullPage.classList.remove('js-body');
    }
  })


  const week = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
  const today = new Date();
  // 月末だとずれる可能性があるため、1日固定で取得
  let showDate = new Date(today.getFullYear(), today.getMonth(), 1);

  // 前の月表示
  const prevButton = document.getElementById('prev');
  const homePrevButton = document.getElementById('home-prev');

  prevButton.addEventListener('click', () => {
    showDate.setMonth(showDate.getMonth() - 1);
    showProcess(showDate);
    selectCalendarDay();
  })
  homePrevButton.addEventListener('click', () => {
    showDate.setMonth(showDate.getMonth() - 1);
    showProcess(showDate);
    selectCalendarDay();
  })

  // 次の月表示
  const nextButton = document.getElementById('next');
  const homeNextButton = document.getElementById('home-next');

  nextButton.addEventListener('click', () => {
    showDate.setMonth(showDate.getMonth() + 1);
    showProcess(showDate);
    selectCalendarDay();
  })
  homeNextButton.addEventListener('click', () => {
    showDate.setMonth(showDate.getMonth() + 1);
    showProcess(showDate);
    selectCalendarDay();
  })

  // カレンダー表示
  function showProcess(date) {
    const year = date.getFullYear();
    const month = date.getMonth();
    const day = date.getDate();
    calendarDate.innerHTML = year + "年" + (month + 1) + "月";
    homeCalendarDate.innerHTML = year + "年" + (month + 1) + "月";

    let calendar = createProcess(year, month);
    document.querySelector('#calendar').innerHTML = calendar;
  }

  // カレンダー作成
  function createProcess(year, month) {
    // 曜日
    let calendar = "<table><tr class='dayOfWeek'>";
    for (let i = 0; i < week.length; i++) {
        calendar += "<th>" + week[i] + "</th>";
    }
    calendar += "</tr>";

    let count = 0;
    let startDayOfWeek = new Date(year, month, 1).getDay();
    let endDate = new Date(year, month + 1, 0).getDate();
    let lastMonthEndDate = new Date(year, month, 0).getDate();
    let row = Math.ceil((startDayOfWeek + endDate) / week.length);

    // 1行ずつ設定
    for (var i = 0; i < row; i++) {
        calendar += "<tr>";
        // 1colum単位で設定
        for (let j = 0; j < week.length; j++) {
            if (i == 0 && j < startDayOfWeek) {
                // 1行目で1日まで先月の日付を設定
                calendar += "<td class='disabled prev-month'>" + (lastMonthEndDate - startDayOfWeek + j + 1) + "</td>";
            } else if (count >= endDate) {
                // 最終行で最終日以降、翌月の日付を設定
                count++;
                calendar += "<td class='disabled next-month'>" + (count - endDate) + "</td>";
            } else {
                // 当月の日付を曜日に照らし合わせて設定
                count++;
                calendar += "<td>" + count + "</td>";
            }
        }
        calendar += "</tr>";
    }
    return calendar;
  }

  // カレンダーの日にち選択時のイベント
  function selectCalendarDay() {
    const calendarDays = document.querySelectorAll('td');
    let selected;

    calendarDays.forEach((calendarDay) => {
      calendarDay.addEventListener('click', () => {
        if(selected != true){
          selectedDay = calendarDate.innerHTML + calendarDay.innerHTML + "日";

          calendarDay.classList.toggle('js-selected-day');
          selected = true;
        } else {
          selectedDay = calendarDate.innerHTML + calendarDay.innerHTML + "日";

          document.querySelector('.js-selected-day').classList.remove('js-selected-day');
          calendarDay.classList.toggle('js-selected-day');
        }
      })
    })
  }

  // カレンダー決定ボタンクリック時のイベント
  const calendarButton = document.getElementById('calendar-button');

  calendarButton.addEventListener('click', () => {
    studiedDate.value = selectedDay;
    calendarModal.classList.remove('js-flex');
    if(fullPage.classList.contains('js-post-opened') != true) {
      fullPage.classList.remove('js-body');
      fullPage.classList.remove('js-post-opened');
    }
  })


  // 表示
  window.onload = function () {
    showProcess(today, calendar);
    selectCalendarDay();
  };
}