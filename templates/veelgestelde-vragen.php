<!-- 
    Template name: Veel gestelde vragen
-->
<?php
get_header(); ?>
<main>
    <div class="archive-header">
        <div class="container">
            <div class="row">
                <div class="offset-md-1 col-md-9 col-11 page-heading">
                    <h1><?php the_title(); ?></h1>
                    <?php if (get_field('beschrijving_onder_de_titel')) { ?>
                        <p><?php the_field('beschrijving_onder_de_titel'); ?></p>
                    <?php } ?>
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
    <section class="faq">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-md-6">
                    <?php $cnt = get_field('content_extra_cursus', 'option'); ?>
                    <?php if ($cnt) { ?>
                        <div class="inf-sng">
                            <h2><?php the_field('titel_extra_cursus'); ?></h2>
                            <?php the_field('content_extra_cursus'); ?>
                            <?php if (have_rows('knoppen_extra_cursus')) : ?>
                                <?php while (have_rows('knoppen_extra_cursus')) : the_row(); ?>
                                    <?php $knop = get_sub_field('knop'); ?>
                                    <?php if ($knop) { ?>
                                        <a class="btn <?php if (get_sub_field('is_secondair') == 1) { ?> secondair<?php } ?>" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                                    <?php } ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    <?php } ?>
                    <?php if (have_rows('faq_sections')) : ?>
                        <?php while (have_rows('faq_sections')) : the_row(); ?>
                            <section class="faq-section">
                                <h2><?php the_sub_field('section_titel'); ?></h2>
                                <ul>
                                    <?php if (have_rows('veelgestelde_vragen_items')) : ?>
                                        <?php while (have_rows('veelgestelde_vragen_items')) : the_row(); ?>
                                            <li data-scroll>
                                                <h4 class="faq-title">
                                                    <?php the_sub_field('titel_faq_item'); ?>
                                                    <svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.61138 6.39322L0.160979 2.21594C-0.0536604 2.01447 -0.0536604 1.68785 0.160979 1.4864L0.680047 0.999193C0.89432 0.798071 1.24159 0.797684 1.45637 0.998333L5.00001 4.3089L8.54363 0.998333C8.75841 0.797684 9.10568 0.798071 9.31995 0.999193L9.83902 1.4864C10.0537 1.68787 10.0537 2.0145 9.83902 2.21594L5.38862 6.3932C5.174 6.59466 4.82602 6.59466 4.61138 6.39322Z" fill="#03314C" />
                                                    </svg>
                                                </h4>
                                                <div class="faq-info"><?php the_sub_field('faq_information'); ?></div>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>
                            </section>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="col-xl-4 offset-xl-1 col-md-5 offset-md-1 side" data-scroll>
                    <?php if (get_field('extra_hulp_zijkant') == 1) { ?>
                        <?php if (have_rows('zijkant_widget')) : ?>
                            <?php while (have_rows('zijkant_widget')) : the_row(); ?>
                                <div class="help-needed">
                                    <div class="heading">
                                        <?php $persoon_afbeelding = get_sub_field('persoon_afbeelding'); ?>
                                        <div class="image" style="background-image:url(<?php if ($persoon_afbeelding) { ?><?php echo $persoon_afbeelding['sizes']['smallfeatured']; ?> <?php } else { ?> <?php echo $afbeelding_geen_logo['sizes']['smallfeatured']; ?> <?php } ?>);">
                                        </div>
                                        <h3><?php the_sub_field('titel'); ?></h3>
                                    </div>
                                    <?php the_sub_field('tekst'); ?>
                                    <?php if (have_rows('knoppen_widget')) : ?>
                                        <?php while (have_rows('knoppen_widget')) : the_row(); ?>
                                            <?php $knop_widget_single = get_sub_field('knop_widget_single'); ?>
                                            <?php if ($knop_widget_single) { ?>
                                                <a class="btn<?php if (get_sub_field('is_secondair') == 1) { ?> secondair<?php } ?>" href="<?php echo $knop_widget_single['url']; ?>" <?php if ($knop_widget_single['target']) { ?>target="<?php echo $knop_widget_single['target']; ?>" <?php } ?>><?php echo $knop_widget_single['title']; ?></a>
                                            <?php } ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>