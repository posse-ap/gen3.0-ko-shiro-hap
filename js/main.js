'use strict';

{
  const modal = document.getElementById('post-modal')
  const modalOpen = document.getElementById('modal-open');
  const spModalOpen = document.getElementById('sp-modal-open');
  const modalClose = document.getElementById('modal-close');
  const postButton = document.getElementById('post-button');
  const postInner = document.getElementById('post-modal-inner');
  const postCompletion = document.getElementById('post-completion');
  const fullPage = document.body;

  // 記録・投稿ボタンクリック時にモーダルを開く
  modalOpen.addEventListener('click',()=> {
    modal.classList.add('js-block');
    fullPage.classList.add('js-body');
  })

  // スマホの記録・投稿ボタンクリック時にモーダルを開く
  spModalOpen.addEventListener('click',()=> {
    modal.classList.add('js-block');
    fullPage.classList.add('js-body');
  })

  // モーダルのバツボタンを押したときにモーダルを閉じる
  modalClose.addEventListener('click',()=> {
    modal.classList.remove('js-block');
    postCompletion.classList.remove('js-flex')
    postInner.classList.remove('js-off');
    fullPage.classList.remove('js-body');
  })

  //
  postButton.addEventListener('click',()=> {
    postCompletion.classList.add('js-flex');
    postInner.classList.add('js-off');
  })

}