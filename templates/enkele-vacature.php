<!-- 
    Template name: Vacature detail 
-->

<?php
get_header(); ?>

<?php $afbeelding_geen_logo = get_field('afbeelding_geen_logo', 'option'); ?>
<main id="sngl-vacansie">
    <div class="single-header vac-header">
        <div class="container">
            <div class="row">
                <div class="offset-md-1 col-md-9 col-11 top-padding page-heading">
                    <?php if (have_rows('informatie_vacature')) : ?>
                        <?php while (have_rows('informatie_vacature')) : the_row(); ?>
                            <?php $logo_bedrijf_wit = get_sub_field('logo_bedrijf_wit'); ?>
                            <?php if ($logo_bedrijf_wit) { ?>
                                <img src="<?php echo $logo_bedrijf_wit['url']; ?>" alt="<?php echo $logo_bedrijf_wit['alt']; ?>" />
                            <?php } ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <h1><?php the_title(); ?></h1>
                    <?php if ($view_data && property_exists($view_data, 'data')) { ?>
                        <div class="information-vacansie">
                            <div class="uzp__meta text-muted">
                                <span class="location"><?php echo $item->location ?></span>
                                <span class="branches">
                                    <?php
                                    foreach ($item->branches->data as $key => $branche) {
                                        echo $branche->name;
                                        if ($key < count($item->branches->data) - 1) {
                                            echo ', ';
                                        }
                                    }
                                    ?>
                                </span>
                                <span class="education">
                                    <?php
                                    foreach ($item->education->data as $key => $edu) {
                                        echo $edu->name;
                                        if ($key < count($item->education->data) - 1) {
                                            echo ', ';
                                        }
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
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

    <div class="container">
        <div class="row">
            <?php the_content(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>