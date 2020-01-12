<article class="adv">
    <div class="container">
        <div class="row">
            <div class="col-md-1 offset-md-1">
                <span class="post--date"><?php _e('Advertentie', 'flexupdate'); ?></span>
            </div>
            <div class="col-md-8 the--adv the--adv-single d-flex">
                <div class="d-flex col-md-12 align-items-center">
                    <?php $postimage = get_the_post_thumbnail_url('', 'large'); ?>
                    <?php $placeholder = get_field('upload_placeholder', 'option'); ?>
                    <div class="the-post--image the-post--image-single" style="background-image:url( <?php if ($postimage) { ?> <?php echo $postimage; ?> <?php } else { ?> <?php echo $placeholder['sizes']['medium']; ?> <?php } ?>);">
                        <svg width="55" height="357" viewBox="0 0 55 357" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 357C89.6 194.6 37.3333 51.3333 0 0H55V357H0Z" fill="white" />
                        </svg>
                    </div>
                    <div class="the-post-ad-single the-post--ad">
                        <h2><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                        <?php if (have_rows('advertentie')) : ?>
                            <?php while (have_rows('advertentie')) : the_row(); ?>
                                <?php $knop = get_sub_field('knop'); ?>
                                <?php if ($knop) { ?>
                                    <a class="btn" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                                <?php } ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>