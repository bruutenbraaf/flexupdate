<?php
get_header(); ?>
<section id="updates">
    <div class="container">
        <div class="row">
            <div class="offset-md-1 col-md-10 int">
                <h1><?php the_field("updates_archive_title", "option"); ?></h1>
                <p><?php the_field("updates_archive_intro", "option"); ?></p>
            </div>
            <?php if (have_posts()) { ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="offset-md-1 col-md-10">
                        <div class="update-item">
                            <a href="<?php the_field('link_update'); ?>" target="_blank">
                                <div class="inner">
                                    <div class="head d-flex justify-content-between">
                                        <h4><?php the_title(); ?></h4>
                                        <div class="date"><?php the_time('m / d'); ?></div>
                                    </div>
                                    <?php the_content(); ?>
                                    <div class="go--btn">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 8H15M15 8L8 1M15 8L8 15" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php } ?>
        </div>
    </div>
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
</section>
<?php get_footer(); ?>