<?php
get_header(); ?>
<section id="opleiding">

    <div class="container">
        <div class="row">
            <div class="offset-md-1 col-md-10 int">
                <h1><?php _e('Opleidingen', 'flexupdate'); ?></h1>
            </div>
            <?php $loop = new WP_Query(array(
                'post_type' => 'opleidingen',
                'posts_per_page' => 3,
                'order' => 'DESC'
            )); ?>
            <?php if ($loop->have_posts()) { ?>
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                    <div class="col-md-10 offset-md-1 opl-col">
                        <a href="<?php the_permalink(); ?>">
                            <article class="opl-item">
                                <div class="opl--heading">
                                    <h4><?php the_title(); ?></h4>
                                    <?php if (have_rows('gegevens_opleiding')) : ?>
                                        <?php while (have_rows('gegevens_opleiding')) : the_row(); ?>
                                            <span class="location ml-auto"> <?php the_sub_field('locatie_opleiding'); ?></span>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                                <?php if (have_rows('gegevens_opleiding')) : ?>
                                    <?php while (have_rows('gegevens_opleiding')) : the_row(); ?>
                                        <div class="inf">
                                            <p><?php the_sub_field('korte_omschrijving'); ?></p>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
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
            <?php } else { ?>
                <div class="col-md-10 offset-md-1 np-col">
                    <p><?php _e('Er zijn nog geen opleidingen', 'flexupdate'); ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>