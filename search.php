<?php
get_header(); ?>

<main id="hp">
    <section id="posts" class="search--post">
        <?php $currentdate = date('m / d'); ?>
        <?php if (have_posts()) { ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php $search_query = get_search_query(); ?>
                        <h2><?php echo $search_query; ?></h2>
                    </div>
                </div>
            </div>
            <?php while (have_posts()) : the_post(); ?>
                <article>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-1">
                                <?php $postdate = get_the_time('m / d'); ?>
                                <?php if ($currentdate == $postdate) { ?>
                                    <span class="post--date"><?php _e('Vandaag', 'flexupdate'); ?></span>
                                <?php } else { ?>
                                    <span class="post--date"><?php the_time('m / d'); ?></span>
                                    <span class="post--date"> <?php the_time('l'); ?></span>
                                <?php } ?>
                            </div>
                            <?php $postlink = get_field('item_link'); ?>
                            <div class="col-md-10 the--post" data-emergence="hidden">
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
                                                <p><?php echo excerpt(40); ?>
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
            <div class="nav-previous alignleft"><?php previous_posts_link('Vorige pagina >'); ?></div>
            <div class="nav-next alignright"><?php next_posts_link('volgende pagina >'); ?></div>
        <?php } else { ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <?php $search_query = get_search_query(); ?>
                        <h2><?php _e('Geen resulaten voor:', 'flexupdate'); ?> <?php echo $search_query; ?></h2>
                        <p class="no--post"><?php _e('Uw zoekactie heeft helaas geen zoekresultaten opgeleverd. Probeer het opnieuw met andere zoektermen of maak de zoektermen algemener.','');?>
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
