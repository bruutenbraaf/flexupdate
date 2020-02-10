<footer>
    <?php if (have_rows('footer', 'option')) : ?>
        <?php while (have_rows('footer', 'option')) : the_row(); ?>
            <?php if (get_sub_field('toon_nieuwsbrief') == 1) { ?>
                <?php if (have_rows('nieuwsbrief')) : ?>
                    <?php while (have_rows('nieuwsbrief')) : the_row(); ?>
                        <section id="newsletter">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 offset-lg-0 col-md-10 offset-md-1">
                                        <div class="news-block">
                                            <div class="row align-items-center">
                                                <div class="col-lg-4 col-md-12">
                                                    <h4><?php the_sub_field('subtitle'); ?></h4>
                                                    <h2><?php the_sub_field('titel'); ?></h2>
                                                </div>
                                                <div class="col-lg-8 col-md-12 signup--form">
                                                    <div id="mc_embed_signup" class="justify-content-center d-flex">
                                                        <?php get_template_part('template-parts/content', 'mailblue'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php } ?>
            <?php if (get_sub_field('toon_initiatiefnemers') == 1) { ?>
                <section id="promoters">
                    <div class="container">
                        <div class="row">
                            <div class="offset-md-1 col-md-10 d-flex justify-content-center">
                                <div>
                                    <h3><?php the_sub_field('titel_initiatiefnemers'); ?></h3>
                                </div>
                            </div>
                            <div class="offset-md-1 col-md-10">
                                <div class="the--promotors">
                                    <?php $loop = new WP_Query(array(
                                        'post_type' => 'initiatiefnemers',
                                        'posts_per_page' => -1,
                                        'order' => 'RAND'
                                    )); ?>
                                    <?php if ($loop->have_posts()) : ?>
                                        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                            <div class="item">
                                                <?php $promotor = get_the_post_thumbnail_url('', 'medium'); ?>
                                                <?php if ($promotor) { ?>
                                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo $promotor; ?>"></a>
                                                <?php } ?>
                                            </div>
                                        <?php endwhile; ?>
                                        <?php wp_reset_postdata(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <script>
                    jQuery(document).ready(function() {
                        jQuery('.the--promotors').slick({
                            infinite: true,
                            slidesToShow: 4,
                            slidesToScroll: 4,
                            autoPlay: true,
                            arrows: false,
                            dots: true,
                            accessibility: false,
                            responsive: [{
                                    breakpoint: 1560,
                                    settings: {
                                        slidesToShow: 4,
                                        slidesToScroll: 4,
                                        autoPlay: true,
                                        arrows: false,
                                    }
                                },
                                {
                                    breakpoint: 991,
                                    settings: {
                                        slidesToShow: 3,
                                        slidesToScroll: 3,
                                        autoPlay: true,
                                        arrows: false,
                                    }
                                },
                                {
                                    breakpoint: 768,
                                    settings: {
                                        slidesToShow: 2,
                                        slidesToScroll: 3,
                                        autoPlay: true,
                                        arrows: false,
                                    }
                                }
                            ]
                        });
                    });
                </script>
            <?php } ?>
        <?php endwhile; ?>
    <?php endif; ?>
    <section id="nav">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <?php wp_nav_menu(array('theme_location' => 'socket_menu')); ?>
                </div>
            </div>
        </div>
    </section>
    <section id="socials">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
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
    </section>
</footer>
<div class="btp">
    <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M8.06307 14L4.94019 14C4.50754 14 4.15947 13.6657 4.15947 13.2501L4.15947 7.00078L0.782856 7.00078C0.0867142 7.00078 -0.261357 6.19462 0.229846 5.71967L5.94862 0.220287C6.2544 -0.0734302 6.74885 -0.0734302 7.05464 0.220287L12.7702 5.71967C13.2614 6.1915 12.9133 7.00078 12.2171 7.00078L8.84378 7.00078L8.84379 13.2501C8.84379 13.6657 8.49571 14 8.06307 14Z" fill="white" />
    </svg>
</div>
<?php wp_footer(); ?>
</body>

</html>