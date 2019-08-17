<?php

/**
 * Provide a view for the vacancy widget
 *
 * @link https://www.uitzendplaats.nl
 * @since 1.0.0
 *
 * @package Uitzendplaats
 * @subpackage Uitzendplaats/admin/partials
 */
?>

<?php if (empty($view_data)) { ?>
<p><?php _e('No vacancies found', 'uitzendplaats'); ?></p>
<?php } else { ?>
<?php $i = 0; ?>
<?php shuffle($view_data->data);
	foreach ($view_data->data as $key => $item) { ?>
<article class="vac">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1 the--vac d-flex">
				<div class="vac--info d-flex justify-content-center">
					<span>
						<?php _e('Vacature', 'flexupdate'); ?>
						<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M7.01001 14C7.10348 14 7.19027 14 7.27706 13.972C7.71102 13.874 8.07153 13.566 8.23844 13.146C8.3052 12.978 8.34525 12.789 8.34525 12.6H5.67477C5.67477 12.9713 5.81545 13.3274 6.06586 13.5899C6.31626 13.8525 6.65589 14 7.01001 14ZM11.3495 5.95C11.3495 3.801 9.92084 2.002 8.01145 1.526V1.05C8.01145 0.771523 7.90594 0.504451 7.71813 0.307538C7.53033 0.110625 7.27561 0 7.01001 0C6.74442 0 6.4897 0.110625 6.3019 0.307538C6.11409 0.504451 6.00858 0.771523 6.00858 1.05V1.526C4.09251 2.002 2.67048 3.801 2.67048 5.95V9.8L1.33524 11.2V11.9H12.6848V11.2L11.3495 9.8V5.95ZM12.6648 5.6H14C13.8999 3.353 12.845 1.379 11.2494 0.105L10.2947 1.106C11.6567 2.1 12.5646 3.745 12.6648 5.6ZM3.72532 1.106L2.77062 0.105C1.17501 1.379 0.120172 3.353 0 5.6H1.33524C1.45541 3.745 2.36338 2.1 3.72532 1.106Z" fill="#4F4F4F" />
						</svg>
					</span>
				</div>
				<div class="d-flex col-md-12 align-items-center">
					<div class="the-post--vac">
						<h2><?php echo $item->title ?></h2>
						<p><?php echo mb_strimwidth($item->description, 0, 400, '...');?></p>
					</div>
				</div>
				<div class="d-flex col-md-12">
					<div>
						<a class="btn" href="<?php echo get_site_url(null, get_option('uitzendplaats-options')['uzp-vacancy-index-page'] . '/' . sanitize_title($item->title) . '/' . $item->id . '/') ?>"><?php _e('Solliciteer nu', 'flexupdate'); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</article>
<?php if (++$i == 1) break; ?>
<?php } ?>
<?php } ?>