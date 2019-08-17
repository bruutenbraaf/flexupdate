<!-- 
    Template name: Vacature overzicht 
-->

<?php
get_header(); ?>
<main>
    <section id="vacancy-overview">
        <div class="container">
            <div class="row">
                <div class="col-md-4 vacancy-intro">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <h2><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <?php echo do_shortcode("[uitzendplaats_vacancy_index per_page='10']"); ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>