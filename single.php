<?php
get_header(); ?>
<main id="static">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="container">
                <div class="row">
                    <div class="offset-md-2 col-md-8 intro">
                        <h1><?php the_title(); ?></h1>
                        <?php the_field('intro_text'); ?>
                    </div>
                </div>
            </div>
            <?php $postimage = get_the_post_thumbnail_url('', 'medium'); ?>
            <?php $placeholder = get_field('upload_placeholder', 'option'); ?>
            <div class="post--image" style="background-image:url( <?php if ($postimage) { ?> <?php echo $postimage; ?> <?php } else { ?> <?php echo $placeholder['sizes']['medium']; ?> <?php } ?>);">
            </div>
            <div class="container">
                <div class="row">
                    <div class="offset-md-2 col-md-8">
                        <?php the_content();?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</main>
<?php get_footer(); ?>