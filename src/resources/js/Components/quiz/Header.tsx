import React from 'react'

const Header = () => {
    return (
        <header className="header">
            <div className="header__inner">
                <div className="header__logo">
                    <img src="assets/img/logo.svg" alt="ヘッダーロゴ" className="logo__item" />
                </div>
                <nav className="nav">
                    <ul className="nav__list">
                        <li className="nav__item"><a href="../">POSSEとは</a></li>
                        <li className="nav__item"><a href="../quiz">クイズ</a></li>
                        <li className="nav__item nav__sns__item">
                            <a href="https://twitter.com/posse_program?s=21&t=17ohMH_KX9S6thPqV4Pqpw">
                                <img src="assets/img/icon/icon-twitter.svg" alt="Twitter" />
                            </a>
                        </li>
                        <li className="nav__item nav__sns__item">
                            <a href="https://instagram.com/posse_programming?igshid=YmMyMTA2M2Y=">
                                <img src="assets/img/icon/icon-instagram.svg" alt="Instagram" />
                            </a>
                        </li>
                    </ul>
                </nav>
                <div className="hamburger" id="js-hamburger">
                    <span id="js-hamburger__head"></span>
                    <span id="js-hamburger__foot"></span>
                </div>
                <nav className="hamburger__nav" id="js-hamburger__nav">
                    <ul className="hamburger__nav__items">
                        <li><a href="../">POSSEとは</a></li>
                        <li><a href="../quiz/">クイズ</a></li>
                    </ul>
                    <div className="hamburger__nav__button">
                        <a href="https://line.me/R/ti/p/@651htnqp?from=page" className="contact__link">
                            <img src="assets/img/icon/icon-line.svg" alt="LINEアイコン" className="line__icon" />
                            POSSE公式LINE追加
                            <img src="assets/img/icon/icon-link-light.svg" alt="LINEリンク" className="link__icon" />
                        </a>
                    </div>
                    <div className="hamburger__nav__official__link">
                        <a href="https://posse-ap.com/">
                            POSSE公式サイト
                            <img src="assets/img/icon/icon-link-gray-dark.svg" alt="公式サイトリンク" />
                        </a>
                    </div>
                    <ul className="hamburger__nav__list">
                        <li className="nav__item nav__sns__item">
                            <a href="https://twitter.com/posse_program?s=21&t=17ohMH_KX9S6thPqV4Pqpw">
                                <img src="assets/img/icon/icon-twitter.svg" alt="Twitter" />
                            </a>
                        </li>
                        <li className="nav__item nav__sns__item">
                            <a href="https://instagram.com/posse_programming?igshid=YmMyMTA2M2Y=">
                                <img src="assets/img/icon/icon-instagram.svg" alt="Instagram" />
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
    )
}

export default Header
