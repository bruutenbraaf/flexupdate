<!-- Template name: Sidebar & Aanmelden & Vactuur plaatsen
-->

<?php
get_header(); ?>
<main id="page-sb">
    <div class="cont-header">
        <div class="container">
            <div class="row">
                <div class="offset-md-1 col-md-9 col-11 page-heading">
                    <h1><?php the_title(); ?></h1>
                    <?php if (have_rows('header_sidebar')) : ?>
                        <?php while (have_rows('header_sidebar')) : the_row(); ?>
                            <?php the_sub_field('tekst'); ?>
                            <?php if (have_rows('knoppen')) : ?>
                                <?php while (have_rows('knoppen')) : the_row(); ?>
                                    <?php $knop = get_sub_field('knop'); ?>
                                    <?php if ($knop) { ?>
                                        <a class="btn<?php if (get_sub_field('is_secondair') == 1) { ?> secondair<?php } ?>" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                                    <?php } ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if (function_exists('yoast_breadcrumb')) {
                        yoast_breadcrumb('');
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container main-container">
        <div class="row">
            <div class="col-xl-7 col-md-6">
                <?php if (have_rows('sections')) : ?>
                    <?php while (have_rows('sections')) : the_row(); ?>
                        <?php if (get_row_layout() == 'aanmeldformulier__contactformulier') : ?>
                            <section>
                                <?php $form = get_sub_field('shortcode'); ?>
                                <?php echo do_shortcode($form); ?>
                            </section>
                        <?php elseif (get_row_layout() == 'full_text') : ?>
                            <section>
                                <h2><?php the_sub_field('titel'); ?></h2>
                                <?php the_sub_field('content'); ?>
                                <?php if (have_rows('knoppen')) : ?>
                                    <?php while (have_rows('knoppen')) : the_row(); ?>
                                        <?php $knop = get_sub_field('knop'); ?>
                                        <?php if ($knop) { ?>
                                            <a class="btn <?php if (get_sub_field('is_secondair') == 1) { ?> secondair<?php } ?>" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                                        <?php } ?>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </section>
                        <?php elseif (get_row_layout() == 'cta_big') : ?>
                            <?php if (have_rows('call_to_action')) : ?>
                                <?php while (have_rows('call_to_action')) : the_row(); ?>
                                    <section id="c-cta">
                                        <?php $afbeelding = get_sub_field('achtergrond_afbeelding'); ?>
                                        <div class="inner" <?php if ($afbeelding) { ?>style="background-image:url(<?php echo $afbeelding['sizes']['ccta']; ?>);" <?php } ?>>
                                            <?php if (have_rows('content')) : ?>
                                                <?php while (have_rows('content')) : the_row(); ?>
                                                    <div class="row">
                                                        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                                                            <span class="subtitle"><?php the_sub_field('subtitel'); ?></span>
                                                            <h2><?php the_sub_field('titel'); ?></h2>
                                                            <?php if (have_rows('knoppen')) : ?>
                                                                <?php while (have_rows('knoppen')) : the_row(); ?>
                                                                    <?php $knop = get_sub_field('knop'); ?>
                                                                    <?php if ($knop) { ?>
                                                                        <a class="btn<?php if (get_sub_field('is_secondair') == 1) { ?> secondair<?php } ?>" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                                                                    <?php } ?>
                                                                <?php endwhile; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </div>
                                    </section>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="col-xl-4 offset-xl-1 col-md-5 offset-md-1 side">
                <?php if (have_rows('sidebar_hulp_nodig_widget')) : ?>
                    <?php while (have_rows('sidebar_hulp_nodig_widget')) : the_row(); ?>
                        <?php if (get_sub_field('toon_de_widget') == 1) { ?>
                            <div class="help-needed">
                                <div class="heading">
                                    <?php $werknemerwidget = get_sub_field('afbeelding_werknemer'); ?>
                                    <?php if ($werknemerwidget) { ?>
                                        <div class="image" style="background-image:url(<?php if ($werknemerwidget) { ?><?php echo $werknemerwidget['sizes']['smallfeatured']; ?> <?php } else { ?> <?php echo $afbeelding_geen_logo['sizes']['smallfeatured']; ?> <?php } ?>);">
                                        </div>
                                    <?php } ?>
                                    <h3><?php the_sub_field('titel'); ?></h3>
                                </div>
                                <?php the_sub_field('tekst'); ?>
                                <?php if (have_rows('knoppen')) : ?>
                                    <?php while (have_rows('knoppen')) : the_row(); ?>
                                        <?php $knop = get_sub_field('knop'); ?>
                                        <?php if ($knop) { ?>
                                            <a class="btn<?php if (get_sub_field('secondair') == 1) { ?> secondair<?php } ?>" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                                        <?php } ?>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        <?php } ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>