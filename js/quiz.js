"use strict";

{
  //  クイズの配列
  let quiz = [
    {
      quizNumber: 0,
      question:
        "日本のIT人材が2030年には最大どれくらい不足すると言われているでしょうか？",
      image: "../img/quiz/img-quiz01.png",
      select1: "約28万人",
      select2: "約79万人",
      select3: "約183万人",
      answer: "約79万人",
      quote: "経済産業省 2019年3月 - IT 人材需給に関する調査",
    },
    {
      quizNumber: 1,
      question:
        "既存業界のビジネスと、先進的なテクノロジーを結びつけて生まれた、新しいビジネスのことをなんと言うでしょう？",
      image: "../img/quiz/img-quiz02.png",
      select1: "INTECH",
      select2: "BIZZTECH",
      select3: "X-TECH",
      answer: "X-TECH",
    },
    {
      quizNumber: 2,
      question: "IoTとは何の略でしょう？",
      image: "../img/quiz/img-quiz03.png",
      select1: "Internet of Things",
      select2: "Integrate into Technology",
      select3: "Information  on Tool",
      answer: "Internet of Things",
    },
    {
      quizNumber: 3,
      question:
        "日本が目指すサイバー空間とフィジカル空間を高度に融合させたシステムによって開かれる未来社会のことをなんと言うでしょうか？",
      image: "../img/quiz/img-quiz04.png",
      select1: "Society 5.0",
      select2: "CyPhy",
      select3: "SDGs",
      answer: "SDGs",
      quote: "Society5.0 - 科学技術政策 - 内閣府",
    },
    {
      quizNumber: 4,
      question:
        "イギリスのコンピューター科学者であるギャビン・ウッド氏が提唱した、ブロックチェーン技術を活用した「次世代分散型インターネット」のことをなんと言うでしょう？",
      image: "../img/quiz/img-quiz05.png",
      select1: "Web3.0",
      select2: "NFT",
      select3: "メタバース",
      answer: "Web3.0",
    },
    {
      quizNumber: 5,
      question:
        "先進テクノロジー活用企業と出遅れた企業の収益性の差はどれくらいあると言われているでしょうか？",
      image: "../img/quiz/img-quiz06.png",
      select1: "約2倍",
      select2: "約5倍",
      select3: "約11倍",
      answer: "約5倍",
      quote: "Accenture Technology Vision 2021 ",
    },
  ];

  // クイズの順番をランダムに入れ替える関数
  const shuffleQuiz = ([...array]) => {
    for (let i = array.length - 1; i >= 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
  };

  // 引用文を作成するための関数
  function createQuote(i) {
    const quoteHtml = `<div class="quote">
      <div class="quote__icon">
        <img src="../img/icon/icon-note.svg" alt="引用">
      </div>
      <p class="quote__text">${quiz[i].quote}</p>
    </div>`;

    // クイズの配列に引用文が存在する場合のみhtmlを作成する
    if (quiz[i].quote) {
      return quoteHtml;
    } else {
      return "";
    }
  }

  // クイズを作成するための関数
  function createQuiz(i) {
    const quizSection = document.getElementById("quiz__section");

    const quizHtml = `<div class="quiz__inner">
    <h2 class="quiz__icon quiz__number" id="quizNumber">Q${i + 1}</h2>
    <h3 class="quiz__text">${quiz[i].question}</h3>
    <div class="quiz__caption">
      <img src="${quiz[i].image}" alt="クイズ画像">
    </div>
    <div class="answer">
      <h2 class="quiz__icon answer__icon">A</h2>
      <div class="answer__list">
        <button class="answer__item quiz${i + 1}__btn">${
      quiz[i].select1
    }</button>
        <button class="answer__item quiz${i + 1}__btn">${
      quiz[i].select2
    }</button>
        <button class="answer__item quiz${i + 1}__btn">${
      quiz[i].select3
    }</button>
      </div>
    </div>
    <div class="judgement judgement__correct" id="js__quiz${i + 1}__correct">
      <h3>正解!</h3>
      <p><span>A</span>${quiz[i].answer}</p>
    </div>
    <div class="judgement judgement__wrong" id="js__quiz${i + 1}__wrong">
      <h3>不正解...</h3>
      <p><span>A</span>${quiz[i].answer}</p>
    </div>
    ${createQuote(i)}
    </div>`;

    return quizSection.insertAdjacentHTML("beforeend", quizHtml);
  }

  // ボタンのクリックイベント処理を作成する関数
  function clickButton(i) {
    const btn = document.querySelectorAll(`.quiz${i + 1}__btn`);
    const correct = document.getElementById(`js__quiz${i + 1}__correct`);
    const wrong = document.getElementById(`js__quiz${i + 1}__wrong`);
    const quizAnswer = quiz[i].answer;
    let btnClicked;

    btn.forEach((e) => {
      e.addEventListener("click", () => {
        const clickedAnswer = e.innerHTML;

        if (btnClicked !== true) {
          e.classList.add("js-selected");
          if (clickedAnswer === quizAnswer) {
            correct.classList.add("js-on");
          } else {
            wrong.classList.add("js-on");
          }
        }

        btnClicked = true;
      });
    });
  }

  // 以降html内の処理
  quiz = shuffleQuiz(quiz);

  // クイズhtml作成、クリックイベントの繰り返し処理
  for (let i = 0; i < quiz.length; i++) {
    createQuiz(i);
    clickButton(i);
  }
}
