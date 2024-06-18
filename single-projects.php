<?php
$terms = get_the_terms(get_the_ID(), 'technologies');
if ($terms && !is_wp_error($terms)) {
    $term_links = array();
    foreach ($terms as $term) {
        $term_links[] = '<a href="' . esc_attr(get_term_link($term->slug, 'technologies')) . '">' . __($term->name) . '</a>';
    }
    $all_terms = join(', ', $term_links);
}
?>

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

    <section class="main-content projects-content">
        <div class="projects-content__wrapper">
            <div class="projects-content__intro">
                <h1><?php echo get_the_title(); ?></h1>
                <p>Technologies used: <?php echo $all_terms; ?></p>
                <picture>
                    <!-- Mobile Image -->
                    <!-- @if (!empty($image_mobile)) -->
                    <!-- <source media="(max-width: 600px)" srcset="{!! $image_mobile['url'] !!}"> -->
                    <!-- @endif -->
                    <!-- Desktop Image -->
                    <!-- <source media="(min-width: 601px)" srcset="{!! $image !!}"> -->
                    <!-- Fallback Image -->
                    <img class="fade-in" aria-hidden="true" loading="lazy" decoding="async" src="<?php the_post_thumbnail_url(); ?>" alt="">
                </picture>
            </div>

            <div class="projects-content__main">
                <?php the_content(); ?>
            </div>
        </div>

        <?php get_footer(); ?>
    </section>
</main>

<?php wp_footer(); ?>
</body>

</html>