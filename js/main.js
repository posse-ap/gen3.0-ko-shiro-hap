'use strict';

{
  /**
   * @typedef quiz クイズの配列
   * @property {string} question 質問
   * @property {string} image 画像URL
   * @property {string} select1 選択肢１
   * @property {string} select2 選択肢２
   * @property {string} select3 選択肢３
   * @property {string} answer 答え
   * @property {string | undefined} quote 引用文
   */
  const quiz = [
    {
      question: '日本のIT人材が2030年には最大どれくらい不足すると言われているでしょうか？',
      image: '../img/quiz/img-quiz01.png',
      select1: '約28万人',
      select2: '約79万人',
      select3: '約183万人',
      answer: '約79万人',
      quote: '経済産業省 2019年3月 - IT 人材需給に関する調査',
    },
    {
      question: '既存業界のビジネスと、先進的なテクノロジーを結びつけて生まれた、新しいビジネスのことをなんと言うでしょう？',
      image: '../img/quiz/img-quiz02.png',
      select1: 'INTECH',
      select2: 'BIZZTECH',
      select3: 'X-TECH',
      answer: 'X-TECH',
    },
    {
      question: 'IoTとは何の略でしょう？',
      image: '../img/quiz/img-quiz03.png',
      select1: 'Internet of Things',
      select2: 'Integrate into Technology',
      select3: 'Information  on Tool',
      answer: 'Internet of Things',
    },
    {
      question: '日本が目指すサイバー空間とフィジカル空間を高度に融合させたシステムによって開かれる未来社会のことをなんと言うでしょうか？',
      image: '../img/quiz/img-quiz04.png',
      select1: 'Society 5.0',
      select2: 'CyPhy',
      select3: 'SDGs',
      answer: 'SDGs',
      quote: 'Society5.0 - 科学技術政策 - 内閣府',
    },
    {
      question: 'イギリスのコンピューター科学者であるギャビン・ウッド氏が提唱した、ブロックチェーン技術を活用した「次世代分散型インターネット」のことをなんと言うでしょう？',
      image: '../img/quiz/img-quiz05.png',
      select1: 'Web3.0',
      select2: 'NFT',
      select3: 'メタバース',
      answer: 'Web3.0',
    },
    {
      question: '先進テクノロジー活用企業と出遅れた企業の収益性の差はどれくらいあると言われているでしょうか？',
      image: '../img/quiz/img-quiz06.png',
      select1: '約2倍',
      select2: '約5倍',
      select3: '約11倍',
      answer: '約5倍',
      quote: 'Accenture Technology Vision 2021 ',
    },
  ];


  /**
   * @description ボタンを作成するための関数
   * @param {number} i カウント
   * @type {string} buttons buttonのhtml
   * @returns {string}
   */
  function createButtons(i) {
    const buttons = `    <button class="answer__item quiz${i+1}__btn">${quiz[i].select1}</button>
    <button class="answer__item quiz${i+1}__btn">${quiz[i].select2}</button>
    <button class="answer__item quiz${i+1}__btn">${quiz[i].select3}</button>`;
    return buttons;
  };


  /**
   * @description 引用文を作成するための関数
   * @param {number} i カウント
   * @type {string} quoteHtml quoteのhtml
   * @returns {string}
   */
  function createQuote(i) {
    const quoteHtml = `<div class="quote">
      <div class="quote__icon">
        <img src="../img/icon/icon-note.svg" alt="引用">
      </div>
      <p class="quote__text">${quiz[i].quote}</p>
    </div>`;

    /**
     * @description クイズの配列に引用文が存在する場合のみhtmlを作成する
     */
    if (quiz[i].quote) {
      return quoteHtml;
    } else {
      return "";
    }
  };


  /**
   * @description クイズを作成するための関数
   * @param {number} i カウント
   * @type {HTMLElement} quizSection クイズセクションを取得
   * @type {string} quizHtml quiz__innerのhtml
   * @returns {string}
   */
  function createQuiz(i) {
    const quizSection = document.getElementById('quiz__section');

    const quizHtml = `<div class="quiz__inner">
    <h2 class="quiz__icon quiz__number" id="quizNumber">Q${i+1}</h2>
    <h3 class="quiz__text">${quiz[i].question}</h3>
    <div class="quiz__caption">
      <img src="../img/quiz/img-quiz0${i+1}.png" alt="クイズ画像">
    </div>
    <div class="answer">
      <h2 class="quiz__icon answer__icon">A</h2>
      <div class="answer__list">
        ${createButtons(i)}
      </div>
    </div>
    <div class="judgement judgement__correct" id="js__quiz${i+1}__correct">
      <h3>正解!</h3>
      <p><span>A</span>${quiz[i].answer}</p>
    </div>
    <div class="judgement judgement__wrong" id="js__quiz${i+1}__wrong">
      <h3>不正解...</h3>
      <p><span>A</span>${quiz[i].answer}</p>
    </div>
    ${createQuote(i)}
    </div>`;

    return quizSection.insertAdjacentHTML('beforeend', quizHtml);
  };


  /**
   * @description ボタンのクリックイベント処理を作成する関数
   * @param {number} i
   * @type {HTMLElement} btn i番目の問題のボタン全てを取得
   * @type {HTMLElement} correct 正解画面を取得
   * @type {HTMLElement} wrong 不正解画面を取得
   * @type {string} quizAnswer i番目のクイズの正解を取得
   * @type {boolean} btnClicked ボタンを押したか押してないかの判断
   */
  function clickButton(i) {
    const btn = document.querySelectorAll(`.quiz${i+1}__btn`);
    const correct = document.getElementById(`js__quiz${i+1}__correct`);
    const wrong = document.getElementById(`js__quiz${i+1}__wrong`);
    const quizAnswer = quiz[i].answer;
    let btnClicked;

    btn.forEach((e) => {
      e.addEventListener('click', () => {
        const clickedAnswer = e.innerHTML;

        if(btnClicked !== true) {
          e.classList.add('js__selected');
          if(clickedAnswer === quizAnswer) {
            correct.classList.add('js__on');
          }
          else {
            wrong.classList.add('js__on');
          };
        };

        btnClicked = true;
      });
    });
  };


  /**
   * @description クイズ作成、クリックイベントの繰り返し処理
   * @param {number} i カウント
   */
  for(let i = 0; i < quiz.length; i++) {
    createQuiz(i);
    clickButton(i);
  };
}


