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
	<div class="container">
		<div class="row">
			<div class="offset-md-2 col-md-8">
				<h1><?php _e('Vacatures', 'flexupdate'); ?></h1>
				<p><?php _e('No vacancies found', 'uitzendplaats'); ?></p>
			</div>
		</div>
	</div>
<?php } else { ?>
	<?php if (isset($view_data) && isset($view_data->data)) { ?>
		<?php foreach ($view_data->data as $key => $item) { ?>
			<div class="col-md-10 offset-md-1 vac-col">
				<article class="vacansie-item" data-scroll>
					<a class="the-link" href="<?php echo get_site_url(null, get_option('uitzendplaats-options')['uzp-vacancy-index-page'] . '/' . sanitize_title($item->title) . '/' . $item->id . '/') ?>" title="<?php _e('More information', 'uitzendplaats'); ?>">
						<div class="inner">
							<div class="vac--heading">
								<h4><?php echo $item->title ?></h4> <span class="location ml-auto"> <?php echo $item->location ?></span>
							</div>
							<span class="branche">
								<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M8.7462 5.43643C9.14722 5.55057 9.86608 5.71574 10.6683 5.71574C11.4145 5.71574 12.2326 5.57266 12.9328 5.11246C14.7433 3.92227 14.9186 1.16854 14.9253 1.05188C14.9419 0.756952 14.7637 0.485868 14.4864 0.384208C14.3767 0.344042 11.779 -0.586778 9.96873 0.60329C8.51845 1.55667 8.11729 3.513 8.01164 4.3138C6.64579 5.22821 5.46068 6.47421 4.50563 7.99076C4.47507 7.80936 4.43822 7.62865 4.395 7.44897C4.84617 6.78361 5.85123 5.04997 5.3986 3.37006C4.83484 1.27803 2.27438 0.249472 2.16569 0.206698C1.89079 0.098593 1.57746 0.183027 1.39412 0.414589C1.32158 0.506142 -0.375467 2.68182 0.188234 4.77382C0.639318 6.44784 2.36857 7.44083 3.09744 7.79277C3.34026 8.82294 3.33328 9.8931 3.07597 10.9158C2.39218 12.7648 2.22296 14.1882 2.21564 14.2527C2.17351 14.6208 2.43777 14.9535 2.80585 14.9955C2.83178 14.9985 2.8575 15 2.88302 15C3.21941 15 3.50959 14.7475 3.54873 14.4053C3.55111 14.3844 3.63911 13.6681 3.93563 12.6164C4.81981 12.0174 5.83702 11.6432 6.90194 11.5241C7.44958 12.0637 8.84546 13.2591 10.4654 13.2591C10.5507 13.2591 10.6368 13.2558 10.7233 13.2488C12.883 13.0763 14.3614 10.7466 14.4233 10.6475C14.5798 10.3969 14.5539 10.0735 14.3597 9.85091C14.2829 9.76287 12.4536 7.69691 10.2936 7.86979C8.55926 8.00837 7.26451 9.53778 6.78958 10.1864C6.02851 10.2679 5.28724 10.4582 4.5869 10.7489C5.34331 8.94701 6.62148 6.86116 8.7462 5.43643ZM10.7057 1.72448C11.5684 1.15729 12.8229 1.33527 13.5166 1.49977C13.3925 2.2019 13.0585 3.42399 12.1957 3.99124C11.3334 4.55808 10.0799 4.38062 9.38628 4.21639C9.51246 3.51347 9.84926 2.28751 10.7057 1.72448ZM3.43653 6.4593C2.80852 6.12165 1.75239 5.42181 1.48374 4.42478C1.21532 3.42865 1.77577 2.29401 2.14916 1.68625C2.77726 2.02609 3.83622 2.72966 4.10291 3.71916C4.37156 4.71631 3.80959 5.85224 3.43653 6.4593ZM10.4002 9.20743C11.4287 9.12464 12.4436 9.88466 12.9727 10.3625C12.5262 10.9184 11.6454 11.8291 10.6163 11.9113C9.58565 11.9934 8.57239 11.2339 8.04364 10.7563C8.49018 10.2005 9.37099 9.2897 10.4002 9.20743Z" />
								</svg>
								<?php
								foreach ($item->branches->data as $key => $branche) {
									echo $branche->name;
									if ($key < count($item->branches->data) - 1) {
										echo ', ';
									}
								}
								?>
							</span>
							<div class="uzp__meta text-muted">
								<p><?php echo mb_strimwidth($item->description, 0, 100, '...'); ?></p>
							</div>

						</div>
						<div class="vac--btn">
							<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1 8H15M15 8L8 1M15 8L8 15" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</div>
					</a>
				</article>
			</div>
		<?php } ?>
	<?php } ?>
<?php } ?>

<div class="container share">
	<div class="row">
		<div class="col-md-10 offset-md-1">
			<div id="shareBlock"></div>
			<script>
				jQuery(document).ready(function() {
					jQuery('#shareBlock').cShare({
						show_buttons: [
							'fb',
							'twitter',
							'tumblr',
							'email'
						]
					});
				});
			</script>
		</div>
	</div>
</div>