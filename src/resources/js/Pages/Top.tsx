import Header from '@/Components/quiz/Header';
import Footer from '@/Components/quiz/Footer';
import TopHero from '@/Components/quiz/TopHero';
import About from '@/Components/quiz/About';
import Contact from '@/Components/quiz/Contact';

export default function Top() {
    return (
        <>
            <Header />
            <main className='main'>
                <TopHero />
                <About />
            </main>
            <Contact />
            <Footer />
        </>
    );
}
