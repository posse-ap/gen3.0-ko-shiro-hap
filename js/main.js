'use strict';

{
  const modal = document.getElementById('post-modal')
  const modalOpen = document.getElementById('modal-open');
  const spModalOpen = document.getElementById('sp-modal-open');
  const modalClose = document.getElementById('modal-close');
  const postButton = document.getElementById('post-button');
  const postInner = document.getElementById('post-modal-inner');
  const postCompletion = document.getElementById('post-completion');
  const body = document.querySelector('body');

  // 記録・投稿ボタンクリック時にモーダルを開く
  modalOpen.addEventListener('click',()=> {
    console.log('aaa');
    console.log(body);
    modal.classList.add('js-block');
  })

  // スマホの記録・投稿ボタンクリック時にモーダルを開く
  spModalOpen.addEventListener('click',()=> {
    modal.classList.add('js-block');
  })

  // モーダルのバツボタンを押したときにモーダルを閉じる
  modalClose.addEventListener('click',()=> {
    modal.classList.remove('js-block');
    postCompletion.classList.remove('js-flex')
    postInner.classList.remove('js-off');
  })

  //
  postButton.addEventListener('click',()=> {
    postCompletion.classList.add('js-flex');
    postInner.classList.add('js-off');
  })
}