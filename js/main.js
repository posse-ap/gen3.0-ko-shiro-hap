'use strict';

{
  const modal = document.getElementById('modal')
  const modalOpen = document.getElementById('modal-open');
  const modalClose = document.getElementById('modal-close');
  const body = document.querySelector('body');

  // 記録・投稿ボタンクリック時にモーダルを開く
  modalOpen.addEventListener('click',()=> {
    console.log('aaa');
    console.log(body);
    modal.classList.add('js-on');
    body.classList.add('js-body');
  })

  // モーダルのバツボタンを押したときにモーダルを閉じる
  modalClose.addEventListener('click',()=> {
    modal.classList.remove('js-on');
  })

  addEventListener('click', outsideClose);
function outsideClose(e) {
  if (e.target == modal) {
    modal.classList.remove('js-on');
  }
}
}