<?php

// PDOの設定を呼び出す
require('../pdo.php');

// 問題を取得
$questions_stmt = $pdo->prepare('SELECT * FROM questions');
$questions_stmt->execute();
$questions = $questions_stmt->fetchAll();
// print_r($questions);

?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz</title>

  <link rel="stylesheet" href="../scss/style.css">
  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&family=Plus+Jakarta+Sans:wght@400;700&display=swap"
    rel="stylesheet">
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <div class="header__logo">
        <img src="../img/logo.svg" alt="ヘッダーロゴ" class="logo__item" />
      </div>
      <nav class="nav">
        <ul class="nav__list">
          <li class="nav__item"><a href="../top/">POSSEとは</a></li>
          <li class="nav__item"><a href="../quiz/">クイズ</a></li>
          <li class="nav__item nav__sns__item">
            <a href="https://twitter.com/posse_program?s=21&t=17ohMH_KX9S6thPqV4Pqpw">
              <img src="../img/icon/icon-twitter.svg" alt="Twitter" />
            </a>
          </li>
          <li class="nav__item nav__sns__item">
            <a href="https://instagram.com/posse_programming?igshid=YmMyMTA2M2Y=">
              <img src="../img/icon/icon-instagram.svg" alt="Instagram" />
            </a>
          </li>
        </ul>
      </nav>
      <div class="hamburger" id="js-hamburger">
        <span id="js-hamburger__head"></span>
        <span id="js-hamburger__foot"></span>
      </div>
      <nav class="hamburger__nav" id="js-hamburger__nav">
        <ul class="hamburger__nav__items">
          <li><a href="../top">POSSEとは</a></li>
          <li><a href="../quiz">クイズ</a></li>
        </ul>
        <div class="hamburger__nav__foot">
          <div class="hamburger__nav__button">
            <a href="https://line.me/R/ti/p/@651htnqp?from=page" class="contact__link">
              <img src="../img/icon/icon-line.svg" alt="LINEアイコン" class="line__icon">POSSE公式LINE追加<img
                src="../img/icon/icon-link-light.svg" alt="LINEリンク" class="link__icon">/>
            </a>
          </div>
          <div class="hamburger__nav__official__link">
            <a href="https://posse-ap.com/" alt="公式サイト">
              POSSE公式サイト<img src="../img/icon/icon-link-gray-dark.svg" alt="公式サイトリンク" />
            </a>
          </div>
          <ul class="hamburger__nav__list">
            <li class="nav__item nav__sns__item">
              <a href="https://twitter.com/posse_program?s=21&t=17ohMH_KX9S6thPqV4Pqpw">
                <img src="../img/icon/icon-twitter.svg" alt="Twitter" />
              </a>
            </li>
            <li class="nav__item nav__sns__item">
              <a href="https://instagram.com/posse_programming?igshid=YmMyMTA2M2Y=">
                <img src="../img/icon/icon-instagram.svg" alt="Instagram" />
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>

  <main class="main">
    <section class="quiz__hero">
      <div class="quiz__hero__inner">
        <div class="quiz__hero__heading">
          <h2 class="quiz__hero__lead">POSSE課題</h2>
          <h1 class="quiz__hero__title">ITクイズ</h1>
        </div>
      </div>
    </section>

    <section class="quiz" id="quiz__section">
      <!-- javascript -->

      <!-- 問題ごとに繰り返す -->
      <?php
      foreach ($questions as $question) : {

        // 問題の番号、タイトル、写真URLを格納
        $question_id = $question['question_id'];
        $question_title = $question['question'];
        $question_image = $question['image'];

        // 問題番号と一致した選択肢を取得
        $choices_stmt = $pdo->prepare('SELECT * FROM choices WHERE question_id = ?');
        $choices_stmt->execute([$question_id]);
        $choices = $choices_stmt->fetchAll();

        // 正解の選択肢のみ獲得
        $choices_correct__stmt = $pdo->prepare('SELECT choice FROM choices WHERE question_id = ? AND valid = 1');
        $choices_correct__stmt->execute([$question_id]);
        $choice_correct = $choices_correct__stmt->fetch();
        $correct_text = $choice_correct['choice'];

        // 引用文を取得

        $notes_stmt = $pdo->prepare('SELECT note FROM notes WHERE question_id = ?');
        $notes_stmt->execute([$question_id]);
        $note = $notes_stmt->fetch();
        $note_text = $note['note'];
      }
      ?>

      <div class="quiz__inner">
        <h2 class="quiz__icon quiz__number" id="quizNumber"><?= $question_id; ?></h2>
        <h3 class="quiz__text"><?= $question_title; ?></h3>
        <div class="quiz__caption">
          <img src="../img/quiz/<?= $question_image; ?>" alt="クイズ画像">
        </div>
        <div class="answer">
          <h2 class="quiz__icon answer__icon">A</h2>
          <div class="answer__list">

            <!-- 問題ごとの選択肢を繰り返す -->
            <?php foreach ($choices as $choice) : {
            $choice_text = $choice['choice'];
          }
          ?>
            <button class="answer__item quiz1__btn"><?= $choice_text; ?></button>
            <?php endforeach; ?>

          </div>
        </div>
        <div class="judgement judgement__correct" id="js__quiz<?= $question_id; ?>__correct">
          <h3>正解!</h3>
          <p><span>A</span><?= $correct_text; ?></p>
        </div>
        <div class="judgement judgement__wrong" id="js__quiz<?= $question_id; ?>__wrong">
          <h3>不正解...</h3>
          <p><span>A</span><?= $correct_text; ?></p>
        </div>

        <!-- 引用テキストがある場合のみ表示させる -->
        <?php if ($note_text) : ?>
        <div class="quote">
          <div class="quote__icon">
            <img src="../img/icon/icon-note.svg" alt="引用">
          </div>
          <p class="quote__text"><?= $note_text ?><?= $note_text ?></p>
        </div>
        <?php endif; ?>

      </div>


      <?php endforeach; ?>


    </section>
  </main>

  <section class="contact">
    <div class="contact__inner">
      <div class="contact__content">
        <div class="contact__heading">
          <div class="contact__icon line__icon">
            <img src="../img/icon/icon-line.svg" alt="LINE" />
          </div>
          <h2 class="contact__title">POSSE 公式LINE</h2>
        </div>
        <p class="contact__text">
          公式LINEにてご質問を随時受け付けております。<br />詳細やPOSSE最新情報につきましては、公式LINEにてお知らせ致しますので<br />下記ボタンより友達追加をお願いします！
        </p>
        <div class="contact__button">
          <a href="https://line.me/R/ti/p/@651htnqp?from=page" class="contact__link">
            LINE追加<img src="../img/icon/icon-link-gray-dark.svg" alt="LINEリンク" />
          </a>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="footer__head">
      <div class="footer__logo">
        <img src="../img/logo.svg" alt="フッターロゴ" />
      </div>
      <div class="footer__official__link">
        <a href="https://posse-ap.com/" alt="公式サイト">
          POSSE公式サイト<img src="../img/icon/icon-link-gray-dark.svg" alt="公式サイトリンク" />
        </a>
      </div>
      <nav class="nav">
        <ul class="nav__list">
          <li class="nav__item nav__sns__item">
            <a href="https://twitter.com/posse_program?s=21&t=17ohMH_KX9S6thPqV4Pqpw">
              <img src="../img/icon/icon-twitter.svg" alt="Twitter" />
            </a>
          </li>
          <li class="nav__item nav__sns__item">
            <a href="https://instagram.com/posse_programming?igshid=YmMyMTA2M2Y=">
              <img src="../img/icon/icon-instagram.svg" alt="Instagram" />
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="footer__foot">
      <small class="footer__copyright">&copy;2022 POSSE</small>
    </div>
  </footer>

  <!-- javascript -->
  <script src="../js/common.js"></script>
  <script src="../js/quiz.js"></script>
</body>

</html>