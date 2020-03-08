<?php
get_header(); ?>
<main id="static">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php $postimage = get_the_post_thumbnail_url('', 'large'); ?>
                <?php $placeholder = get_field('upload_placeholder', 'option'); ?>
                <div class="featured--image" style="background-image:url( <?php if ($postimage) { ?> <?php echo $postimage; ?> <?php } else { ?> <?php echo $placeholder['sizes']['large']; ?> <?php } ?>);">
                </div>
                <span class="time"><?php _e('Geplaatst op:', 'flexupdate'); ?> <?php the_time('j F Y'); ?></span>
                <div class="intro">
                    <h1><?php the_title(); ?></h1>
                    <p><?php the_field('intro_text'); ?></p>
                </div>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                <?php endwhile;
                endif; ?>
                <div class="row">
                    <div class="col-6">
                        <?php
                        global $post;
                        $a_id = $post->post_author;
                        $author = get_user_by('slug', get_query_var('author_name'));
                        $nickname = get_the_author_meta('nickname', $author->ID);  ?>
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
                        <?php } else { ?>
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
                    </div>
                    <div class="col-6 justify-content-end d-flex">
                        <div class="share">
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
            </div>
            <div class="col-md-4">
                <?php
                $thispost = get_the_ID();
                $args = array(
                    'post__not_in' => array($thispost),
                    'post_type' => array('post'),
                    'order' => 'DESC',
                    'posts_per_page' => 3,
                );
                $loop = new WP_Query($args);
                if ($loop->have_posts()) { ?>
                    <section id="posts" class="recommend">
                        <?php _e('<h2>Aanbevolen artikelen</h2>', 'flexupdate'); ?>
                        <?php while ($loop->have_posts()) {
                            $loop->the_post(); ?>
                            <article>
                                <div class="container">
                                    <div class="row">
                                        <?php $postlink = get_field('item_link'); ?>
                                        <div class="col-md-12 the--post the--post-single" data-emergence="hidden">
                                            <a href="<?php if ($postlink) { ?><?php echo ($postlink); ?><?php } else { ?><?php the_permalink(); ?><?php } ?>" <?php if ($postlink) { ?>target="_blank" <?php } ?>>
                                                <div class="wrapper-cell">
                                                    <div class="text">
                                                        <div class="text-line"> </div>
                                                        <div class="text-line"></div>
                                                        <div class="text-line"></div>
                                                    </div>
                                                </div>
                                                <div class="post-inner">
                                                    <div class="d-flex">
                                                        <div class="post--info">
                                                            <h3>
                                                                <?php the_title(); ?>
                                                            </h3>
                                                            <p>
                                                                <?php echo excerpt(10); ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        <?php } ?>
                    </section>
                <?php } ?>
                <?php
                $adv = array(
                    'post_type' => array('advertentie_single'),
                    'orderby' => 'rand',
                    'posts_per_page' => 1,
                );
                $loop = new WP_Query($adv);
                if ($loop->have_posts()) { ?>
                    <?php while ($loop->have_posts()) {
                        $loop->the_post(); ?>
                        <div class="adv_single">
                            <?php $afbeelding = get_field('afbeelding_sngl'); ?>
                            <?php $URL = get_field('URL_sgnl'); ?>

                            <a href="<?php echo $URL['url']; ?>" target="<?php echo $URL['target']; ?>"><img src="<?php echo $afbeelding['url']; ?>" alt="<?php echo $afbeelding['alt']; ?>" /></a>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>