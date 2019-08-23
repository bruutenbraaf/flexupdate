<?php if ($view_data && property_exists($view_data, 'data')) { ?>
<div class="container">
	<div class="row">
		<div class="offset-md-2 col-md-8">
			<h2>
				<?php echo $view_data->data->title; ?>
			</h2>
			<div class="description-vacansie">
				<p class="description"><?php echo nl2br(htmlspecialchars($view_data->data->description)) ?>
				</p>
			</div>
		</div>
		<div class="offset-md-2 col-md-4 vacancy-profile">
			<div class="inner">
				<h2><?php _e('Informatie', 'leerbouwen'); ?>
				</h2>
				<table>
					<tr>
						<th>
							<svg width="19" height="15" viewBox="0 0 19 15" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path
									d="M17.3457 3.51783L17.7232 3.1566L17.3457 2.79536L16.1371 1.63876L15.7916 1.30809L15.4459 1.6386L6.71403 9.98709L3.55383 6.97018L3.20815 6.64018L2.86287 6.97061L1.6543 8.12721L1.27683 8.48844L1.6543 8.84968L6.36858 13.3612L6.71429 13.6921L7.05999 13.3612L17.3457 3.51783Z"
									fill="#00A651" stroke="#00A651" />
							</svg>
							<?php _e('Location', 'uitzendplaats') ?>
						</th>
						<td>
							<?php echo $view_data->data->location ?>
						</td>
					</tr>
					<tr>
						<th>
							<svg width="19" height="15" viewBox="0 0 19 15" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path
									d="M17.3457 3.51783L17.7232 3.1566L17.3457 2.79536L16.1371 1.63876L15.7916 1.30809L15.4459 1.6386L6.71403 9.98709L3.55383 6.97018L3.20815 6.64018L2.86287 6.97061L1.6543 8.12721L1.27683 8.48844L1.6543 8.84968L6.36858 13.3612L6.71429 13.6921L7.05999 13.3612L17.3457 3.51783Z"
									fill="#00A651" stroke="#00A651" />
							</svg>
							<?php _e('Branches', 'uitzendplaats') ?>
						</th>
						<td><?php
                            foreach ($view_data->data->branches->data as $key => $branche) {
                                echo $branche->name;
                                if ($key < count($view_data->data->branches->data) - 1) {
                                    echo ', ';
                                }
                            }
                            ?>
						</td>
					</tr>
					<tr>
						<th>
							<svg width="19" height="15" viewBox="0 0 19 15" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path
									d="M17.3457 3.51783L17.7232 3.1566L17.3457 2.79536L16.1371 1.63876L15.7916 1.30809L15.4459 1.6386L6.71403 9.98709L3.55383 6.97018L3.20815 6.64018L2.86287 6.97061L1.6543 8.12721L1.27683 8.48844L1.6543 8.84968L6.36858 13.3612L6.71429 13.6921L7.05999 13.3612L17.3457 3.51783Z"
									fill="#00A651" stroke="#00A651" />
							</svg>
							<?php _e('Edited', 'uitzendplaats') ?>
						</th>
						<td>
							<?php
                            $edited = strtotime($view_data->data->updated_at);
                            echo date('d-m-Y H:i', $edited);
                            ?>
						</td>
					</tr>
					<tr>
						<th>
							<svg width="19" height="15" viewBox="0 0 19 15" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path
									d="M17.3457 3.51783L17.7232 3.1566L17.3457 2.79536L16.1371 1.63876L15.7916 1.30809L15.4459 1.6386L6.71403 9.98709L3.55383 6.97018L3.20815 6.64018L2.86287 6.97061L1.6543 8.12721L1.27683 8.48844L1.6543 8.84968L6.36858 13.3612L6.71429 13.6921L7.05999 13.3612L17.3457 3.51783Z"
									fill="#00A651" stroke="#00A651" />
							</svg>
							<?php _e('Education', 'uitzendplaats') ?>
						</th>
						<td>
							<?php
                            if (count($view_data->data->education->data) > 0) {
                                foreach ($view_data->data->education->data as $key => $education) {
                                    echo $education->name;
                                    if ($key < count($view_data->data->education->data) - 1) {
                                        echo ', ';
                                    }
                                }
                            } else {
                                _e('None');
                            }
                            ?>
						</td>
					</tr>
				</table>
				<a href="<?php echo sanitize_title(__('apply', 'uitzendplaats')); ?>/"
					class="btn"><?php _e('Direct solliciteren', 'leerbouwen'); ?></a>
			</div>
		</div>
		<div class="col-md-4 vacancy-contact">
			<div class="inner">
				<div class="heading">
					<?php if ($view_data->data->recruiter->data->photo_url) { ?>
					<div class="cpimg"
						style="background-image:url(<?php echo $view_data->data->recruiter->data->photo_url; ?>);">
					</div>
					<?php } ?>
					<h2><?php _e('Contactpersoon', 'leerbouwen'); ?>
					</h2>
				</div>
				<span class="cpname"><?php echo $view_data->data->recruiter->data->full_name; ?></span>

				<a class="cpin"
					href="mailto:<?php echo $view_data->data->recruiter->data->email; ?>"><?php echo $view_data->data->recruiter->data->email; ?></a>
				<a class="cpin"
					href="tel:<?php echo $view_data->data->recruiter->data->phone; ?>"><?php echo $view_data->data->recruiter->data->phone; ?></a>
				<?php if (have_rows('informatie_vacature')) : ?>
				<div class="companyinfo">
					<?php while (have_rows('informatie_vacature')) : the_row(); ?>
					<div class="heading">
						<?php $icoon_bedrijf = get_sub_field('icoon_bedrijf'); ?>
						<div class="image"
							style="background-image:url(<?php if ($icoon_bedrijf) { ?><?php echo $icoon_bedrijf['sizes']['smallfeatured']; ?> <?php } else { ?> <?php echo $afbeelding_geen_logo['sizes']['vacaturesmall']; ?> <?php } ?>);">
						</div>
						<h2><?php the_sub_field('bedrijfsnaam'); ?>
						</h2>
					</div>
					<p><?php the_sub_field('adres_bedrijf'); ?><br>
						<?php the_sub_field('postcode'); ?><br>
						<?php the_sub_field('provincie'); ?>
					</p>
					<a class="btn secondair"
						href="<?php the_sub_field('website'); ?>"
						target="_blank"><?php _e('Bekijk website', 'leerbouwen'); ?></a>
					<a class="btn"
						href="<?php the_sub_field('sollicitatielink'); ?>"
						target="_blank"><?php _e('Direct solliciteren', 'leerbouwen'); ?></a>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>
				<a href="mailto:<?php echo $view_data->data->recruiter->data->email; ?>"
					class="btn blue fullwidth" target="_blank"><?php _e('Stuur een e-mail', 'leerbouwen'); ?></a>
			</div>
		</div>
	</div>
	<?php } else { ?>
	<div class="uzp__message uzp__message--warning">
		<p><?php _e('The vacancy that you were looking for could not be found', 'uitzendplaats'); ?>
		</p>
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