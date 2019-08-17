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
    global $post;
    $page_number = get_query_var('page') ? get_query_var('page') : 1;
    $loop = new WP_Query(array(
        'post_type' => array('flexnieuws', 'flexmarkt'),
        'posts_per_page' => 1,
        'paged' => $paged,
        'order' => 'DESC',
    )); ?>
    <?php if ($loop->have_posts()) : ?>
        <section id="posts">
            <?php $currentdate = date('m / d'); ?>
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
                            <div class="col-md-10 the--post">
                                <div class="d-flex">
                                    <div class="post--info">
                                        <h2><?php the_title(); ?></h2>
                                        <p><?php echo excerpt(40); ?></p>
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
                </article>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </section>
        <section id="pagination">
            <div class="d-flex justify-content-center">
            <?php pagination(); ?>
            </div>
        </section>
    <?php endif; ?>

</main>
<?php get_footer(); ?>