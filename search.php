<?php
get_header(); ?>

<main id="hp">
    <section id="posts" class="search--post">
        <?php $currentdate = date('m / d'); ?>
        <?php if (have_posts()) { ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        global $wp_query;
                        $total_results = $wp_query->found_posts;
                        ?>
                        <?php $search_query = get_search_query(); ?>
                        <h2><?php echo $total_results; ?> <?php if ($total_results == 1) { ?><?php _e('resultaat voor:', 'flexupdate'); ?> <?php } else { ?> <?php _e('resulaten voor:', 'flexupdate'); ?> <?php } ?><?php echo $search_query; ?></h2>
                    </div>
                </div>
            </div>
            <?php while (have_posts()) : the_post(); ?>
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
            <?php endwhile; ?>
            <section id="pagination">
                <div class="d-flex justify-content-center">
                    <?php wpex_pagination(); ?>
                </div>
            </section>
        <?php } else { ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <?php $search_query = get_search_query(); ?>
                        <h2><?php _e('Geen resulaten voor:', 'flexupdate'); ?> <?php echo $search_query; ?></h2>
                        <p class="no--post"><?php _e('Uw zoekactie heeft helaas geen zoekresultaten opgeleverd. Probeer het opnieuw met andere zoektermen of maak de zoektermen algemener.', ''); ?></p>
                        <form action="<?php echo home_url('/'); ?>" class="search--formpage" method="get">
                            <input type="text" name="s" id="search" placeholder="Geef een zoekterm op" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Geef een zoekterm op'" value="<?php the_search_query(); ?>" />
                            <input type="submit" id="searchsubmit" value="Zoeken" />
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>
</main>
<?php get_footer();
