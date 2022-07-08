'use strict';

{

  const Q = [
    '日本のIT人材が2030年には最大どれくらい不足すると言われているでしょうか？',
    '約28万人',
    '約79万人',
    '約183万人',
  ];

  // 変数・定数
  const BTN = document.querySelectorAll(".btn");
  const ANSWER_BUTTONS = document.querySelectorAll(".answer-buttons");
  const Q1_ANSWER = Q[1];
  let btnClicked;
  let correctJudgment;
  // 正誤判定後のメッセージ作成
  const NEW_ANSWER_MESSAGE = document.createElement("div");

  // ボタンからHTMLを取得
  BTN.forEach((e) => {
    e.addEventListener('click', () => {
      const ANSWER = e.innerHTML;

      if(btnClicked !== true) {
        e.classList.add('test');

        if(ANSWER === Q1_ANSWER) {
          console.log('aaa');
          correctJudgment = true;
        }
        else {
          console.log('eee');
          correctJudgment = false;
        };
      };
      btnClicked = true;
      // console.log(correctJudgment);
      if(correctJudgment === true) {
        console.log('ttt');
        e.after(NEW_ANSWER_MESSAGE);
        NEW_ANSWER_MESSAGE.textContent = '正解';
      }
      else {
        e.after(NEW_ANSWER_MESSAGE);
        NEW_ANSWER_MESSAGE.textContent = '不正解';
      }
    });
  });



  ANSWER_BUTTONS.forEach((e) => {
    if(correctJudgment === true) {
      console.log('ttt');
      NEW_ANSWER_MESSAGE.textContent = '正解';
      e.before(NEW_ANSWER_MESSAGE);
    }
  });

}

