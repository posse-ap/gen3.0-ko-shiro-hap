'use strict';

{

  const Q = [
    '日本のIT人材が2030年には最大どれくらい不足すると言われているでしょうか？',
    '約28万人',
    '約79万人',
    '約183万人',
  ];

  // 変数・定数
  const BTN_LIST= document.querySelectorAll(".answer-button");
  const BTN = document.querySelectorAll(".btn");
  const Q1_ANSWER = Q[1];
  let btnClicked;
  let listClicked;


  // ボタンからHTMLを取得
  BTN.forEach((e) => {
    e.addEventListener('click', () => {
      const ANSWER = e.innerHTML;

      if(btnClicked !== true) {
        if(ANSWER === Q1_ANSWER) {
          console.log('aaa');
        }
        else {
          console.log('eee');
        };
      };
      btnClicked = true;
    });
  });

  // ボタンの背景変更
  BTN_LIST.forEach((e) => {
    e.addEventListener('click', () => {
      if(listClicked !== true) {
        e.classList.add('test');
      }
      listClicked = true;
    });
  });

}