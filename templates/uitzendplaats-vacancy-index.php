<?php

/**
 * Provide a view for the vacancy index page
 *
 * @link https://www.uitzendplaats.nl
 * @since 1.0.0
 *
 * @package Uitzendplaats
 * @subpackage Uitzendplaats/public/templates
 */
?>

<?php
if ($_POST && array_key_exists('uzp_vacancy_search', $_POST) && (!empty($search_query) || !empty($search_postal_code) || !empty($search_radius))) {
	$search_title = __('You searched for: ', 'uitzendplaats');
	if (!empty($search_query)) {
		$search_title .= sprintf(__(' \'%s\'', 'uitzendplaats'), $search_query);
	}
	if (!empty($search_postal_code)) {
		$search_title .= sprintf(__(' postal code \'%s\'', 'uitzendplaats'), $search_postal_code);
	}
	if (!empty($search_radius)) {
		$search_title .= sprintf(__(' radius \'%s km\'', 'uitzendplaats'), $search_radius);
	}
	echo '<p class="uzp__search-description">' . $search_title . '.</p>';


	if ($search_postal_code !== '' && $search_radius === '' || $search_postal_code === '' && $search_radius !== '') {
		echo '<div class="uzp__form-error-message">';
		_e('Both radius and postal code must be filled.', 'uitzendplaats');
		echo '</div>';
	}
}
?>
<?php if (empty($view_data) || !isset($view_data->data) || sizeof($view_data->data) === 0) { ?>
<p><?php _e('No vacancies found', 'uitzendplaats'); ?></p>
<?php } else { ?>
<?php if (isset($view_data) && isset($view_data->data)) { ?>
<?php foreach ($view_data->data as $key => $item) { ?>
<div class="col-md-4">
	<article class="vacansie-item" data-scroll>
		<div class="inner">
			<h4><a href="<?php echo get_site_url(null, get_option('uitzendplaats-options')['uzp-vacancy-index-page'] . '/' . sanitize_title($item->title) . '/' . $item->id . '/') ?>" title="<?php echo $item->title ?>"><?php echo $item->title ?></a></h4>
			<div class="uzp__meta text-muted">
			<p><?php echo mb_strimwidth($item->description, 0, 100, '...');?></p>
			</div>
			<a class="the-link" href="<?php echo get_site_url(null, get_option('uitzendplaats-options')['uzp-vacancy-index-page'] . '/' . sanitize_title($item->title) . '/' . $item->id . '/') ?>" title="<?php _e('More information', 'uitzendplaats'); ?>"></a>
		</div>
	</article>
</div>
<?php } ?>
<?php } ?>
<?php } ?>