<?php
get_header(); ?>
<main id="static">
    <div class="container">
        <div class="row">
            <div class="offset-md-2 col-md-8 intro">
                <h1><?php the_title(); ?></h1>
                <?php the_field('intro_text'); ?>
            </div>
        </div>
    </div>
    <?php $postimage = get_the_post_thumbnail_url('', 'large'); ?>
    <?php $placeholder = get_field('upload_placeholder', 'option'); ?>
    <div class="post--image" style="background-image:url( <?php if ($postimage) { ?> <?php echo $postimage; ?> <?php } else { ?> <?php echo $placeholder['sizes']['large']; ?> <?php } ?>);">
    </div>
    <div class="container">
        <div class="row">
            <div class="offset-md-2 col-md-8">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
    <div class="container share">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div id="shareBlock"></div>
                <script>
                    jQuery(document).ready(function() {
                        jQuery('#shareBlock').cShare({
                            show_buttons: [
                                'fb',
                                'twitter',
                                'linkedin',
                                'email'
                            ]
                        });
                    });
                </script>
            </div>
        </div>
    </div>

    <?php
    $thispost = get_the_ID();
    $currentdate = date('m / d');
    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
    $args = array(
        'post__not_in' => array($thispost),
        'post_type' => array('post'),
        'orderby' => 'rand',
        'posts_per_page' => 2,
    );
    $loop = new WP_Query($args);
    if ($loop->have_posts()) { ?>
        <section id="posts" class="recommend">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-2">
                        <?php _e('<h2>Aanbevolen artikelen</h2>', 'flexupdate'); ?>
                    </div>
                </div>
            </div>
            <?php $count = 0; ?>
            <?php while ($loop->have_posts()) {
                $loop->the_post(); ?>
                <article>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-1 offset-md-1">
                                <?php $postdate = get_the_time('m / d'); ?>
                                <?php if ($currentdate == $postdate) { ?>
                                    <span class="post--date"><?php _e('Vandaag', 'flexupdate'); ?></span>
                                    <span class="post--date"><?php the_time('d / m'); ?></span>
                                <?php } else { ?>
                                    <span class="post--date"> <?php the_time('l'); ?></span>
                                    <span class="post--date"><?php the_time('d / m'); ?></span>
                                <?php } ?>
                            </div>
                            <?php $postlink = get_field('item_link'); ?>
                            <div class="col-md-8 the--post the--post-single" data-emergence="hidden">
                                <a href="<?php if ($postlink) { ?><?php echo ($postlink); ?><?php } else { ?><?php the_permalink(); ?><?php } ?>" <?php if ($postlink) { ?>target="_blank" <?php } ?>>
                                    <div class="wrapper-cell">
                                        <div class="text">
                                            <div class="text-line"> </div>
                                            <div class="text-line"></div>
                                            <div class="text-line"></div>
                                        </div>
                                        <div class="image"></div>
                                    </div>
                                    <div class="post-inner">
                                        <div class="d-flex">
                                            <div class="post--info">
                                                <h2><?php the_title(); ?>
                                                </h2>
                                                <p>
                                                    <?php echo excerpt(20); ?>
                                                </p>
                                                <?php
                                                $terms = get_the_terms($post->ID, 'soort_item');
                                                if ($terms) {
                                                    foreach ($terms as $term) {
                                                        $term_id = $term->term_id;
                                                    }
                                                } ?>
                                                <?php
                                                $term_id_prefixed = '_' . $term_id;
                                                $bedrijfsicon = get_field('bedrijfsicon', $term_id_prefixed); ?>
                                                <?php if ($bedrijfsicon) { ?>
                                                    <img src="<?php echo $bedrijfsicon['url']; ?>" alt="<?php echo $bedrijfsicon['alt']; ?>" />
                                                <?php } else { ?>
                                                <?php } ?>
                                            </div>
                                            <div class="post--image post--image-single ml-auto ">
                                                <?php
                                                $placeholder = get_field('upload_placeholder', 'option');
                                                $term_id_prefixed = '_' . $term_id;
                                                $bedrijfafbeelding = get_field('bedrijfafbeelding', $term_id_prefixed); ?>
                                                <div class="the-post--image" style="background-image:url( <?php if ($bedrijfafbeelding) { ?> <?php echo $bedrijfafbeelding['url']; ?> <?php } else { ?> <?php echo $placeholder['sizes']['medium']; ?> <?php } ?>);">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
                <?php $count++; ?>
                <?php if ($count == 1) { ?>
                    <?php
                    $first_adv = new WP_Query(array(
                        'post_type' => 'advertenties',
                        'posts_per_page' => 1,
                        'orderby' => 'rand',
                    )); ?>
                    <?php if ($first_adv->have_posts()) : ?>
                        <?php while ($first_adv->have_posts()) : $first_adv->the_post(); ?>
                            <?php $firstadv = get_the_ID(); ?>
                            <?php get_template_part('loops/loop', 'advertentiessingle'); ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                <?php } ?>
            <?php } ?>
        </section>
    <?php } ?>
</main>
<?php get_footer(); ?>