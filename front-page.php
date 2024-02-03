<?php get_header(); ?>

<main>
    <section class="sidebar">
       <div class="sidebar__content fade-in">
        <div class="sidebar__content__nav">
            <a href="#" aria-label="Home"><i class="fa-solid fa-house"></i></a>
            <a href="#" aria-label="About Me"><i class="fa-solid fa-user"></i></a>
            <a href="#" aria-label="Services"><i class="fa-solid fa-bars-staggered"></i></a>
            <a href="#" aria-label="Portfolio"><i class="fa-solid fa-computer"></i></a>
            <a href="#" aria-label="Testimonial"><i class="fa-solid fa-message"></i></a>
            <a href="#" aria-label="Contact"><i class="fa-solid fa-envelope"></i></a>
        </div>
        <div class="sidebar__content__socials">
            <a href="#"><i class="fa-regular fa-envelope"></i></a>
            <a href="#"><i class="fa-brands fa-github"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-behance"></i></a>
            <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
        </div>
       </div>
    </section>

    <section class="main-content">
        <div class="main-content__inner">
            <section class="home-section" id="home-section">
                <div class="section-indicator">
                    <i class="fa-solid fa-house"></i>
                    <p>Home</p>
                </div>
                <h1>Hi, I<span class="font-switch">'</span>m <span>Morgan</span></h1>
                <h2>A Website <span>Developer</span> and <span>Designer</span></h2>
                <p>Specialising in WordPress sites, I can build you something to suit your needs. Ranging from small, static sites to bespoke WordPress themes.</p>
            </section>

            <section class="about-section" id="about-section">
                <div class="section-indicator">
                    <i class="fa-solid fa-user"></i>
                    <p>About Me</p>
                </div>
                <h3>Interested in getting to <span>know</span> me?</h3>
                <p>I am a web developer from <span>Glasgow</span> working for a creative agency in the city. Qualified in <span>Computer Science</span> to BA degree level, with additional qualifications under my belt, I have plenty experience and know-how.</p>
                <p>Currently working as a <span>WordPress</span> developer, I have been in my role for <span>3</span> years and have gained knowledge and experience to build upon my passion for <span>front-end</span> work and design. This combination gives me a unique set of skills which allows me to not only develop a website that is easy on the eyes, but is also both <span>functional and accessible</span>.</p>
                <p>I am a solid <span>multitasker</span> and have a strong attention to detail, as well as experience brought with me from my educational and professional careers. I am currently taking on work as a <span>freelancer</span> so if you are interested in working together, <a href="#">get in touch</a>!</p>
            </section>

            <section class="services-section" id="services-section">
                <div class="section-indicator">
                    <i class="fa-solid fa-bars-staggered"></i>
                    <p>Services</p>
                </div>
                <h3>What can I <span>offer</span> you?</h3>
                <div class="services-section__boxes">
                    <div class="services-section__boxes__box">
                        <div class="top">
                            <i class="fa-brands fa-wordpress-simple"></i>
                            <h4>WordPress</h4>
                        </div>
                        <p>Specialising in WordPress, I can update your chosen theme, or I can build you a custom theme from scratch tailored to your exact needs.</p>
                    </div>
                    <div class="services-section__boxes__box">
                        <div class="top">
                            <i class="fa-solid fa-laptop"></i>
                            <h4>Small Sites</h4>
                        </div>
                        <p>If WordPress is too heavy and a smaller site that needs updated less frequently is more suited to your needs, then I also develop sites built without a CMS.</p>
                    </div>
                    <div class="services-section__boxes__box">
                        <div class="top">
                            <i class="fa-solid fa-chart-line"></i>
                            <h4>Google Analytics</h4>
                        </div>
                        <p>Wondering how your site performs? Which pages do better than others? I add Google Analytics to all sites so you are able to track your sites performance.</p>
                    </div>
                    <div class="services-section__boxes__box">
                        <div class="top">
                            <i class="fa-solid fa-pen-nib"></i>
                            <h4>Design</h4>
                        </div>
                        <p>If you aren't sure how you want your site to look, I can work with you and create a design you are happy with before work begins. On top of site designs, I also provide graphic design services. You can check out my  <a href="#">Instagram account</a> to see some examples of my work there.</p>
                    </div>
                    <div class="services-section__boxes__box">
                        <div class="top">
                            <i class="fa-solid fa-question"></i>
                            <h4>Other</h4>
                        </div>
                        <p>Do you have a request you cannot find the answer to here? Or do you have questions about anything I offer? <a href="#">Get in touch</a> with any queries you might have and I will answer ASAP!</p>
                    </div>
                </div>
            </section>

            <section class="portfolio-section" id="portfolio-section">
                <div class="section-indicator">
                    <i class="fa-solid fa-computer"></i>
                    <p>Portfolio</p>
                </div>
            </section>

            <section class="testimonials-section" id="testimonials-section">
                <div class="section-indicator">
                    <i class="fa-solid fa-message"></i>
                    <p>Testimonials</p>
                </div>
            </section>

            <section class="contact-section" id="contact-section">
                <div class="section-indicator">
                    <i class="fa-solid fa-envelope"></i>
                    <p>Contact</p>
                </div>
            </section>
        </div>
        <?php get_footer(); ?>
    </section>
</main>

<?php wp_footer(); ?>
</body>
</html>