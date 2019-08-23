<?php
get_header(); ?>
<main id="static">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h2><?php the_title(); ?></h2>
    <?php the_content(); ?>
    <?php endwhile; ?>
    <?php endif; ?>
</main>
<?php get_footer(); ?>