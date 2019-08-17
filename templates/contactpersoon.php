<?php if ($view_data && property_exists($view_data, 'data')) { ?>

<?php } else { ?>
	<div class="uzp__message uzp__message--warning">
		<p><?php _e('The vacancy that you were looking for could not be found', 'uitzendplaats'); ?></p>
	</div>
<?php } ?>
<script>
	jQuery('p.description').readmore({
		speed: 75,
		collapsedHeight: 155,
		moreLink: '<a class="readmore" href="#">Lees meer</a>',
		lessLink: '<a class="readmore" href="#">Verbergen</a>'
	});
</script>