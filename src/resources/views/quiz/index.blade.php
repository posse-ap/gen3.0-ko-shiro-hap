@extends('layouts.index')

<?php
// declare(strict_types=1);

// // PDOの設定を呼び出す
// require '../pdo.php';

// // 問題を取得
// $questions_stmt = $pdo->prepare('SELECT * FROM questions');
// $questions_stmt->execute();
// $questions = $questions_stmt->fetchAll();

// // 問題をシャッフルする
// $count = range(1, count($questions));
// shuffle($questions);
?>


@section('content')
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

        @foreach ($questions as $question)
            <div>{{ $question->question }}</div>
        @endforeach

    </section>
@endsection
