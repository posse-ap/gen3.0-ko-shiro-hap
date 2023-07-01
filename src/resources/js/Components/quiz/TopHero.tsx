import React from 'react'

const TopHero = () => {
    return (
        <section className="top__hero">
            <div className="top__hero__heading">
                <h2 className="top__hero__lead">学生プログラミングコミュニティ POSSE（ポッセ）</h2>
                <h1 className="top__hero__title">自分史上最高<br className="break" />を仲間と。</h1>
            </div>
            <div className="top__hero__thumbnail">
                <img src="assets/img/img-hero.jpg" alt="top__hero-img" />
            </div>
            <small className="top__hero__inducing">Scroll Down</small>
        </section>
    )
}

export default TopHero
