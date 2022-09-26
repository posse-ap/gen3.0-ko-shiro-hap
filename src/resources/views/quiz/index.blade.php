@extends('layouts.index')

@section('content')
    @php
        // 問題番号のためのカウントを定義
        $count = 0;
    @endphp

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
            @php
                // 問題番号を1ずつ増やす
                $count++;
            @endphp

            <div class="quiz__inner">
                <h2 class="quiz__icon quiz__number" id="quizNumber">Q{{ $count }}</h2>
                <h3 class="quiz__text">{{ $question->question }}</h3>
                <div class="quiz__caption">
                    <img src="{{ asset('img/quiz/' . $question->image) }}" alt="クイズ画像">
                </div>
                <div class="answer">
                    <h2 class="quiz__icon answer__icon">A</h2>
                    <div class="answer__list">

                        <!-- 問題ごとの選択肢を繰り返す -->
                        @foreach ($question->choices as $choice)
                            <button class="answer__item quiz{{ $question->id }}__btn" id="{{ $choice->id }}"
                                onclick="clickFunction({{ $choice->id }}, {{ $question->id }}, {{ $choice->valid }})">{{ $choice->choice }}</button>
                        @endforeach
                    </div>
                </div>
                <!-- 正解判定など -->
                @foreach ($question->choices as $choice)
                    @if ($choice->valid == 1)
                        <div class="judgement judgement__correct" id="js__quiz{{ $question->id }}__correct">
                            <h3>正解!</h3>
                            <p><span>A</span>{{ $choice->choice }}</p>
                        </div>
                        <div class="judgement judgement__wrong" id="js__quiz{{ $question->id }}__wrong">
                            <h3>不正解...</h3>
                            <p><span>A</span>{{ $choice->choice }}</p>
                        </div>
                    @endif
                @endforeach

                <!-- 引用テキストがある場合のみ表示させる -->
                @foreach ($question->notes as $note)
                    <div class="quote">
                        <div class="quote__icon">
                            <img src="../img/icon/icon-note.svg" alt="引用">
                        </div>
                        <p class="quote__text">{{ $note->note }}</p>
                    </div>
                @endforeach

            </div>
        @endforeach


        <div>{{ $questions }}</div>
        </div>

    </section>
@endsection
