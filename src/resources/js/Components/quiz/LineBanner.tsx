import React from 'react'

const LineBanner = () => {
    return (
        <div className="banner">
            <a href="https://line.me/R/ti/p/@651htnqp?from=page" className="banner__link">
                <div className="banner__icon line__icon">
                    <img src="assets/img/icon/icon-line.svg" alt="LINE" />
                </div>
                <p className="banner__text">POSSE公式LINEで<br className="break" />最新情報をGET！</p>
                <div className="banner__icon">
                    <img src="assets/img/icon/icon-link-light.svg" alt="LINEリンク" />
                </div>
            </a>
        </div>
    )
}

export default LineBanner
