<?php
get_header(); ?>

<main id="hp">
    <?php if (have_rows('counters')) : ?>
    <section id="counter">
        <div class="container count">
            <div class="row">
                <div class="offset-md-2 col-md-8 d-flex justify-content-between">
                    <?php while (have_rows('counters')) : the_row(); ?>
                    <?php if (have_rows('eerste_counter')) : ?>
                    <?php while (have_rows('eerste_counter')) : the_row(); ?>
                    <div class="counters">
                        <span class="countnumber"><?php the_sub_field('getal'); ?></span>
                        <span class="countitem"><?php the_sub_field('beschrijving'); ?></span>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    <?php if (have_rows('Tweede_counter')) : ?>
                    <?php while (have_rows('Tweede_counter')) : the_row(); ?>
                    <div class="counters">
                        <span class="countnumber"><?php the_sub_field('getal'); ?></span>
                        <span class="countitem"><?php the_sub_field('beschrijving'); ?></span>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    <?php if (have_rows('derde_counter')) : ?>
                    <?php while (have_rows('derde_counter')) : the_row(); ?>
                    <div class="counters">
                        <span class="countnumber"><?php the_sub_field('getal'); ?></span>
                        <span class="countitem"><?php the_sub_field('beschrijving'); ?></span>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>



    <?php
    $currentdate = date('m / d');
    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
    $loop = new WP_Query(array(
        'post_type' => 'items',
        'posts_per_page' => 10, 'paged' => $paged,
        'order' => 'DESC'
    ));
    ?>
    <?php if ($loop->have_posts()) : ?>
    <section id="posts">
        <?php $count = 0; ?>
        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
        <article>
            <div class="container">
                <div class="row">
                    <div class="col-md-1">
                        <?php $postdate = get_the_time('m / d'); ?>
                        <?php if ($currentdate == $postdate) { ?>
                        <span class="post--date"><?php _e('Vandaag', 'flexupdate'); ?></span>
                        <?php } else { ?>
                        <span class="post--date"><?php the_time('m / d'); ?></span>
                        <span class="post--date"> <?php the_time('l'); ?></span>
                        <?php } ?>
                    </div>
                    <div class="col-md-10 the--post" data-emergence="hidden">
                        <div class="wrapper-cell">
                            <div class="text">
                                <div class="text-line"> </div>
                                <div class="text-line"></div>
                                <div class="text-line"></div>
                                <div class="text-line"></div>
                            </div>
                            <div class="image"></div>
                        </div>
                        <div class="post-inner">
                            <div class="d-flex">
                                <div class="post--info">
                                    <h2><?php the_title(); ?></h2>
                                    <p><?php echo excerpt(40); ?></p>
                                    <?php
                                            $terms = get_the_terms($post->ID, 'soort_item');
                                            if ($terms) {
                                                foreach ($terms as $term) {
                                                    $term_id = $term->term_id;
                                                }
                                            }
                                            ?>
                                    <?php
                                            $term_id_prefixed = '_' . $term_id;
                                            $bedrijfsicon = get_field('bedrijfsicon', $term_id_prefixed); ?>
                                    <?php if ($bedrijfsicon) { ?>
                                    <img src="<?php echo $bedrijfsicon['url']; ?>" alt="<?php echo $bedrijfsicon['alt']; ?>" />
                                    <?php } ?>
                                </div>
                                <div class="post--image">
                                    <?php $postimage = get_the_post_thumbnail_url('', 'medium'); ?>
                                    <?php $placeholder = get_field('upload_placeholder', 'option'); ?>
                                    <div class="the-post--image" style="background-image:url( <?php if ($postimage) { ?> <?php echo $postimage; ?> <?php } else { ?> <?php echo $placeholder['sizes']['medium']; ?> <?php } ?>);">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <?php $count++; ?>
        <?php if ($count == 2) { ?>
        <?php get_template_part('loops/loop', 'advertenties'); ?>
        <?php } ?>
        <?php if ($count == 5) { ?>
        <?php get_template_part('loops/loop', 'opleidingen'); ?>
        <?php } ?>
        <?php if ($count == 8) { ?>
        <?php echo do_shortcode("[uitzendplaats_latest_vacancies per_page='1']"); ?>
        <?php } ?>
        <?php endwhile; ?>
    </section>
    <section id="pagination">
        <div class="d-flex justify-content-center">
            <?php
                global $post;

                $tmp_post = $post;

                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                $args = array(
                    'post_type'              => 'post',
                    'post_status'            => 'publish',
                    'paged' => $paged,
                );


                $wp_query = null;
                $wp_query = new WP_Query();
                $wp_query->query($args);

                if ($wp_query->have_posts()) :

                    while ($wp_query->have_posts()) : $wp_query->the_post();


                        get_template_part('content', get_post_format());

                    endwhile;

                    if (function_exists('wp_paginate')) {
                        wp_paginate();
                    } else

                        get_template_part('content', 'none');

                endif;

                $post = $tmp_post;

                if (comments_open() || get_comments_number()) {
                    comments_template();
                } ?>
        </div>
    </section>
    <?php wp_reset_query(); ?>
    <?php endif; ?>
</main>
<?php get_footer(); ?>