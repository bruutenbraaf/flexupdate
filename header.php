<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bruut en Braaf">
    <meta name="theme-color" content="#403f92">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <title><?php wp_title('&raquo;', 'true', 'right'); ?><?php bloginfo('name'); ?></title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-162900085-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-162900085-1');
    </script>
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
                <div class="p-2 mx btnsnav">
                    <div class="nav-second-btn news-btn">Aanmelden nieuwsbrief</div>
                    <?php wp_nav_menu(array('theme_location' => 'main_menu')); ?>
                </div>
                <div class="p-2 search ma order-2 order-lg-1">
                    <div class="search-button src-toggle">
                        <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="13.5" cy="8.5" r="7.5" stroke="#333333" stroke-width="2" />
                            <line x1="7.70711" y1="14.7071" x2="0.707107" y2="21.7071" stroke="#333333" stroke-width="2" />
                        </svg>
                    </div>
                    <form action="<?php echo home_url('/'); ?>" method="get">
                        <input type="text" name="s" id="search" placeholder="Geef een zoekterm op" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Geef een zoekterm op'" value="<?php the_search_query(); ?>" />
                    </form>
                </div>
                <div class="p-2 hmd order-md-3 order-lg-2">
                    <div class="hamb hmb-toggle">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <?php
                if (is_user_logged_in()) { ?>
                    <?php $editProfile = get_field('profiel_aanpassen_pagina', 'option'); ?>
                    <?php if ($editProfile) { ?>
                        <div class="p-2 order-1 order-md-1 order-lg-3">
                            <?php
                            global $current_user;
                            get_currentuserinfo();
                            $url = get_author_posts_url($current_user->ID);
                            $loged = get_current_user_id();
                            $afbeelding = get_field('user_info_afbeelding', 'user_' . $loged); ?>
                            <?php $placeholder = get_field('upload_placeholder', 'option'); ?>
                            <a href="<?php echo $url; ?>">
                                <div class="user_img" style="background-image:url(<?php if ($afbeelding) { ?><?php echo $afbeelding; ?><?php } else { ?><?php echo $placeholder['sizes']['large']; ?><?php } ?>);">
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                <?php } ?>
                <div class="p-2 xl ma order-3">
                    <div class="hamburger m-tg">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="tabs-nav <?php if (is_archive()) { ?>tab-archive<?php } ?>">
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
        <ul class="socials">
            <?php $facebook = get_field('facebook', 'option'); ?>
            <?php if ($facebook) { ?>
                <li>
                    <a href="<?php echo $facebook['url']; ?>" target="<?php echo $facebook['target']; ?>">
                        <svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.32925 18V9.94922H0.496582V6.75H3.32925V4.2293C3.32925 1.49063 5.08721 0 7.65397 0C8.8838 0 9.94005 0.0878906 10.2466 0.126562V2.98828H8.46647C7.07045 2.98828 6.80084 3.62109 6.80084 4.5457V6.75H9.95113L9.51902 9.94922H6.80084V18" fill="#545A63" />
                        </svg>
                    </a>
                </li>
            <?php } ?>
            <?php $twitter = get_field('twitter', 'option'); ?>
            <?php if ($twitter) { ?>
                <li>
                    <a href="<?php echo $twitter['url']; ?>" target="<?php echo $twitter['target']; ?>">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <path d="M16.1464 5.61444C16.1578 5.76209 16.1578 5.90977 16.1578 6.05742C16.1578 10.5609 12.4459 15.75 5.66158 15.75C3.57146 15.75 1.62984 15.191 -0.00341797 14.2207C0.293548 14.2523 0.579053 14.2629 0.887445 14.2629C2.61204 14.2629 4.19963 13.725 5.46741 12.8074C3.84557 12.7758 2.48643 11.7949 2.01814 10.4449C2.24659 10.4765 2.475 10.4976 2.71487 10.4976C3.04608 10.4976 3.37733 10.4554 3.68568 10.3816C1.99533 10.0652 0.727518 8.69413 0.727518 7.03828V6.9961C1.21862 7.24923 1.78973 7.40743 2.39502 7.4285C1.40136 6.81677 0.75037 5.77264 0.75037 4.59138C0.75037 3.95858 0.933078 3.3785 1.2529 2.87225C3.0689 4.93944 5.79862 6.28941 8.85951 6.43709C8.80241 6.18397 8.76814 5.92032 8.76814 5.65665C8.76814 3.77928 10.4128 2.25 12.4572 2.25C13.5194 2.25 14.4788 2.66133 15.1527 3.32578C15.9864 3.17813 16.7859 2.89335 17.4941 2.50313C17.2199 3.29416 16.6374 3.95861 15.8722 4.38046C16.6146 4.30667 17.3342 4.11678 17.9966 3.85314C17.4941 4.52811 16.8659 5.12926 16.1464 5.61444Z" fill="#545A63" />
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="18" height="18" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </li>
            <?php } ?>
            <?php $youtube = get_field('youtube', 'option'); ?>
            <?php if ($youtube) { ?>
                <li>
                    <a href="<?php echo $youtube['url']; ?>" target="<?php echo $youtube['target']; ?>">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <path d="M17.6205 4.24494C17.4134 3.45969 16.8035 2.84125 16.0291 2.63137C14.6253 2.25 8.99658 2.25 8.99658 2.25C8.99658 2.25 3.36785 2.25 1.9641 2.63137C1.18966 2.84128 0.579725 3.45969 0.372709 4.24494C-0.00341797 5.66826 -0.00341797 8.63788 -0.00341797 8.63788C-0.00341797 8.63788 -0.00341797 11.6075 0.372709 13.0308C0.579725 13.8161 1.18966 14.4088 1.9641 14.6186C3.36785 15 8.99658 15 8.99658 15C8.99658 15 14.6253 15 16.0291 14.6186C16.8035 14.4088 17.4134 13.8161 17.6205 13.0308C17.9966 11.6075 17.9966 8.63788 17.9966 8.63788C17.9966 8.63788 17.9966 5.66826 17.6205 4.24494V4.24494ZM7.15566 11.3341V5.94169L11.8602 8.63795L7.15566 11.3341V11.3341Z" fill="#545A63" />
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="18" height="18" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </li>
            <?php } ?>
            <?php $linkedin = get_field('linkedin', 'option'); ?>
            <?php if ($linkedin) { ?>
                <li>
                    <a href="<?php echo $linkedin['url']; ?>" target="<?php echo $linkedin['target']; ?>">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.02901 18H0.297255V5.98259H4.02901V18V18ZM2.16112 4.3433C0.968087 4.3433 0 3.35491 0 2.16161C0 0.968303 0.968087 0 2.16112 0C3.35416 0 4.32225 0.968303 4.32225 2.16161C4.32225 3.35491 3.35416 4.3433 2.16112 4.3433ZM17.996 18H14.2723V12.15C14.2723 10.7558 14.2441 8.96786 12.3321 8.96786C10.3919 8.96786 10.0946 10.4826 10.0946 12.0496V18H6.36688V5.98259H9.94599V7.62187H9.99821C10.4963 6.67768 11.7135 5.68125 13.5291 5.68125C17.3051 5.68125 18 8.1683 18 11.3987V18H17.996Z" fill="#545A63" />
                        </svg>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>

    <div class="sd--menu">
        <div class="sd--menu-inner">
            <div class="col">
                <?php wp_nav_menu(array('theme_location' => 'hamburger')); ?>
                <ul class="socials">
                    <?php $facebook = get_field('facebook', 'option'); ?>
                    <?php if ($facebook) { ?>
                        <li>
                            <a href="<?php echo $facebook['url']; ?>" target="<?php echo $facebook['target']; ?>">
                                <svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.32925 18V9.94922H0.496582V6.75H3.32925V4.2293C3.32925 1.49063 5.08721 0 7.65397 0C8.8838 0 9.94005 0.0878906 10.2466 0.126562V2.98828H8.46647C7.07045 2.98828 6.80084 3.62109 6.80084 4.5457V6.75H9.95113L9.51902 9.94922H6.80084V18" fill="#545A63" />
                                </svg>
                            </a>
                        </li>
                    <?php } ?>
                    <?php $twitter = get_field('twitter', 'option'); ?>
                    <?php if ($twitter) { ?>
                        <li>
                            <a href="<?php echo $twitter['url']; ?>" target="<?php echo $twitter['target']; ?>">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                        <path d="M16.1464 5.61444C16.1578 5.76209 16.1578 5.90977 16.1578 6.05742C16.1578 10.5609 12.4459 15.75 5.66158 15.75C3.57146 15.75 1.62984 15.191 -0.00341797 14.2207C0.293548 14.2523 0.579053 14.2629 0.887445 14.2629C2.61204 14.2629 4.19963 13.725 5.46741 12.8074C3.84557 12.7758 2.48643 11.7949 2.01814 10.4449C2.24659 10.4765 2.475 10.4976 2.71487 10.4976C3.04608 10.4976 3.37733 10.4554 3.68568 10.3816C1.99533 10.0652 0.727518 8.69413 0.727518 7.03828V6.9961C1.21862 7.24923 1.78973 7.40743 2.39502 7.4285C1.40136 6.81677 0.75037 5.77264 0.75037 4.59138C0.75037 3.95858 0.933078 3.3785 1.2529 2.87225C3.0689 4.93944 5.79862 6.28941 8.85951 6.43709C8.80241 6.18397 8.76814 5.92032 8.76814 5.65665C8.76814 3.77928 10.4128 2.25 12.4572 2.25C13.5194 2.25 14.4788 2.66133 15.1527 3.32578C15.9864 3.17813 16.7859 2.89335 17.4941 2.50313C17.2199 3.29416 16.6374 3.95861 15.8722 4.38046C16.6146 4.30667 17.3342 4.11678 17.9966 3.85314C17.4941 4.52811 16.8659 5.12926 16.1464 5.61444Z" fill="#545A63" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                            <rect width="18" height="18" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </li>
                    <?php } ?>
                    <?php $youtube = get_field('youtube', 'option'); ?>
                    <?php if ($youtube) { ?>
                        <li>
                            <a href="<?php echo $youtube['url']; ?>" target="<?php echo $youtube['target']; ?>">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                        <path d="M17.6205 4.24494C17.4134 3.45969 16.8035 2.84125 16.0291 2.63137C14.6253 2.25 8.99658 2.25 8.99658 2.25C8.99658 2.25 3.36785 2.25 1.9641 2.63137C1.18966 2.84128 0.579725 3.45969 0.372709 4.24494C-0.00341797 5.66826 -0.00341797 8.63788 -0.00341797 8.63788C-0.00341797 8.63788 -0.00341797 11.6075 0.372709 13.0308C0.579725 13.8161 1.18966 14.4088 1.9641 14.6186C3.36785 15 8.99658 15 8.99658 15C8.99658 15 14.6253 15 16.0291 14.6186C16.8035 14.4088 17.4134 13.8161 17.6205 13.0308C17.9966 11.6075 17.9966 8.63788 17.9966 8.63788C17.9966 8.63788 17.9966 5.66826 17.6205 4.24494V4.24494ZM7.15566 11.3341V5.94169L11.8602 8.63795L7.15566 11.3341V11.3341Z" fill="#545A63" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                            <rect width="18" height="18" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </li>
                    <?php } ?>
                    <?php $linkedin = get_field('linkedin', 'option'); ?>
                    <?php if ($linkedin) { ?>
                        <li>
                            <a href="<?php echo $linkedin['url']; ?>" target="<?php echo $linkedin['target']; ?>">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.02901 18H0.297255V5.98259H4.02901V18V18ZM2.16112 4.3433C0.968087 4.3433 0 3.35491 0 2.16161C0 0.968303 0.968087 0 2.16112 0C3.35416 0 4.32225 0.968303 4.32225 2.16161C4.32225 3.35491 3.35416 4.3433 2.16112 4.3433ZM17.996 18H14.2723V12.15C14.2723 10.7558 14.2441 8.96786 12.3321 8.96786C10.3919 8.96786 10.0946 10.4826 10.0946 12.0496V18H6.36688V5.98259H9.94599V7.62187H9.99821C10.4963 6.67768 11.7135 5.68125 13.5291 5.68125C17.3051 5.68125 18 8.1683 18 11.3987V18H17.996Z" fill="#545A63" />
                                </svg>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>