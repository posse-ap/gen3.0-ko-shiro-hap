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
    fullPage.classList.remove('js-post-opened');
  })

  // 投稿ローディング、5秒後に投稿完了
  const loader = document.getElementById('post-loader');
  function load(){
    loader.classList.add('js-flex');
    postInner.classList.add('js-off');
    setTimeout(() => {
      loader.classList.remove('js-flex');
      postCompletion.classList.add('js-flex');
    }, 5000);
  }

  // 記録・投稿ボタンクリック時のイベント
  postButton.addEventListener('click', () => {
    const twitterComment = document.getElementById('twitter-comment');
    const twitterCheckBox = document.getElementById('twitter');

    if(twitterCheckBox.checked && twitterComment.value) {
      openTwitter(twitterComment.value);
      load();

    } else if(twitterCheckBox.checked && twitterComment.value != true) {
      alert('コメントが入力されていません');

    } else if(twitterCheckBox.checked != true && twitterComment.value) {
      alert('シェアボタンをクリックするか、コメントを削除して下さい');

    } else {
      load();
    }
  })


  //openTwitter(投稿文、シェアするURL、ハッシュタグ、提供元アカウント)
  function openTwitter(text) {
    const twitter = "https://twitter.com/intent/tweet?text="+text;
    window.open(twitter,'_blank');
  }

}