<!--
    Template name: Artikel plaatsen
-->

<?php
get_header(); ?>

<?php
get_header(); ?>
<main id="place-post">
    <div class="container">
        <div class="row">
            <div class="offset-md-2 col-md-8 add-post-head">
                <h1>
                    <?php
                    if (is_user_logged_in()) { ?>
                        <?php _e('Welkom terug,', 'flexupdate'); ?> <?php echo $current_user->display_name; ?>.
                    <?php } else { ?>
                        <?php _e('Welkom,', 'flexupdate'); ?> <?php _e('bezoeker.', 'flexupdate'); ?>
                    <?php } ?>
                </h1>

                <?php
                if (is_user_logged_in()) { ?>
                    <p><?php _e('Je plaats berichten onder de naam','flexupdate');?> <?php echo $current_user->display_name; ?>.
                <?php } else { ?>
                    <p><?php _e('Je plaats berichten als een gast gebruiker. Uw bericht wordt eerst gecontroleerd voordat uw bericht zichtbaar is in het overzicht.', 'flexupdate');?> </p>
                    <div class="apply-guest solid-btn"><?php _e('Doorgaan als gast','flexupdate');?></div><a href="<?php the_field('inloggen_pagina', 'option'); ?>" class="btn"><?php _e('Inloggen als auteur','flexupdate');?></a>
                <?php } ?>

                <?php
                if (is_user_logged_in()) { ?>
                Ingelogd
                    <?php
                    $logedOut = get_field('ingelogd_formulier_shortcode');
                    echo do_shortcode($logedOut); ?>
                <?php } else { ?>
                    <div class="apply-post">
                        <?php
                        $logedOut = get_field('gast_formulier_shortcode');
                        echo do_shortcode($logedOut); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer();
