<?php
get_template_part('template-parts/head', 'part');
?>

<header>
    <a href="#mainContent" class="skip-to-content sr-only">Skip to main content</a>
    <h1 class="sr-only">Morgan McDonald</h1>
    <div class="header-inner">
        <div class="header-content fade-in">
            <div class="header-content__left">
                <a href="/">morganmcdonald</a>
            </div>
            <nav class="header-content__right">
                <a href="#">about me</a>
                <a href="#">projects</a>
                <a href="#">services</a>
                <a href="#">contact</a>
            </nav>
        </div>
        <div class="header-content-mobile fade-in">
            <div class="mobile-header-visible">
                <div class="header-content-mobile__left">

                    <a href="/"><img src="/wp-content/themes/morganmcdonald-theme/images/logo-colour.svg" alt=""> morganmcdonald</a>
                </div>
                <div class="header-content-mobile__right">
                    <div class="mobile-menu-button" id="menu-button" role="button" aria-label="open menu" tabindex="0">
                        <div class="mobile-menu-button__wrapper">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu" id="mobile-menu">
                <nav>
                    <a href="#">about me</a>
                    <a href="#">projects</a>
                    <a href="#">services</a>
                    <a href="#">contact</a>
                </nav>
            </div>
        </div>
    </div>
</header>