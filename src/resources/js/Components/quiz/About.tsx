import React from 'react'

const About = () => {
    return (
        <section className="about">
            <div className="about__heading">
                <h2 className="about__title">POSSEとは</h2>
                <h3 className="about__subtitle">About POSSE</h3>
            </div>
            <div className="about__content">
                <div className="about__thumbnail">
                    <img src="assets/img/img-about.jpg" alt="about-img" />
                </div>
                <p className="about__text">
                    学生プログラミングコミュニティ「POSSE(ポッセ)」は、人格とプログラミング、二つの面での成長をスローガンに活動しており、大学生だけが集まって学びを深めるコミュニティです。<br/>プログラミングだけではありません。オフラインでのイベントや、旅行など様々な企画を行っています！<br/>それらを通じて、夏休みの大半をPOSSEで出来た仲間と過ごす人もたくさんいるほどメンバーとの仲が深まります。
                </p>
            </div>
        </section>
    )
}

export default About
