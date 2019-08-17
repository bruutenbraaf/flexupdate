<!-- 
    Template name: Vacature overzicht 
-->

<?php
get_header(); ?>
<main>
    <?php $afbeelding_geen_logo = get_field('afbeelding_geen_logo', 'option'); ?>
    <?php $logo = get_field('logo'); ?>
    <div class="archive-header">
        <div class="container">
            <div class="row">
                <div class="offset-md-1 col-md-9 col-11 page-heading">
                    <h1><?php the_title(); ?></h1>
                    <?php the_field('header_tekst_vacatures'); ?>
                    <?php if (have_rows('header_knoppen')) : ?>
                        <?php while (have_rows('header_knoppen')) : the_row(); ?>
                            <?php $knop = get_sub_field('knop'); ?>
                            <?php if ($knop) { ?>
                                <a class="btn<?php if (get_sub_field('is_secondair') == 1) { ?> secondair<?php } ?>" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                            <?php } ?>
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
    <section id="vacansies">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-md-6">
                    <h2><?php the_field('titel_extra_vacatures'); ?></h2>
                    <?php the_field('content_extra_vacatures'); ?>
                    <?php if (have_rows('knoppen_extra_vacatures')) : ?>
                        <?php while (have_rows('knoppen_extra_vacatures')) : the_row(); ?>
                            <?php $knop = get_sub_field('knop'); ?>
                            <?php if ($knop) { ?>
                                <a class="btn<?php if (get_sub_field('is_secondair') == 1) { ?> secondair<?php } ?>" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                            <?php } ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php the_content(); ?>
                </div>
                <div class="col-xl-4 offset-xl-1 col-md-5 offset-md-1 side" data-scroll>
                    <?php if (have_rows('vacatures_hulp_nodig_widget')) : ?>
                        <?php while (have_rows('vacatures_hulp_nodig_widget')) : the_row(); ?>
                            <?php if (get_sub_field('toon_de_widget') == 1) { ?>
                                <div class="help-needed">
                                    <div class="heading">
                                        <?php $werknemerwidget = get_sub_field('afbeelding_werknemer'); ?>
                                        <div class="image" style="background-image:url(<?php if ($werknemerwidget) { ?><?php echo $werknemerwidget['sizes']['smallfeatured']; ?> <?php } else { ?> <?php echo $afbeelding_geen_logo['sizes']['smallfeatured']; ?> <?php } ?>);">
                                        </div>
                                        <h3><?php the_sub_field('titel'); ?></h3>
                                    </div>
                                    <?php the_sub_field('tekst'); ?>
                                    <?php if (have_rows('knoppen')) : ?>
                                        <?php while (have_rows('knoppen')) : the_row(); ?>
                                            <?php $knop = get_sub_field('knop'); ?>
                                            <?php if ($knop) { ?>
                                                <a class="btn<?php if (get_sub_field('secondair') == 1) { ?> secondair<?php } ?>" href="<?php echo $knop['url']; ?>" <?php if ($knop['target']) { ?>target="<?php echo $knop['target']; ?>" <?php } ?>><?php echo $knop['title']; ?></a>
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
    </section>
    <section id="pagination">
        <div class="d-flex justify-content-center">
            <?php echo paginate_links(array(
                'prev_text' => '
        <span class="prev">
        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M16 9.49354V6.01033C16 5.52776 15.6179 5.13953 15.143 5.13953H8.00089V1.37331C8.00089 0.596842 7.07957 0.208609 6.53677 0.756489L0.251757 7.13512C-0.0839214 7.47618 -0.0839214 8.02769 0.251757 8.36875L6.53677 14.7438C7.076 15.2916 8.00089 14.9034 8.00089 14.1269V10.3643H15.143C15.6179 10.3643 16 9.97611 16 9.49354Z" fill="#00A651"/>
        </svg>
        </span>',
                'next_text' => '<span class="next"> 
        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 9.49354V6.01033C0 5.52776 0.3821 5.13953 0.857047 5.13953H7.99911V1.37331C7.99911 0.596842 8.92043 0.208609 9.46323 0.756489L15.7482 7.13512C16.0839 7.47618 16.0839 8.02769 15.7482 8.36875L9.46323 14.7438C8.924 15.2916 7.99911 14.9034 7.99911 14.1269V10.3643H0.857047C0.3821 10.3643 0 9.97611 0 9.49354Z" fill="#00A651"/>
        </svg>
        </span>'

            )); ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>