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
            <section id="pagination">
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
            </section>
            <div class="nav-previous alignleft"><?php previous_posts_link('Vorige pagina >'); ?></div>
            <div class="nav-next alignright"><?php next_posts_link('volgende pagina >'); ?></div>
        <?php } else { ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <?php $search_query = get_search_query(); ?>
                        <h2><?php _e('Geen resulaten voor:', 'flexupdate'); ?> <?php echo $search_query; ?></h2>
                        <p class="no--post"><?php _e('Uw zoekactie heeft helaas geen zoekresultaten opgeleverd. Probeer het opnieuw met andere zoektermen of maak de zoektermen algemener.', ''); ?>
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
