<?php
get_header(); ?>
<main id="hp">
    <section id="posts" class="search--post">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php $search_query = get_search_query(); ?>
                    <h2><?php _e('404, niet gevonden.', 'flexupdate'); ?> <?php echo $search_query; ?></h2>
                    <p class="no--post"><?php _e('De pagina die u probeert te bezoeken is helaas niet gevonden.', ''); ?></p>
                    <form action="<?php echo home_url('/'); ?>" class="search--formpage" method="get">
                        <input type="text" name="s" id="search" placeholder="Geef een zoekterm op" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Geef een zoekterm op'" value="<?php the_search_query(); ?>" />
                        <input type="submit" id="searchsubmit" value="Zoeken" />
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>