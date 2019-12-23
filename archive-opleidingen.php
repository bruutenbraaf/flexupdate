<?php
get_header(); ?>
<main id="hp">
    <section id="posts">
        <?php $loop = new WP_Query(array(
            'post_type' => 'opleidingen',
            'posts_per_page' => 3,
            'order' => 'DESC'
        )); ?>
        <?php if ($loop->have_posts()) : ?>
            <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                <article>
                    <div class="container">
                        <div class="row">
                            <?php $postlink = get_field('item_link'); ?>
                            <div class="col-md-10 offset-md-1 the--post" data-emergence="hidden">
                                <a href="<?php if ($postlink) { ?><?php echo ($postlink); ?><?php } else { ?><?php the_permalink(); ?><?php } ?>" <?php if ($postlink) { ?>target="_blank" <?php } ?>>
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
                                        <?php if ('post' == get_post_type()) { ?>
                                            <div class="submitted--info d-flex justify-content-center">
                                                <span>
                                                    <?php _e('Ingezonden bericht', 'flexupdate'); ?>
                                                </span>
                                            </div>
                                        <?php } ?>
                                        <div class="d-flex">
                                            <div class="post--info">
                                                <h2><?php the_title(); ?>
                                                </h2>
                                                <p>
                                                    <?php echo excerpt(40); ?>
                                                </p>
                                            </div>
                                            <div class="post--image ml-auto">
                                                <?php $postimage = get_the_post_thumbnail_url('', 'medium'); ?>
                                                <?php $placeholder = get_field('upload_placeholder', 'option'); ?>
                                                <div class="the-post--image" style="background-image:url( <?php if ($postimage) { ?> <?php echo $postimage; ?> <?php } else { ?> <?php echo $placeholder['sizes']['medium']; ?> <?php } ?>);">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </section>
</main>
<?php get_footer(); ?>