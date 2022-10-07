/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/calendar.js":
/*!**********************************!*\
  !*** ./resources/js/calendar.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


{
  // カレンダー表示
  var showProcess = function showProcess(date) {
    var year = date.getFullYear();
    var month = date.getMonth();
    var day = date.getDate();
    calendarDate.innerHTML = year + "年" + (month + 1) + "月";
    homeCalendarDate.innerHTML = year + "年" + (month + 1) + "月";
    var calendar = createProcess(year, month);
    document.querySelector('#calendar').innerHTML = calendar;
  }; // カレンダー作成


  var createProcess = function createProcess(year, month) {
    // 曜日
    var calendar = "<table><tr class='dayOfWeek'>";

    for (var _i = 0; _i < week.length; _i++) {
      calendar += "<th>" + week[_i] + "</th>";
    }

    calendar += "</tr>";
    var count = 0;
    var startDayOfWeek = new Date(year, month, 1).getDay();
    var endDate = new Date(year, month + 1, 0).getDate();
    var lastMonthEndDate = new Date(year, month, 0).getDate();
    var row = Math.ceil((startDayOfWeek + endDate) / week.length); // 1行ずつ設定

    for (var i = 0; i < row; i++) {
      calendar += "<tr>"; // 1colum単位で設定

      for (var j = 0; j < week.length; j++) {
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
  }; // カレンダーの日にち選択時のイベント


  var selectCalendarDay = function selectCalendarDay() {
    var calendarDays = document.querySelectorAll('td');
    var selected;
    calendarDays.forEach(function (calendarDay) {
      calendarDay.addEventListener('click', function () {
        if (selected != true) {
          selectedDay = calendarDate.innerHTML + calendarDay.innerHTML + "日";
          calendarDay.classList.toggle('js-selected-day');
          selected = true;
        } else {
          selectedDay = calendarDate.innerHTML + calendarDay.innerHTML + "日";
          document.querySelector('.js-selected-day').classList.remove('js-selected-day');
          calendarDay.classList.toggle('js-selected-day');
        }
      });
    });
  }; // カレンダー決定ボタンクリック時のイベント


  var calendarModal = document.getElementById('calendar-modal');
  var calendarDate = document.getElementById('calendar-date');
  var homeCalendarDate = document.getElementById('home-calendar-date');
  var calendarClose = document.getElementById('calendar-close');
  var studiedDate = document.getElementById('studied-date');
  var fullPage = document.body;
  var selectedDay; // 日にち選択時にカレンダーを開く

  homeCalendarDate.addEventListener('click', function () {
    calendarModal.classList.add('js-flex');
    fullPage.classList.add('js-body');
  });
  studiedDate.addEventListener('click', function () {
    calendarModal.classList.add('js-flex');
    fullPage.classList.add('js-body');
    fullPage.classList.add('js-post-opened');
  }); // カレンダーを閉じる

  calendarClose.addEventListener('click', function () {
    calendarModal.classList.remove('js-flex');

    if (fullPage.classList.contains('js-post-opened') != true) {
      fullPage.classList.remove('js-post-opened');
      fullPage.classList.remove('js-body');
    }
  });
  var week = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
  var today = new Date(); // 月末だとずれる可能性があるため、1日固定で取得

  var showDate = new Date(today.getFullYear(), today.getMonth(), 1); // 前の月表示

  var prevButton = document.getElementById('prev');
  var homePrevButton = document.getElementById('home-prev');
  prevButton.addEventListener('click', function () {
    showDate.setMonth(showDate.getMonth() - 1);
    showProcess(showDate);
    selectCalendarDay();
  });
  homePrevButton.addEventListener('click', function () {
    showDate.setMonth(showDate.getMonth() - 1);
    showProcess(showDate);
    selectCalendarDay();
  }); // 次の月表示

  var nextButton = document.getElementById('next');
  var homeNextButton = document.getElementById('home-next');
  nextButton.addEventListener('click', function () {
    showDate.setMonth(showDate.getMonth() + 1);
    showProcess(showDate);
    selectCalendarDay();
  });
  homeNextButton.addEventListener('click', function () {
    showDate.setMonth(showDate.getMonth() + 1);
    showProcess(showDate);
    selectCalendarDay();
  });
  var calendarButton = document.getElementById('calendar-button');
  calendarButton.addEventListener('click', function () {
    studiedDate.value = selectedDay;
    calendarModal.classList.remove('js-flex');

    if (fullPage.classList.contains('js-post-opened') != true) {
      fullPage.classList.remove('js-body');
      fullPage.classList.remove('js-post-opened');
    }
  }); // 表示

  window.onload = function () {
    showProcess(today, calendar);
    selectCalendarDay();
  };
}

/***/ }),

/***/ 2:
/*!****************************************!*\
  !*** multi ./resources/js/calendar.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /app/resources/js/calendar.js */"./resources/js/calendar.js");


/***/ })

/******/ });