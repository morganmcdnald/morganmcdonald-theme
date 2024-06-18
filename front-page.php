<?php get_header(); ?>

<main>
    <section class="sidebar">
        <div class="sidebar__content fade-in">
            <div class="sidebar__content__logo">
                <img src="/wp-content/themes/morganmcdonald-theme/images/logo-colour.svg" alt="">
            </div>
            <div class="sidebar__content__socials">
                <a href="mailto:hello@morganmcdonald.co.uk" target="_blank" rel="noopener noreferrer"><i class="fa-regular fa-envelope"></i></a>
                <a href="https://github.com/morganmcdnald/" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-github"></i></a>
                <a href="https://www.linkedin.com/in/morganmcdonald13/" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="https://www.instagram.com/morgandzns/" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
    </section>

    <section class="main-content">
        <div class="main-content__inner">
            <section class="home-section fade-in" id="home-section">
                <h1>Hi, I<span class="font-switch">'</span>m Morgan</h1>
                <h2>A Website <span>Developer</span> and <span>Designer</span></h2>
                <p>Specialising in WordPress sites, I can build you something to suit your needs. Ranging from small, static sites to bespoke WordPress themes.</p>
            </section>

            <section class="about-section fade-in" id="about-section">
                <div class="section-indicator">
                    <p>about me</p>
                </div>
                <div class="text-wrapper">
                    <p>I am a web developer from <span>Ayrshire</span> working around the area as well as <span>Glasgow City</span>. Qualified in <span>Computer Science</span> to BA degree level, with additional qualifications under my belt, I have plenty experience and know-how.</p>
                    <p>My professional experience comes as a <span>WordPress</span> developer, where I worked in my role for 3 years before making the venture out into <span>freelance</span>. I have gained knowledge and experience to build upon my passion for <span>front-end</span> work and design. This combination gives me a unique set of skills which allows me to not only develop a website that is easy on the eyes, but is also both <span>functional and accessible</span>.</p>
                    <p>If you are interested in working together, please <a href="#">get in touch</a>!</p>
                </div>
            </section>

            <section class="portfolio-section fade-in" id="portfolio-section">
                <div class="section-top">
                    <div class="section-indicator">
                        <p>projects</p>
                    </div>
                    <a href="#">view all projects <i class="fa-solid fa-chevron-right"></i></a>
                </div>
                <div class="portfolio-section__boxes">
                    <?php
                    $projects = new WP_Query([
                        'post_type' => 'projects',
                        'posts_per_page' => 3,
                        'post_status' => 'publish'
                    ]);


                    while ($projects->have_posts()) {
                        $projects->the_post();
                        $id = get_the_id(); ?>

                        <a href="<?php echo get_the_permalink(); ?>" class="portfolio-section__boxes__box">
                            <div class="portfolio-section__boxes__box__tags">
                                <p>wordpress</p>
                                <p>react</p>
                            </div>
                            <img src="<?php the_post_thumbnail_url($id); ?>" alt="">
                            <div class="portfolio-section__boxes__box__text">
                                <h3><?php echo get_the_title($id); ?></h3>
                            </div>
                        </a>
                    <?php } //End while 
                    ?>
                </div>
            </section>

            <section class="services-section fade-in" id="services-section">
                <div class="section-indicator">
                    <p>services</p>
                </div>
                <div class="services-section__boxes">
                    <div class="services-section__boxes__box">
                        <div class="top">
                            <h4>WordPress</h4>
                        </div>
                        <p>Specialising in WordPress, I can update your chosen theme, or I can build you a custom theme from scratch tailored to your exact needs.</p>
                    </div>
                    <div class="services-section__boxes__box">
                        <div class="top">
                            <h4>Small Sites</h4>
                        </div>
                        <p>If WordPress is too heavy and a smaller site that needs updated less frequently is more suited to your needs, then I also develop sites built without a CMS.</p>
                    </div>
                    <div class="services-section__boxes__box">
                        <div class="top">
                            <h4>Google Analytics</h4>
                        </div>
                        <p>Wondering how your site performs? Which pages do better than others? I add Google Analytics to all sites so you are able to track your sites performance.</p>
                    </div>
                    <div class="services-section__boxes__box">
                        <div class="top">
                            <h4>Design</h4>
                        </div>
                        <p>If you aren't sure how you want your site to look, I can work with you and create a design you are happy with before work begins. On top of site designs, I also provide graphic design services. You can check out my <a href="#">Instagram</a> to see some examples of my work there.</p>
                    </div>
                    <div class="services-section__boxes__box">
                        <div class="top">
                            <h4>Other</h4>
                        </div>
                        <p>Do you have a request you cannot find the answer to here? Or do you have questions about anything I offer? <a href="#">Get in touch</a> with any queries you might have and I will answer ASAP!</p>
                    </div>
                </div>
            </section>

            <section class="contact-section fade-in" id="contact-section">
                <div class="section-indicator">
                    <p>contact</p>
                </div>
                <div class="form-wrapper">
                    <?php echo do_shortcode('[wpforms id="9"]'); ?>
                </div>
            </section>
        </div>
        <?php get_footer(); ?>
    </section>
</main>

<?php wp_footer(); ?>
</body>

</html>