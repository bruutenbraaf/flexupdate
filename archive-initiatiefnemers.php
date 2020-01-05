<?php
get_header(); ?>
<section id="initiatiefnemers">

    <div class="container">
        <div class="row">
            <div class="offset-md-1 col-md-10 int">
                <h1><?php _e('Initiatiefnemers', 'flexupdate'); ?></h1>
            </div>
            <div class="col-md-10 offset-md-1">
                <div class="row">
                    <?php $loop = new WP_Query(array(
                        'post_type' => 'initiatiefnemers',
                        'posts_per_page' => 9,
                        'order' => 'DESC'
                    )); ?>
                    <?php if ($loop->have_posts()) : ?>
                        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                            <div class="col-md-4 pr-col">
                                <a href="<?php the_permalink(); ?>">
                                    <article class="pr-item">
                                        <div class="pr--heading pr-img">
                                            <?php $promotor = get_the_post_thumbnail_url('', 'medium'); ?>
                                            <?php if ($promotor) { ?>
                                                <img src="<?php echo $promotor; ?>">
                                            <?php } ?>
                                        </div>
                                        <div class="pr--btn">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 8H15M15 8L8 1M15 8L8 15" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </article>
                                </a>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section> <?php get_footer(); ?>