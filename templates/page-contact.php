<!-- Template name: Contactpagina
 -->

<?php
get_header(); ?>
<main id="cp">
    <?php if (have_rows('header_contact')) : ?><?php while (have_rows('header_contact')) : the_row(); ?> <div class="cont-header<?php if (!have_rows('knoppen_header')) : ?> nobtn-header<?php endif; ?><?php endwhile; ?>"><?php endif; ?>
        <div class="container">
            <div class="row">
                <div class="offset-md-1 col-md-9 col-11 contact-head page-heading">
                    <h1><?php the_title(); ?></h1>
                    <?php if (have_rows('header_contact')) : ?>
                        <?php while (have_rows('header_contact')) : the_row(); ?>
                            <?php the_sub_field('tekst'); ?>
                            <?php if (have_rows('knoppen_header')) : ?>
                                <?php while (have_rows('knoppen_header')) : the_row(); ?>
                                    <?php $knop = get_sub_field('knop'); ?>
                                    <?php if ($knop) { ?>
                                        <a class="btn<?php if (get_sub_field('is_secondair') == 1) { ?> secondair<?php } ?>" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                                    <?php } ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <?php

                $location = get_field('google_maps');

                if (!empty($location)) :
                    ?>
                    <div class="acf-map">
                        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                    </div>
                <?php endif; ?>
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
    <section class="contact-p">
        <div class="container">
            <div class="row">
                <?php if (have_rows('content_contact')) : ?>
                    <?php while (have_rows('content_contact')) : the_row(); ?>
                        <?php if (have_rows('bedrijfsgegevens')) : ?>
                            <?php while (have_rows('bedrijfsgegevens')) : the_row(); ?>
                                <div class="col-md-5">
                                    <h2><?php the_sub_field('titel'); ?></h2>
                                    <?php the_sub_field('extra_informatie'); ?>
                                    <?php if (have_rows('gegevens')) : ?>
                                        <table class="company-info">
                                            <tbody>
                                                <?php while (have_rows('gegevens')) : the_row(); ?>
                                                    <tr>
                                                        <td><?php the_sub_field('titel'); ?></td>
                                                        <td><?php the_sub_field('gegevens'); ?></td>
                                                    </tr>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
                                    <?php if (have_rows('knoppen')) : ?>
                                        <?php while (have_rows('knoppen')) : the_row(); ?>
                                            <?php $knop = get_sub_field('knop'); ?>
                                            <?php if ($knop) { ?>
                                                <a class="btn<?php if (get_sub_field('is_secondair') == 1) { ?> secondair<?php } ?>" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                                            <?php } ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php if (have_rows('contactformulier')) : ?>
                            <?php while (have_rows('contactformulier')) : the_row(); ?>
                                <div class="offset-md-1 col-md-5">
                                    <h2><?php the_sub_field('titel'); ?></h2>
                                    <?php the_sub_field('extra_informatie'); ?>
                                    <?php $form = get_sub_field('contactformulier_shortcode'); ?>
                                    <?php echo do_shortcode($form); ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>
<?php $apikey = get_field('api_key', 'option'); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $apikey ?>"></script>
<script type="text/javascript">
    (function($) {
        function new_map($el) {
            var $markers = $el.find('.marker');
            var args = {
                zoom: 16,
                mapTypeControl: false,
                streetViewControl: false,
                center: new google.maps.LatLng(0, 0),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map($el[0], args);
            map.markers = [];
            $markers.each(function() {

                add_marker($(this), map);

            });
            center_map(map);
            return map;

        }

        function add_marker($marker, map) {
            var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));
            var marker = new google.maps.Marker({
                position: latlng,
                map: map
            });
            map.markers.push(marker);
            if ($marker.html()) {
                var infowindow = new google.maps.InfoWindow({
                    content: $marker.html()
                });
                google.maps.event.addListener(marker, 'click', function() {

                    infowindow.open(map, marker);

                });
            }

        }

        function center_map(map) {

            var bounds = new google.maps.LatLngBounds();
            $.each(map.markers, function(i, marker) {

                var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());

                bounds.extend(latlng);

            });

            // only 1 marker?
            if (map.markers.length == 1) {
                // set center of map
                map.setCenter(bounds.getCenter());
                map.setZoom(16);
            } else {
                map.fitBounds(bounds);
            }

        }
        var map = null;

        $(document).ready(function() {
            $('.acf-map').each(function() {

                map = new_map($(this));
            });
        });
    })(jQuery);
</script>


<?php get_footer(); ?>