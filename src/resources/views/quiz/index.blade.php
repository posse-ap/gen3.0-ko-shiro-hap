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
        <div class="quiz__hero__inner" style=" background-image: url('{{ asset('img/quiz/bg-hero.jpg') }}');">
            <div class="quiz__hero__heading">
                <h2 class="quiz__hero__lead">POSSE課題</h2>
                <h1 class="quiz__hero__title">ITクイズ</h1>
            </div>
        </div>
    </section>

    <section class="quiz" id="quiz__section">

        <!-- 問題ごとに繰り返す -->
        @foreach ($questions as $question)
            <div class="quiz__inner">
                <h2 class="quiz__icon quiz__number" id="quizNumber">Q{{ $question->id }}</h2>
                <h3 class="quiz__text">{{ $question->question }}</h3>
                <div class="quiz__caption">
                    <img src="{{ 'img/quiz/' . $question->image }}" alt="クイズ画像">
                </div>
                <div class="answer">
                    <h2 class="quiz__icon answer__icon">A</h2>
                    <div class="answer__list">

                        <!-- 問題ごとの選択肢を繰り返す -->
                        @foreach ($question->choices as $choice)
                            <button class="answer__item quiz{{ $question->id }}__btn" id="{{ $choice->question_id }}"
                                onclick="clickFunction({{ $choice->question_id }}, {{ $question->id }}, {{ $choice->valid }})">{{ $choice->choice }}</button>
                        @endforeach
                    </div>
                </div>
                {{-- 正解判定など --}}
        @endforeach

        </div>

        @foreach ($questions as $question)
            <div>{{ $question->question }}</div>

            @foreach ($question->choices as $choice)
                <div>{{ $choice->choice }}</div>
            @endforeach
        @endforeach

    </section>
@endsection
