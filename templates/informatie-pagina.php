<!-- 
    Template name: Informatieve pagina
-->

<?php
get_header(); ?>
<main id="info">
    <?php if (have_rows('header_informatiev_page')) : ?>
        <?php while (have_rows('header_informatiev_page')) : the_row(); ?>
            <?php if (have_rows('header_informatieve')) : ?>
                <?php while (have_rows('header_informatieve')) : the_row(); ?>
                    <div class="archive-header">
                        <div class="container">
                            <div class="row">
                                <div class="offset-md-1 col-md-9 col-11 page-heading">
                                    <h1><?php the_title(); ?></h1>
                                    <?php if (get_sub_field('content_header')) { ?>
                                        <p><?php the_sub_field('content_header'); ?></p>
                                    <?php } ?>
                                    <?php if (have_rows('knoppen_informatieve')) : ?>
                                        <?php while (have_rows('knoppen_informatieve')) : the_row(); ?>
                                            <?php $knop_informatieve = get_sub_field('knop_informatieve'); ?>
                                            <?php if ($knop_informatieve) { ?>
                                                <a class="btn<?php if (get_sub_field('is_secondair') == 1) { ?> secondair<?php } ?>" href="<?php echo $knop_informatieve['url']; ?>" target="<?php echo $knop_informatieve['target']; ?>"><?php echo $knop_informatieve['title']; ?></a>
                                            <?php } ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="breadcrumbs">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if (function_exists('yoast_breadcrumb')) {
                                        yoast_breadcrumb('');
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php if (have_rows('informatie_blok')) : ?>
        <section id="info_block">
            <div class="container">
                <div class="row">
                    <div class="offset-md-1 col-md-10 cont-col">
                        <div class="row">
                            <div class="col-md-12">
                                <?php while (have_rows('informatie_blok')) : the_row(); ?>
                                    <?php $afbeelding = get_sub_field('afbeelding'); ?>
                                    <?php if ($afbeelding) { ?>
                                        <div class="sngl-bigm" style="background-image:url(<?php echo $afbeelding['sizes']['large']; ?>);"></div>
                                    <?php } ?>
                                </div>
                                <div class="col-md-10 infcol">
                                    <h2><?php the_sub_field('titel'); ?></h2>
                                    <?php the_sub_field('content'); ?>
                                    <?php if (have_rows('knoppen')) : ?>
                                        <?php while (have_rows('knoppen')) : the_row(); ?>
                                            <?php $knop = get_sub_field('knop'); ?>
                                            <?php if ($knop) { ?>
                                                <a class="btn <?php if (get_sub_field('is_secondair') == 1) { ?> secondair<?php } ?>" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                                            <?php } ?>

                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
        </section>
    <?php endif; ?>

    <?php if (have_rows('extra_informatie')) : ?>
        <section id="sec">
            <div class="container container--sec">
                <div class="row">
                    <?php while (have_rows('extra_informatie')) : the_row(); ?>
                        <div class="col-md-11 offset-md-1">
                            <h2 class="heading"><?php the_sub_field('titel'); ?></h2>
                        </div>
                        <?php if (have_rows('kolommen')) : ?>
                            <?php while (have_rows('kolommen')) : the_row(); ?>
                                <div class="offset-md-1 col-md-3 info-col">
                                    <?php if (have_rows('content')) : ?>
                                        <?php while (have_rows('content')) : the_row(); ?>
                                            <?php if (get_row_layout() == 'titel_h2') : ?>
                                                <h5 class="sec-title"><?php the_sub_field('h2_title'); ?></h5>
                                            <?php elseif (get_row_layout() == 'wysiwyg_tekstvlak') : ?>
                                                <?php the_sub_field('content_info'); ?>
                                            <?php elseif (get_row_layout() == 'knoppen') : ?>
                                                <?php if (have_rows('voeg_knoppen_toe')) : ?>
                                                    <?php while (have_rows('voeg_knoppen_toe')) : the_row(); ?>
                                                        <?php $knop_inf = get_sub_field('knop_inf'); ?>
                                                        <?php if ($knop_inf) { ?>
                                                            <a class="btn <?php if (get_sub_field('is_secondair') == 1) { ?> secondair<?php } ?>" href="<?php echo $knop_inf['url']; ?>" target="<?php echo $knop_inf['target']; ?>"><?php echo $knop_inf['title']; ?></a>
                                                        <?php } ?>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <?php
                            ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php if (get_field('diensten_tonen') == 1) { ?>
        <?php if (have_rows('diensten_section')) : ?>
            <?php while (have_rows('diensten_section')) : the_row(); ?>
                <section id="services">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <?php if (get_sub_field('titel')) { ?>
                                    <h2 class="section-title"><?php the_sub_field('titel'); ?></h2>
                                <?php } ?>
                                <?php the_sub_field('tekst'); ?>
                            </div>
                            <div class="col-md-6 more">
                                <?php $knop = get_sub_field('alle_diensten_knop'); ?>
                                <?php if ($knop) { ?>
                                    <a class="small-btn" href="<?php echo $knop['url']; ?>" <?php if ($knop['target']) { ?>target="<?php echo $knop['target']; ?>" <?php } ?>><?php echo $knop['title']; ?></a>
                                <?php } ?>
                            </div>

                            <?php $loop = new WP_Query(array(
                                'post_type' => 'diensten',
                                'posts_per_page' => 8,
                                'order' => 'DESC'
                            )); ?>
                            <?php if ($loop->have_posts()) : ?>
                                <div class="col-md-12 services-main">
                                    <?php $i = 0; ?>
                                    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                        <?php $i++; ?>
                                    <?php endwhile; ?>
                                    <div class="services-items <?php if ($i <= 4) { ?> is_four <?php } ?>">
                                        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                            <?php setup_postdata($post); ?>
                                            <?php if (have_rows('informatie_dienst')) : ?>
                                                <?php while (have_rows('informatie_dienst')) : the_row(); ?>
                                                    <?php $dienst_afbeelding = get_sub_field('dienst_afbeelding'); ?>
                                                    <div class="item" <?php if ($dienst_afbeelding) { ?>style="background-image:url(<?php echo $dienst_afbeelding['sizes']['serviceshome']; ?>);" <?php } ?>>
                                                        <div class="inner">
                                                            <h2><?php the_title(); ?></h2>
                                                            <p class="description"><?php the_sub_field('korte_omschrijving'); ?></p>
                                                        </div>
                                                        <a class="the-link" href="<?php the_permalink(); ?>"></a>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </div>
                                    <div class="next-slide">
                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 8.06307V4.94019C0 4.50754 0.334338 4.15947 0.749916 4.15947H6.99922V0.782856C6.99922 0.0867145 7.80538 -0.261356 8.28033 0.229847L13.7797 5.94862C14.0734 6.2544 14.0734 6.74885 13.7797 7.05464L8.28033 12.7702C7.8085 13.2614 6.99922 12.9133 6.99922 12.2171V8.84379H0.749916C0.334338 8.84379 0 8.49571 0 8.06307Z" fill="white" />
                                        </svg>
                                    </div>
                                </div>
                                <script>
                                    jQuery(document).ready(function() {
                                        jQuery('.services-items').slick({
                                            infinite: true,
                                            slidesToShow: 5,
                                            slidesToScroll: 1,
                                            autoPlay: false,
                                            dots: false,
                                            accessibility: false,
                                            prevArrow: jQuery('.prev-slide'),
                                            nextArrow: jQuery('.next-slide'),
                                            responsive: [{
                                                    breakpoint: 1560,
                                                    settings: {
                                                        slidesToShow: 4,
                                                        slidesToScroll: 1,
                                                    }
                                                },
                                                {
                                                    breakpoint: 991,
                                                    settings: {
                                                        slidesToShow: 3,
                                                        slidesToScroll: 1
                                                    }
                                                },
                                                {
                                                    breakpoint: 768,
                                                    settings: {
                                                        slidesToShow: 2,
                                                        slidesToScroll: 1
                                                    }
                                                }
                                            ]
                                        })
                                    });
                                </script>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php endwhile; ?>
        <?php endif; ?>
    <?php } ?>
    <?php if (get_field('het_team_tonen') == 1) { ?>
        <section id="our-team">
            <div class="container">
                <div class="row">
                    <?php if (have_rows('het_team')) : ?>
                        <?php while (have_rows('het_team')) : the_row(); ?>
                            <div class="offset-md-1 col-md-4">
                                <h2><?php the_sub_field('titel'); ?></h2>
                                <?php the_sub_field('content'); ?>
                                <?php $knop = get_sub_field('knop'); ?>
                                <?php if ($knop) { ?>
                                    <a class="small-btn" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                                <?php } ?>
                            </div>
                            <?php $selecteer_personeeel = get_sub_field('selecteer_personeeel'); ?>
                            <?php if ($selecteer_personeeel) : ?>
                                <div class="col-md-6 offset-md-1 team">
                                    <div class="row">
                                        <?php $i = 0; ?>
                                        <?php foreach ($selecteer_personeeel as $post) :  ?>
                                            <?php $i++; ?>
                                            <?php setup_postdata($post); ?>
                                            <div class="<?php if ($i <= 2) { ?>col-md-6 col-6 member<?php } else if ($i <= 5) { ?>col-md-4 col-6 member<?php } else if ($i <= 7) { ?>col-md-6 col-6 member<?php } else { ?>col-md-4 col-6 member<?php } ?>">
                                                <?php $profielfoto_werknemer = get_field('profielfoto_werknemer'); ?>
                                                <?php if ($profielfoto_werknemer) { ?>
                                                    <div class="profile" style="background-image:url(<?php echo $profielfoto_werknemer['sizes']['partnershome']; ?>);">
                                                    </div>
                                                <?php } ?>
                                                <div class="information">
                                                    <span class="name"><?php the_title(); ?></span>
                                                    <span class="function"><?php the_field('functie_werknemer'); ?></span>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php wp_reset_postdata(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php } ?>
</main>

<?php get_footer(); ?>