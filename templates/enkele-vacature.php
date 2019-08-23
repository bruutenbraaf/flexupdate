<!--
    Template name: Vacature detail
-->

<?php
get_header();?>

<?php
get_header();?>
<main id="vacancy-detail">
	<?php if (have_posts()): while (have_posts()): the_post();?>
	<?php the_content();?>
	<?php endwhile; endif;?>
</main>
<?php get_footer();
