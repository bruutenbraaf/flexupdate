<!--
    Template name: Artikel plaatsen
-->

<?php
get_header();?>

<?php
get_header();?>
<main id="place-post">
    <div class="container">
        <div class="row">
            <div class="offset-md-2 col-md-8">
                <h2><?php the_title();?>
                </h2>
                <?php if (have_posts()): while (have_posts()): the_post();?>
                <?php the_content();?>
                <?php endwhile; endif;?>
            </div>
        </div>
    </div>
</main>
<?php get_footer();
