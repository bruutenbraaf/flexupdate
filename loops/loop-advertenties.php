<article class="adv">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 the--adv d-flex">
                <div class="adv--info d-flex justify-content-center">
                    <span>
                        <?php _e('Advertentie', 'flexupdate'); ?>
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.01001 14C7.10348 14 7.19027 14 7.27706 13.972C7.71102 13.874 8.07153 13.566 8.23844 13.146C8.3052 12.978 8.34525 12.789 8.34525 12.6H5.67477C5.67477 12.9713 5.81545 13.3274 6.06586 13.5899C6.31626 13.8525 6.65589 14 7.01001 14ZM11.3495 5.95C11.3495 3.801 9.92084 2.002 8.01145 1.526V1.05C8.01145 0.771523 7.90594 0.504451 7.71813 0.307538C7.53033 0.110625 7.27561 0 7.01001 0C6.74442 0 6.4897 0.110625 6.3019 0.307538C6.11409 0.504451 6.00858 0.771523 6.00858 1.05V1.526C4.09251 2.002 2.67048 3.801 2.67048 5.95V9.8L1.33524 11.2V11.9H12.6848V11.2L11.3495 9.8V5.95ZM12.6648 5.6H14C13.8999 3.353 12.845 1.379 11.2494 0.105L10.2947 1.106C11.6567 2.1 12.5646 3.745 12.6648 5.6ZM3.72532 1.106L2.77062 0.105C1.17501 1.379 0.120172 3.353 0 5.6H1.33524C1.45541 3.745 2.36338 2.1 3.72532 1.106Z" fill="#4F4F4F" />
                        </svg>
                    </span>
                </div>
                <div class="d-flex col-md-12 align-items-center">
                    <?php $postimage = get_the_post_thumbnail_url('', 'large'); ?>
                    <?php $placeholder = get_field('upload_placeholder', 'option'); ?>
                    <div class="the-post--image" style="background-image:url( <?php if ($postimage) { ?> <?php echo $postimage; ?> <?php } else { ?> <?php echo $placeholder['sizes']['medium']; ?> <?php } ?>);">
                        <svg viewBox="0 0 55 357" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 357C89.6 194.6 37.3333 51.3333 0 0H55V357H0Z" fill="white" />
                        </svg>
                    </div>
                    <div class="the-post--ad">
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