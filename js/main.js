'use strict';

{
  const questions = [
    '日本のIT人材が2030年には最大どれくらい不足すると言われているでしょうか？',
    '約28万人',
    '約79万人',
    '約183万人',
  ];

  // 変数・定数
  const btn = document.querySelectorAll(".btn");
  const correctMessage = document.querySelector('.correct-wrapper');
  const wrongMessage = document.querySelector('.wrong-wrapper');
  let btnClicked;
  // 繰り返し処理必要
  const q1Answer = questions[1];


  // ボタンからHTMLを取得
  btn.forEach((e) => {
    e.addEventListener('click', () => {
      const answer = e.innerHTML;

      if(btnClicked !== true) {
        e.classList.add('selected');
        if(answer === q1Answer) {
          console.log('aaa');
          correctMessage.classList.add('js-correct');
        }
        else {
          console.log('eee');
          wrongMessage.classList.add('js-wrong');
        };
      };

      btnClicked = true;
    });
  });
}


