<?php
declare(strict_types = 1);

// PDOの設定を呼び出す
require('./pdo.php');

// 今日の学習時間
$today_stmt = $pdo->query('SELECT study_time FROM records WHERE study_date = CURDATE()');
$today = $today_stmt->fetch();
// print_r($today);

// 今月の学習時間
$month_stmt = $pdo->query("SELECT SUM(study_time) FROM records WHERE DATE_FORMAT(study_date, '%M/%Y') = DATE_FORMAT(now(), '%M/%Y')");
$month = $month_stmt->fetch();
// echo($month['study_time']);

// 今までの合計時間
$total_stmt = $pdo->query('SELECT SUM(study_time) FROM records');
$total = $total_stmt->fetch();
// print_r($total);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>independent production</title>
  <link rel="stylesheet" href="./scss/style.css">
  <!-- fontawesome -->
  <script src="https://kit.fontawesome.com/6c20dffe37.js" crossorigin="anonymous"></script>
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <div class="header__left">
        <div class="header__logo">
          <img src="./assets/img/logo.svg" alt="POSSEロゴ">
        </div>
        <span>4th week</span>
      </div>
      <button class="button header__button" id="modal-open">記録・投稿</button>
    </div>
  </header>

  <main class="main">
    <div class="main__left">

      <section class="time-log">
        <ul class="time-log__items">
          <li class="time-log__item">
            <h3 class="time-log__heading">Today</h3>
            <div class="time-log__result"><?= $today['study_time']; ?></div>
            <div class="time-log__hour">hour</div>
          </li>
          <li class="time-log__item">
            <h3 class="time-log__heading">Month</h3>
            <div class="time-log__result"><?= $month['SUM(study_time)']; ?></div>
            <div class="time-log__hour">hour</div>
          </li>
          <li class="time-log__item">
            <h3 class="time-log__heading">Total</h3>
            <div class="time-log__result"><?= $total['SUM(study_time)']; ?></div>
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
        <!-- <ul class="about__learnings__items">
          <li class="about__learnings__item">
            <span></span>Javascript
          </li>
          <li class="about__learnings__item">
            <span></span>CSS
          </li>
          <li class="about__learnings__item">
            <span></span>PHP
          </li>
          <li class="about__learnings__item">
            <span></span>HTML
          </li>
          <li class="about__learnings__item">
            <span></span>Laravel
          </li>
          <li class="about__learnings__item">
            <span></span>SQL
          </li>
          <li class="about__learnings__item">
            <span></span>SHELL
          </li>
          <li class="about__learnings__item">
            <span></span>情報システム基礎知識（その他）
          </li>
        </ul> -->
      </section>

      <section class="about__learnings contents">
        <h2 class="about__learnings__title">学習コンテンツ</h2>
        <div class="doughnut-chart contents-chart">
          <canvas id="contents-chart""></canvas>
        </div>
        <!-- <ul class=" about__learnings__items contents__items">
            <li class="about__learnings__item">
              <span></span>ドットインストール
            </li>
            <li class="about__learnings__item">
              <span></span>N予備校
            </li>
            <li class="about__learnings__item">
              <span></span>POSSE課題
            </li>
            </ul> -->
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
              <input class="checkbox__input checkbox__twitter__input" type="checkbox" name="twitter" id="twitter"
                checked>
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
  </main>

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

  <!-- chart.js-------------------------------------------- -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"
    integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- chartjs-plugin-datalabels------------------------------ -->
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.1.0"></script>

  <!-- チャートを別ファイルで処理 -->
  <?php require('./charts.php'); ?>

  <!-- main.js--------------------------------------------- -->
  <script src="./js/main.js"></script>
  <script src="./js/chart.js"></script>
  <script src="./js/calendar.js"></script>

</body>

</html>