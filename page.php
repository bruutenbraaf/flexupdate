<?php
get_header(); ?>
<?php
get_header(); ?>
<main id="static">
    <?php if (have_rows('header_single')) : ?>
        <?php while (have_rows('header_single')) : the_row(); ?>
            <section class="header--sngl">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-8 bread offset-md-2">
                            <?php if (function_exists('yoast_breadcrumb')) {
                                yoast_breadcrumb('');
                            } ?>
                        </div>
                        <div class="col-md-8 offset-md-2">
                            <?php the_sub_field('titel'); ?>
                            <div class="intro">
                                <?php the_sub_field('intro_text'); ?>
                            </div>
                            <?php $knop = get_sub_field('knop'); ?>
                            <?php if ($knop) { ?>
                                <a href="<?php echo $knop['url']; ?>" class="btn" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                            <?php } ?>
                            <?php if (have_rows('informatie_werknemer')) : ?>
                                <?php while (have_rows('informatie_werknemer')) : the_row(); ?>
                                    <ul class="cnct">
                                        <li><a href="tel:<?php the_sub_field('telefoonnummer'); ?>"><?php the_sub_field('telefoonnummer'); ?></a></li>
                                        <li><a href="mailto:<?php the_sub_field('e-mailadres'); ?>"><?php the_sub_field('e-mailadres'); ?></a></li>
                                        <?php if (have_rows('socials')) : ?>
                                            <?php while (have_rows('socials')) : the_row(); ?>
                                                <?php $social = get_sub_field('social'); ?>
                                                <?php if ($social) { ?>
                                                    <li><a href="<?php echo $social['url']; ?>" target="<?php echo $social['target']; ?>"><?php echo $social['title']; ?></a></li>
                                                <?php } ?>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </ul>
                                    <?php the_sub_field('beschrijving'); ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php if (have_rows('sections')) : ?>
        <?php while (have_rows('sections')) : the_row(); ?>
            <?php if (get_row_layout() == 'volledige') : ?>
                <section class="about<?php if (get_sub_field('white_bg') == 1) { ?> wb<?php } ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2 offset-md-2">
                                <span class="sub">
                                    <?php the_sub_field('subtitle'); ?>
                                </span>
                            </div>
                            <div class="col-md-6">
                                <?php the_sub_field('content'); ?>
                                <?php $knop = get_sub_field('knop'); ?>
                                <?php if ($knop) { ?>
                                    <a class="btn" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php elseif (get_row_layout() == 'volle_breedte_text_geen_subtitel') : ?>
                <section class="about <?php if (get_sub_field('white_bg') == 1) { ?> wb<?php } ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <?php the_sub_field('content'); ?>
                                <?php $knop = get_sub_field('knop'); ?>
                                <?php if ($knop) { ?>
                                    <a class="btn" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php elseif (get_row_layout() == 'carrousel') : ?>
                <div class="carrousel">
                    <?php if (have_rows('afbeeldingen')) : ?>
                        <div class="carrousel-items">
                            <?php while (have_rows('afbeeldingen')) : the_row(); ?>
                                <div class="carrousel-item">
                                    <?php $afbeelding_upload = get_sub_field('afbeelding_upload'); ?>
                                    <?php if ($afbeelding_upload) { ?>
                                        <div class="carousel-img" style="background-image:url(<?php echo $afbeelding_upload['sizes']['large']; ?>);" ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="offset-md-1 col-md-10">
                                <div class="dots">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    jQuery(document).ready(function() {
                        jQuery('.carrousel-items').slick({
                            infinite: true,
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            arrows: false,
                            focusOnSelect: true,
                            centerMode: true,
                            dots: true,
                            lazyLoaded: true,
                            appendDots: jQuery(".dots"),
                        });
                    });
                </script>
            <?php elseif (get_row_layout() == 'volledige_afbeelding') : ?>
                <?php $afbeelding = get_sub_field('afbeelding'); ?>
                <?php if ($afbeelding) { ?>
                    <div class="post--image" style="background-image:url(<?php echo $afbeelding['url']; ?>);">
                    </div>
                <?php } ?>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>
</main>
<?php get_footer(); ?>

<?php get_footer(); ?>