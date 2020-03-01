<?php
get_header(); ?>

<?php
$author = get_user_by('slug', get_query_var('author_name'));
$user = wp_get_current_user();
$placeholder = get_field('upload_placeholder', 'option');
$placeholderOmslag = get_field('omslagfoto_placeholder', 'option');
$nickname = get_the_author_meta('nickname');
$authorDesc = get_the_author_meta('description'); 
?>
<main id="author">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="omslagfoto" style="background-image:url(<?php if (get_field('omslagfoto', $author)) { ?><?php the_field('omslagfoto', $author); ?> <?php } else { ?><?php echo $placeholderOmslag['sizes']['large']; ?><?php } ?>);">
                    <?php if ($author->ID == $user->ID) { ?>
                        <a href="<?php the_field('omslagfoto_aanpassen', 'option'); ?>" class="edit-img"><?php _e('Omslagfoto aanpassen', 'flexupdate'); ?></a>
                    <?php } ?>
                    <div class="author-img" style="background-image:url(<?php if (get_field('user_info_afbeelding', $author)) { ?><?php the_field('user_info_afbeelding', $author); ?> <?php } else { ?> <?php echo $placeholder['sizes']['large']; ?> <?php } ?>);">
                        <?php if ($author->ID == $user->ID) { ?>
                            <a href="<?php the_field('profielfoto_aanpassen', 'option'); ?>" class="edit-pic">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 15.25V19H3.75L14.81 7.94L11.06 4.19L0 15.25ZM17.71 5.04C18.1 4.65 18.1 4.02 17.71 3.63L15.37 1.29C14.98 0.899998 14.35 0.899998 13.96 1.29L12.13 3.12L15.88 6.87L17.71 5.04Z" fill="white" />
                                </svg>
                            </a>
                        <?php } ?>
                    </div>
                    <h1><?php echo $nickname; ?></h1>   
                </div>
            </div>
        </div>
        <div class="row pro-inf">
            <div class="col-lg-9 desc">
                <?php if ($author->ID == $user->ID) { ?>
                    <a href="<?php the_field('profiel_aanpassen_pagina', 'option'); ?>">
                        <div class="edit-desc">
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 15.25V19H3.75L14.81 7.94L11.06 4.19L0 15.25ZM17.71 5.04C18.1 4.65 18.1 4.02 17.71 3.63L15.37 1.29C14.98 0.899998 14.35 0.899998 13.96 1.29L12.13 3.12L15.88 6.87L17.71 5.04Z" fill="white" />
                            </svg>
                        </div>
                    </a>
                <?php } ?>
                <p>
                    <?php if ($authorDesc) { ?>
                        <?php echo $authorDesc; ?>
                    <?php } else { ?>
                        <?php if ($author->ID == $user->ID) { ?>
                            <a href="<?php the_field('profiel_aanpassen_pagina', 'option'); ?>">
                                <?php _e('Voeg een beschrijving toe', 'flexupdate'); ?>
                            </a>
                        <?php } else { ?>
                            <?php _e('Auteur heeft geen beschrijving', 'flexupdate'); ?>
                        <?php } ?>
                    <?php } ?>
                </p>
                <?php if (get_field('user_info_bedrijf_website', $author)) { ?>
                    <a href="<?php the_field('user_info_bedrijf_website', $author); ?>" class="solid-btn" target="_blank">
                        <?php _e('Bezoek website', 'flexupdate'); ?>
                    </a>
                <?php } ?>
                <?php if (get_field('user_info_linkedin', $author)) { ?>
                    <a href="<?php the_field('user_info_linkedin', $author); ?>" class="btn" target="_blank">
                        <?php _e('Bekijk op LinkedIn', 'flexupdate'); ?>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-3 side">
                <?php if ($author->ID == $user->ID) { ?>
                    <a href="<?php echo wp_logout_url(); ?>" class="solid-btn"><?php _e('Uitloggen', 'flexupdate'); ?></a>
                    <a href="<?php the_field('profiel_aanpassen_pagina', 'option'); ?>" class="btn edit-profile-btn"><?php _e('Profiel aanpassen', 'flexupdate'); ?></a>
                <?php } ?>
                <div>
                    <?php if (get_field('user_info_bedrijf_website', $author)) { ?>
                        <span class="small">Auteur van </span>
                        <div class="user_branding">
                            <a href="<?php the_field('user_info_bedrijf_website', $author); ?>" target="_blank">
                                <img class="user_logo" src="<?php the_field('logo_bedrijf', $author); ?>">
                            </a>
                            <?php if ($author->ID == $user->ID) { ?>
                                <a href="<?php the_field('logo_aanpassen_url', 'option'); ?>" class="edit-logo">
                                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 15.25V19H3.75L14.81 7.94L11.06 4.19L0 15.25ZM17.71 5.04C18.1 4.65 18.1 4.02 17.71 3.63L15.37 1.29C14.98 0.899998 14.35 0.899998 13.96 1.29L12.13 3.12L15.88 6.87L17.71 5.04Z" fill="white" />
                                    </svg>
                                </a>
                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <?php if ($author->ID == $user->ID) { ?>
                            <a class="d-block" href="<?php the_field('logo_aanpassen_url', 'option'); ?>" class="edit-logo">
                                <?php _e('Voeg uw logo toe.', 'flexupdate'); ?>
                            </a>
                        <?php } ?>
                    <?php } ?>
                    <span class="small">Deel auteur</span>
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
    </div>
    <?php $loop = new WP_Query(array(
        'post_type' => 'post',
        'author' => $author->ID,
        'posts_per_page' => 6,
        'order' => 'DESC'
    )); ?><?php if ($loop->have_posts()) : ?>
    <div class="container">
        <div class="row marg">
            <div class="col-lg-12 posts-title">
                <h2>Laatste berichten van <?php echo $author->display_name; ?></h2>
            </div>
            <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                <div class="col-lg-6">
                    <div class="post-item d-flex">
                        <div>
                            <h2><?php the_title(); ?></h2>
                            <p><?php echo excerpt(10); ?></p>
                        </div>
                        <?php
                        $postimage = get_the_post_thumbnail_url('', 'medium');
                        $placeholder = get_field('upload_placeholder', 'option');
                        $term_id_prefixed = '_' . $term_id;
                        $bedrijfafbeelding = get_field('bedrijfafbeelding', $term_id_prefixed); ?>
                        <div class="the-post--image" style="background-image:url( <?php if ($postimage) { ?> <?php echo $postimage; ?> <?php } else { ?> <?php echo $bedrijfafbeelding['url']; ?> <?php } ?>);">
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
<?php endif; ?>

</main>

<?php get_footer(); ?>