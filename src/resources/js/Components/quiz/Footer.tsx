import React from 'react'
import LineBanner from './LineBanner'

const Footer = () => {
    return (
        <footer className="footer">
            <LineBanner />
            <div className="footer__head">
                <div className="footer__logo">
                    <img src="assets/img/logo.svg" alt="フッターロゴ" />
                </div>
                <div className="footer__official__link">
                    <a href="https://posse-ap.com/">
                        POSSE公式サイト<img src="assets/img/icon/icon-link-gray-dark.svg" alt="公式サイトリンク" />
                    </a>
                </div>
                <nav className="nav">
                    <ul className="nav__list">
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
            <div className="footer__foot">
                <small className="footer__copyright">&copy;2022 POSSE</small>
            </div>
        </footer>
    )
}

export default Footer
