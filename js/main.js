'use strict';

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
    quote: '',
  },
  {
    question: 'IoTとは何の略でしょう？',
    image: '../img/quiz/img-quiz03.png',
    select1: 'Internet of Things',
    select2: 'Integrate into Technology',
    select3: 'Information  on Tool',
    answer: 'Internet of Things',
    quote: '',
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
    quote: '',
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


// 複製するquiz__innerを取得
const quizInner = document.getElementById('quiz1');



// quizの繰り返し表示処理
for (let i = quiz.length; i >= 2; i--) {
  const cloneQuiz = quizInner.cloneNode(true);
  const getQuizNumber = document.getElementById('quizNumber');
  console.log(getQuizNumber);

  
  cloneQuiz.id = `quiz${i}`;
  quizInner.after(cloneQuiz);
  getQuizNumber.innerHTML = `Q${i-1}`;
};

// // quizに中身を追加
// for (let i = 1; i <= quiz.length; i++) {
//   const getQuizNumber = document.getElementById(`title${i}`);
//   getQuizNumber.innerHTML = `Q${i}`;
// };










{
  const questions = [
    '日本のIT人材が2030年には最大どれくらい不足すると言われているでしょうか？',
    '約28万人',
    '約79万人',
    '約183万人',
  ];

  // 変数・定数
  const btn = document.querySelectorAll('.answer__item');
  const correct = document.querySelector('.judgement__correct');
  const wrong = document.querySelector('.judgement__wrong');
  let btnClicked;
  // 繰り返し処理必要
  const q1Answer = questions[1];





  // ボタンからHTMLを取得
  btn.forEach((e) => {
    e.addEventListener('click', () => {
      const answer = e.innerHTML;

      if(btnClicked !== true) {
        e.classList.add('js__selected');
        if(answer === q1Answer) {
          correct.classList.add('js__correct');
        }
        else {
          wrong.classList.add('js__wrong');
        };
      };

      btnClicked = true;
    });
  });
}

