<?php
get_header(); ?>
<section id="opleiding">

    <div class="container">
        <div class="row">
            <div class="offset-md-1 col-md-10 int">
                <h1><?php _e('Initiatiefnemers', 'flexupdate'); ?></h1>
            </div>
            <?php $loop = new WP_Query(array(
                'post_type' => 'initiatiefnemers',
                'posts_per_page' => 9,
                'order' => 'DESC'
            )); ?>
            <?php if ($loop->have_posts()) : ?>
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                    <div class="col-md-4 offset-md-1 opl-col">
                        <a href="<?php the_permalink(); ?>">
                            <article class="opl-item">
                                <div class="opl--heading">
                                    <?php $promotor = get_the_post_thumbnail_url('', 'medium'); ?>
                                    <?php if ($promotor) { ?>
                                        <a href="<?php the_permalink(); ?>"><img src="<?php echo $promotor; ?>"></a>
                                    <?php } ?>
                                </div>
                                <div class="opl--btn">
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
</section>
<?php get_footer(); ?>