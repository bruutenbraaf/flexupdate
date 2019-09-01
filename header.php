<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bruut en Braaf">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <title><?php wp_title('&raquo;', 'true', 'right'); ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


    <nav>
        <div class="reading-progress"></div>
        <div class="container">
            <div class="d-flex align-items-center">
                <div class="mr-auto p-2 branding">
                    <?php $logo = get_field('logo'); ?>
                    <?php $logo = get_field('logo', 'option'); ?>
                    <?php if ($logo) { ?>
                        <a href="<?php echo get_home_url(); ?>">
                            <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
                        </a>
                    <?php } ?>
                </div>
                <div class="p-2 mx">
                    <button id="newsletterbtn"><?php _e('Gratis nieuwsbrief', 'flexupdate'); ?></button>
                </div>
                <div class="p-2 mx">
                    <?php wp_nav_menu(array('theme_location' => 'main_menu')); ?>
                </div>
                <div class="p-2 search ma">
                    <div class="search-button">
                        <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="13.5" cy="8.5" r="7.5" stroke="#333333" stroke-width="2" />
                            <line x1="7.70711" y1="14.7071" x2="0.707107" y2="21.7071" stroke="#333333" stroke-width="2" />
                        </svg>
                    </div>
                </div>
                <div class="p-2 xl ma">
                    <div class="hamburger">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="tabs-nav">
        <?php wp_nav_menu(array('theme_location' => 'side_menu')); ?>
    </div>
    <div class="mobile-nav">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php wp_nav_menu(array('theme_location' => 'mobile_menu')); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="search--form">
        <div class="inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo home_url('/'); ?>" method="get">
                            <input type="text" name="s" id="search" placeholder="Geef een zoekterm op" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Geef een zoekterm op'" value="<?php the_search_query(); ?>" />
                            <input type="submit" id="searchsubmit" value="Zoeken" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="newsletter--bar">
        <div class="inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="mc_embed_signup" class="d-flex">
                            <?php echo do_shortcode('[mailchimp]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>