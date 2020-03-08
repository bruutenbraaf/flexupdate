<?php
get_header(); ?>

<main id="hp">
    <?php if (have_rows('counters')) : ?>
        <section id="counter">
            <div class="container count">
                <div class="row">
                    <div class="offset-lg-2 col-lg-8 col-md-12 d-flex justify-content-between">
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
    $args = array(
        'post_type' => array('items', 'post'),
        'order' => 'DESC',
        'paged' => $paged
    );
    $loop = new WP_Query($args);
    if ($loop->have_posts()) { ?>
        <section id="posts">
            <?php $count = 0; ?>
            <?php while ($loop->have_posts()) {
                $loop->the_post(); ?>
                <article>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-1 offset-lg-0 col-md-10 offset-md-1">
                                <?php $postdate = get_the_time('m / d'); ?>
                                <?php if ($currentdate == $postdate) { ?>
                                    <div class="st">
                                        <span class="post--date"><?php _e('Vandaag', 'flexupdate'); ?></span>
                                        <span class="post--date"><?php the_time('d / m'); ?></span>
                                    </div>
                                <?php } else { ?>
                                    <div class="st">
                                        <span class="post--date"> <?php the_time('l'); ?></span>
                                        <span class="post--date"><?php the_time('d / m'); ?></span>
                                    </div>
                                <?php } ?>
                            </div>
                            <?php $postlink = get_field('item_link'); ?>
                            <div class="col-lg-10 offset-lg-0 col-md-10 offset-md-1 the--post" data-emergence="hidden">
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
                                    <?php
                                    global $post;
                                    $term_id_prefixed = '_' . $term_id;
                                    $a_id = $post->post_author;
                                    $author = get_user_by('slug', get_query_var('author_name'));
                                    $nickname = get_the_author_meta('nickname', $author->ID); ?>
                                    <?php if ('post' == get_post_type()) { ?>
                                        <div class="submitted--info d-flex justify-content-center">
                                            <?php if ($nickname != 'Gast') { ?>
                                                <span>
                                                    <?php _e('Ingezonden door:', 'flexupdate'); ?> <a href="<?php echo get_author_posts_url($a_id); ?>"><?php echo $nickname; ?></a>
                                                </span>
                                            <?php } else { ?>
                                                <span>
                                                    <?php _e('Ingezonden bericht', 'flexupdate'); ?>
                                                </span>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                    <a href="<?php if ($postlink) { ?><?php echo ($postlink); ?><?php } else { ?><?php the_permalink(); ?><?php } ?>" <?php if ($postlink) { ?>target="_blank" <?php } ?>>
                                        <div class="d-flex">
                                            <div class="post--info">
                                                <h2><?php the_title(); ?>
                                                </h2>
                                                <p>
                                                    <?php echo excerpt(40); ?>
                                                </p>
                                                <?php if ('post' == get_post_type()) { ?>
                                                    <?php if ($nickname != 'Gast') { ?>
                                                        <div class="ing">
                                                            <a href="<?php echo get_author_posts_url($a_id); ?>">
                                                                <?php $profilePic = get_field('user_info_afbeelding', 'user_' . $a_id); ?>
                                                                <?php if ($profilePic) { ?>
                                                                    <img class="profilePic" src="<?php echo $profilePic; ?>">
                                                                <?php } ?>
                                                                <?php echo $nickname; ?>
                                                            </a>
                                                        </div>
                                                    <?php  } else { ?>
                                                        <div class="ing">
                                                            <a href="<?php the_field('gast_website'); ?>" target="_blank">
                                                                <?php $profilePic = get_field('gast_logo') ?>
                                                                <?php if ($profilePic) { ?>
                                                                    <img class="profilePic" src="<?php echo $profilePic; ?>">
                                                                <?php } ?>
                                                                <?php the_field('gast_bedrijfsnaam'); ?>
                                                            </a>
                                                        </div>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <?php
                                                    $terms = get_the_terms($post->ID, 'soort_item');
                                                    if ($terms) {
                                                        foreach ($terms as $term) {
                                                            $term_id = $term->term_id;
                                                        }
                                                    } ?>
                                                    <?php $bedrijfsicon = get_field('bedrijfsicon', '_' . $term_id); ?>
                                                    <?php if ($bedrijfsicon) { ?>
                                                        <img src="<?php echo $bedrijfsicon['url']; ?>" alt="<?php echo $bedrijfsicon['alt']; ?>" />
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                            <div class="post--image ml-auto">
                                                <?php
                                                $postimage = get_the_post_thumbnail_url('', 'medium');
                                                $placeholder = get_field('upload_placeholder', 'option');
                                                $term_id_prefixed = '_' . $term_id;
                                                $bedrijfafbeelding = get_field('bedrijfafbeelding', $term_id_prefixed); ?>
                                                <div class="the-post--image" style="background-image:url( <?php if ($postimage) { ?> <?php echo $postimage; ?> <?php } else { ?> <?php echo $bedrijfafbeelding['url']; ?> <?php } ?>);">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <?php $count++; ?>
                <?php if ($count == 3) { ?>
                    <?php
                    $first_adv = new WP_Query(array(
                        'post_type' => 'advertenties',
                        'posts_per_page' => 1,
                        'orderby' => 'rand',
                    )); ?>
                    <?php if ($first_adv->have_posts()) : ?>
                        <?php while ($first_adv->have_posts()) : $first_adv->the_post(); ?>
                            <?php $firstadv = get_the_ID(); ?>
                            <?php get_template_part('loops/loop', 'advertenties'); ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                <?php } ?>
                <?php if ($count == 6) { ?>
                    <?php
                    $secondadv = new WP_Query(array(
                        'post__not_in' => array($firstadv),
                        'post_type' => 'advertenties',
                        'orderby' => 'rand',
                        'posts_per_page' => 1,
                    )); ?>
                    <?php if ($secondadv->have_posts()) : ?>
                        <?php while ($secondadv->have_posts()) : $secondadv->the_post(); ?>
                            <?php $secadv = get_the_ID(); ?>
                            <?php get_template_part('loops/loop', 'advertenties'); ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                <?php } ?>
                <?php if ($count == 9) { ?>
                    <?php
                    $thirdadv = new WP_Query(array(
                        'post__not_in' => array($firstadv, $secadv),
                        'post_type' => 'advertenties',
                        'orderby' => 'rand',
                        'posts_per_page' => 1,
                    )); ?>
                    <?php if ($thirdadv->have_posts()) : ?>
                        <?php while ($thirdadv->have_posts()) : $thirdadv->the_post(); ?>
                            <?php get_template_part('loops/loop', 'advertenties'); ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                <?php } ?>
            <?php } ?>
        </section>
        <section id="pagination">
            <div class="d-flex justify-content-center">
                <?php if ($loop->max_num_pages > 1) { ?>
                    <?php
                    global $loop;
                    $big = 999999999; // need an unlikely integer
                    echo paginate_links(array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '?paged=%#%',
                        'current' => max(1, get_query_var('page')),
                        'total' => $loop->max_num_pages,
                        'prev_text' => '
        <span class="prev">
        <svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.371323 11.0673L10.6382 0.38635C11.1333 -0.128784 11.9361 -0.128784 12.4312 0.38635L13.6286 1.63211C14.123 2.14637 14.1239 2.97983 13.6308 3.49529L5.49412 12L13.6308 20.5047C14.1239 21.0202 14.123 21.8536 13.6286 22.3679L12.4312 23.6136C11.936 24.1288 11.1333 24.1288 10.6381 23.6136L0.371376 12.9327C-0.123782 12.4176 -0.123782 11.5824 0.371323 11.0673Z" fill="#545A63"/>
        </svg>        
        </span>',
                        'next_text' => '<span class="next"> 
                            <svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.6287 12.9327L3.36185 23.6136C2.86669 24.1288 2.06392 24.1288 1.56881 23.6136L0.371356 22.3679C-0.122957 21.8536 -0.123907 21.0202 0.369243 20.5047L8.50588 12L0.369243 3.49529C-0.123907 2.97983 -0.122957 2.14637 0.371356 1.63211L1.56881 0.38635C2.06397 -0.128783 2.86674 -0.128783 3.36185 0.38635L13.6286 11.0673C14.1238 11.5824 14.1238 12.4176 13.6287 12.9327Z" fill="#545A63"/>
                            </svg>
        </span>'
                    ));
                    ?>
                <?php } ?>
            </div>
        </section>
    <?php } ?>

</main>
<?php get_footer();
