import React from 'react'

const Contact = () => {
    return (
        <section className="contact">
            <div className="contact__inner">
                <div className="contact__content">
                    <div className="contact__heading">
                        <div className="contact__icon line__icon">
                            <img src="assets/img/icon/icon-line.svg" alt="LINE" />
                        </div>
                        <h2 className="contact__title">POSSE 公式LINE</h2>
                    </div>
                    <p className="contact__text">
                        公式LINEにてご質問を随時受け付けております。<br />詳細やPOSSE最新情報につきましては、公式LINEにてお知らせ致しますので<br />下記ボタンより友達追加をお願いします！
                    </p>
                    <div className="contact__button">
                        <a href="https://line.me/R/ti/p/@651htnqp?from=page" className="contact__link">
                            LINE追加<img src="assets/img/icon/icon-link-gray-dark.svg" alt="LINEリンク" />
                        </a>
                    </div>
                </div>
            </div>
        </section>
    )
}

export default Contact
